<?php
$viewsDir = __DIR__ . '/resources/views';

function findViews($dir) {
    $results = [];
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $content = file_get_contents($file->getPathname());
            
            // Check @include
            preg_match_all("/@include\(['\"](.*?)['\"]/", $content, $matches);
            foreach ($matches[1] as $match) {
                $results[] = ['type' => 'include', 'name' => $match, 'file' => $file->getPathname()];
            }
            
            // Check @extends
            preg_match_all("/@extends\(['\"](.*?)['\"]/", $content, $matches);
            foreach ($matches[1] as $match) {
                $results[] = ['type' => 'extends', 'name' => $match, 'file' => $file->getPathname()];
            }
        }
    }
    return $results;
}

$references = findViews($viewsDir);
$missing = [];

foreach ($references as $ref) {
    $path = str_replace('.', '/', $ref['name']) . '.blade.php';
    if (!file_exists($viewsDir . '/' . $path)) {
        $missing[] = "Missing view [{$ref['name']}] in {$ref['file']}";
    }
}

// Check routes
$routesContent = file_get_contents(__DIR__ . '/routes/web.php');
preg_match_all("/view\(['\"](.*?)['\"]/", $routesContent, $routeMatches);
foreach ($routeMatches[1] as $match) {
    $path = str_replace('.', '/', $match) . '.blade.php';
    if (!file_exists($viewsDir . '/' . $path)) {
        $missing[] = "Missing route view [{$match}] in routes/web.php";
    }
}

if (empty($missing)) {
    echo "All views are present.\n";
} else {
    echo implode("\n", $missing) . "\n";
}
