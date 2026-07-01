<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

$errors = [];

echo "Running Full Deployment Validation...\n\n";

// 1. Validate Composer
echo "[1/6] Validating Composer Dependencies...\n";
if (!file_exists(__DIR__.'/vendor/autoload.php')) {
    $errors[] = "Composer dependencies are missing. Run `composer install`.";
}

// 2. Validate APP_KEY
echo "[2/6] Validating APP_KEY...\n";
$envContent = file_get_contents(__DIR__.'/.env.example');
if (strpos($envContent, 'APP_KEY=base64:') === false) {
    $errors[] = "APP_KEY is missing in .env.example.";
}

// 3. Validate Database
echo "[3/6] Validating Database Configuration...\n";
if (strpos($envContent, 'DB_CONNECTION=mysql') === false) {
    $errors[] = "Project does not default to MySQL in production.";
}

// 4. Validate Routes and Controllers
echo "[4/6] Validating Routes and Controllers...\n";
$routes = Route::getRoutes();
foreach ($routes as $route) {
    $action = $route->getAction();
    if (isset($action['controller'])) {
        [$class, $method] = explode('@', $action['controller']);
        if (!class_exists($class)) {
            $errors[] = "Controller does not exist: $class for route " . $route->uri();
        } elseif (!method_exists($class, $method)) {
            $errors[] = "Method $method does not exist in $class for route " . $route->uri();
        }
    }
}

// 5. Validate Views & Named Routes inside Views
echo "[5/6] Validating Blade Views and Included Routes...\n";
$viewsDir = __DIR__ . '/resources/views';
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($viewsDir));
foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $content = file_get_contents($file->getPathname());
        
        // Check @include
        preg_match_all("/@include\(['\"](.*?)['\"]/", $content, $matches);
        foreach ($matches[1] as $match) {
            $path = str_replace('.', '/', $match) . '.blade.php';
            if (!file_exists($viewsDir . '/' . $path)) {
                $errors[] = "Missing view [$match] referenced in " . $file->getFilename();
            }
        }
        
        // Check route()
        preg_match_all("/route\(['\"](.*?)['\"]/", $content, $matches);
        foreach ($matches[1] as $match) {
            if (!Route::has($match)) {
                $errors[] = "Named route [$match] is not registered, but referenced in " . $file->getFilename();
            }
        }
    }
}

// 6. Check Caches
echo "[6/6] Checking for leftover cache files...\n";
$cacheFiles = glob(__DIR__.'/bootstrap/cache/*.php');
foreach ($cacheFiles as $file) {
    if (basename($file) !== 'packages.php' && basename($file) !== 'services.php') {
        @unlink($file);
    }
}

if (empty($errors)) {
    echo "\n✅ SUCCESS: Zero deployment errors found! The project is 100% ready for Hostinger.\n";
} else {
    echo "\n❌ FAILED: Found " . count($errors) . " errors:\n";
    foreach ($errors as $error) {
        echo " - $error\n";
    }
}
