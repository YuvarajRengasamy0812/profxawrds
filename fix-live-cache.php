<?php

$token = 'profx2026clear';

if (($_GET['token'] ?? '') !== $token) {
    http_response_code(403);
    exit('Forbidden');
}

$root = __DIR__;
$pathsToDelete = [
    $root . '/core/bootstrap/cache/config.php',
    $root . '/core/bootstrap/cache/routes-v7.php',
    $root . '/core/storage/framework/cache/data',
    $root . '/core/storage/framework/sessions',
    $root . '/core/storage/framework/views',
];

$results = [];

$deleteContents = function (string $path) use (&$deleteContents, &$results, $root): void {
    $real = realpath($path);

    if ($real === false) {
        $results[] = "Missing: {$path}";
        return;
    }

    if (strpos($real, $root) !== 0) {
        $results[] = "Skipped outside root: {$path}";
        return;
    }

    if (is_file($real)) {
        $results[] = @unlink($real) ? "Deleted file: {$path}" : "Failed file: {$path}";
        return;
    }

    $items = scandir($real);
    if ($items === false) {
        $results[] = "Cannot read: {$path}";
        return;
    }

    foreach ($items as $item) {
        if ($item === '.' || $item === '..' || $item === '.gitignore') {
            continue;
        }

        $child = $real . DIRECTORY_SEPARATOR . $item;
        if (is_dir($child)) {
            $deleteContents($child);
            @rmdir($child);
        } else {
            @unlink($child);
        }
    }

    $results[] = "Cleared folder: {$path}";
};

foreach ($pathsToDelete as $path) {
    $deleteContents($path);
}

$log = $root . '/core/storage/logs/laravel.log';
if (is_file($log) && strpos(realpath($log), $root) === 0) {
    file_put_contents($log, '');
    $results[] = 'Truncated log: core/storage/logs/laravel.log';
}

header('Content-Type: text/plain; charset=UTF-8');
echo "Laravel live cache cleanup complete.\n\n";
echo implode("\n", $results);

@unlink(__FILE__);
