$ErrorActionPreference = "Stop"
$BuildDir = "hostinger_build"

Write-Host "1. Cleaning up previous build..."
if (Test-Path $BuildDir) {
    Remove-Item -Recurse -Force $BuildDir
}

New-Item -ItemType Directory -Path "$BuildDir/laravel" | Out-Null

Write-Host "2. Running Vite Production Build..."
npm run build

Write-Host "3. Copying application files..."
$ExcludeList = @('.git', 'node_modules', 'hostinger_build', '.vercel', 'tests', '.env', '.idea', '.vscode')
Get-ChildItem -Path . -Exclude $ExcludeList | ForEach-Object {
    Copy-Item -Path $_.FullName -Destination "$BuildDir/laravel" -Recurse -Force
}

Write-Host "4. Separating public_html..."
Move-Item -Path "$BuildDir/laravel/public" -Destination "$BuildDir/public_html" -Force

Write-Host "5. Patching index.php for Shared Hosting..."
$IndexFile = "$BuildDir/public_html/index.php"
$IndexContent = Get-Content $IndexFile -Raw
$IndexContent = $IndexContent -replace "__DIR__\.'/\.\./storage/framework/maintenance\.php'", "__DIR__.'/../laravel/storage/framework/maintenance.php'"
$IndexContent = $IndexContent -replace "__DIR__\.'/\.\./vendor/autoload\.php'", "__DIR__.'/../laravel/vendor/autoload.php'"
$IndexContent = $IndexContent -replace "__DIR__\.'/\.\./bootstrap/app\.php'", "__DIR__.'/../laravel/bootstrap/app.php'"
Set-Content -Path $IndexFile -Value $IndexContent -NoNewline

Write-Host "6. Preparing Production .env..."
$EnvContent = Get-Content "$BuildDir/laravel/.env.example" -Raw
$EnvContent = $EnvContent -replace "APP_ENV=local", "APP_ENV=production"
$EnvContent = $EnvContent -replace "APP_DEBUG=true", "APP_DEBUG=false"
Set-Content -Path "$BuildDir/laravel/.env" -Value $EnvContent

Write-Host "7. Creating Hostinger Storage Symlink Script..."
$SymlinkScript = "<?php`n`$targetFolder = __DIR__.'/../laravel/storage/app/public';`n`$linkFolder = __DIR__.'/storage';`nsymlink(`$targetFolder, `$linkFolder);`necho 'Symlink process successfully completed';"
Set-Content -Path "$BuildDir/public_html/symlink.php" -Value $SymlinkScript -NoNewline

Write-Host "8. Clearing Local Deployment Caches..."
Get-ChildItem -Path "$BuildDir/laravel/bootstrap/cache" -File | Where-Object { $_.Name -ne '.gitignore' } | Remove-Item -Force
Get-ChildItem -Path "$BuildDir/laravel/storage/framework/views" -File | Where-Object { $_.Name -ne '.gitignore' } | Remove-Item -Force

Write-Host "9. Creating optimize.php utility..."
$OptimizeScript = "<?php`nrequire __DIR__.'/../laravel/vendor/autoload.php';`n`$app = require_once __DIR__.'/../laravel/bootstrap/app.php';`n`$kernel = `$app->make(Illuminate\Contracts\Http\Kernel::class);`n`$response = `$kernel->handle(`$request = Illuminate\Http\Request::capture());`nuse Illuminate\Support\Facades\Artisan;`necho '<h1>Optimization Utility</h1>';`ntry {`n    Artisan::call('optimize:clear');`n    echo '<h3 style=`'color: green;`'>Successfully cleared all caches!</h3>';`n    echo '<pre>' . Artisan::output() . '</pre>';`n} catch (\Exception `$e) {`n    echo '<h3 style=`'color: red;`'>Error:</h3><pre>' . `$e->getMessage() . '</pre>';`n}`necho '<p style=`'color: red; font-weight: bold;`'>IMPORTANT: Delete this optimize.php file after you see the success message!</p>';"
Set-Content -Path "$BuildDir/public_html/optimize.php" -Value $OptimizeScript -NoNewline

Write-Host "======================================"
Write-Host "Build packaged successfully in ./$BuildDir!"
Write-Host "======================================"
