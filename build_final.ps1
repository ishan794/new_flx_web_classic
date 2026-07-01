$ErrorActionPreference = "Stop"
$BuildDir = "hostinger_build_final"
$ZipFile = "hostinger_production_build.zip"

Write-Host "1. Running Frontend Build (npm install & build)..."
npm install
npm run build

Write-Host "2. Cleaning up previous builds..."
if (Test-Path $BuildDir) { Remove-Item -Recurse -Force $BuildDir }
if (Test-Path $ZipFile) { Remove-Item -Force $ZipFile }
New-Item -ItemType Directory -Path "$BuildDir/laravel" | Out-Null

Write-Host "3. Copying application files..."
$ExcludeList = @('.git', 'node_modules', 'hostinger_build', 'hostinger_build_final', '.vercel', 'tests', '.idea', '.vscode', 'hostinger_production_build.zip')
Get-ChildItem -Path . -Exclude $ExcludeList | ForEach-Object {
    Copy-Item -Path $_.FullName -Destination "$BuildDir/laravel" -Recurse -Force
}

Write-Host "4. Optimizing Composer Dependencies..."
Push-Location "$BuildDir/laravel"
composer install --no-dev --optimize-autoloader
Pop-Location

Write-Host "5. Restructuring for Hostinger (public_html)..."
Move-Item -Path "$BuildDir/laravel/public" -Destination "$BuildDir/public_html" -Force

Write-Host "6. Patching index.php..."
$IndexFile = "$BuildDir/public_html/index.php"
$IndexContent = Get-Content $IndexFile -Raw
$IndexContent = $IndexContent -replace "__DIR__\.'/\.\./storage/framework/maintenance\.php'", "__DIR__.'/../laravel/storage/framework/maintenance.php'"
$IndexContent = $IndexContent -replace "__DIR__\.'/\.\./vendor/autoload\.php'", "__DIR__.'/../laravel/vendor/autoload.php'"
$IndexContent = $IndexContent -replace "__DIR__\.'/\.\./bootstrap/app\.php'", "__DIR__.'/../laravel/bootstrap/app.php';`n`$app->usePublicPath(__DIR__)"
Set-Content -Path $IndexFile -Value $IndexContent -NoNewline

Write-Host "7. Setting up Production .env..."
$EnvContent = Get-Content "$BuildDir/laravel/.env" -Raw
$EnvContent = $EnvContent -replace "APP_ENV=local", "APP_ENV=production"
$EnvContent = $EnvContent -replace "APP_DEBUG=true", "APP_DEBUG=false"
$EnvContent = $EnvContent -replace "SESSION_DRIVER=database", "SESSION_DRIVER=file"
$EnvContent = $EnvContent -replace "CACHE_STORE=database", "CACHE_STORE=file"
Set-Content -Path "$BuildDir/laravel/.env" -Value $EnvContent

Write-Host "8. Clearing Local Caches & Logs..."
Get-ChildItem -Path "$BuildDir/laravel/bootstrap/cache" -File | Where-Object { $_.Name -ne '.gitignore' } | Remove-Item -Force
Get-ChildItem -Path "$BuildDir/laravel/storage/framework/views" -File | Where-Object { $_.Name -ne '.gitignore' } | Remove-Item -Force
Get-ChildItem -Path "$BuildDir/laravel/storage/logs" -File | Where-Object { $_.Name -ne '.gitignore' } | Remove-Item -Force

Write-Host "8.5 Ensuring Storage Directories Exist with .gitkeep..."
$DirsToCreate = @(
    "$BuildDir/laravel/storage/framework/sessions",
    "$BuildDir/laravel/storage/framework/views",
    "$BuildDir/laravel/storage/framework/cache/data",
    "$BuildDir/laravel/storage/logs",
    "$BuildDir/laravel/bootstrap/cache"
)
foreach ($Dir in $DirsToCreate) {
    if (-not (Test-Path $Dir)) {
        New-Item -ItemType Directory -Path $Dir | Out-Null
    }
    Set-Content -Path "$Dir/.gitkeep" -Value "" -NoNewline
}

Write-Host "9. Creating Hostinger Utilities..."
$SymlinkScript = "<?php`n`$targetFolder = __DIR__.'/../laravel/storage/app/public';`n`$linkFolder = __DIR__.'/storage';`nsymlink(`$targetFolder, `$linkFolder);`necho 'Symlink process successfully completed';"
Set-Content -Path "$BuildDir/public_html/symlink.php" -Value $SymlinkScript -NoNewline

$OptimizeScript = "<?php`nrequire __DIR__.'/../laravel/vendor/autoload.php';`n`$app = require_once __DIR__.'/../laravel/bootstrap/app.php';`n`$kernel = `$app->make(Illuminate\Contracts\Http\Kernel::class);`n`$response = `$kernel->handle(`$request = Illuminate\Http\Request::capture());`nuse Illuminate\Support\Facades\Artisan;`necho '<h1>Optimization Utility</h1>';`ntry {`n    Artisan::call('optimize:clear');`n    echo '<h3 style=`'color: green;`'>Successfully cleared all caches!</h3>';`n    echo '<pre>' . Artisan::output() . '</pre>';`n} catch (\Exception `$e) {`n    echo '<h3 style=`'color: red;`'>Error:</h3><pre>' . `$e->getMessage() . '</pre>';`n}`necho '<p style=`'color: red; font-weight: bold;`'>IMPORTANT: Delete this optimize.php file after you see the success message!</p>';"
Set-Content -Path "$BuildDir/public_html/optimize.php" -Value $OptimizeScript -NoNewline

Write-Host "10. Generating ZIP Package..."
Compress-Archive -Path "$BuildDir/*" -DestinationPath $ZipFile

Write-Host "======================================"
Write-Host "Production build generated successfully!"
Write-Host "File: $ZipFile"
Write-Host "======================================"
