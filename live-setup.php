<?php
/*
 * One-time setup / repair page for the cPanel server (no SSH needed).
 * Open: https://profxawards.com/live-setup.php?token=27f6f23f94e6508a02e30ff6
 *
 * It clears stale Laravel caches, fixes storage folders, creates the sponsor
 * tables and shows the latest server errors. When every check passes it
 * deletes itself. If something fails it stays so you can fix and reload.
 */

$token = '27f6f23f94e6508a02e30ff6';
if (!hash_equals($token, (string)($_GET['token'] ?? ''))) {
    http_response_code(403);
    exit('Forbidden');
}

header('Content-Type: text/plain; charset=UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', '1');

$root = __DIR__;
$core = $root . '/core';
$ok = true;

function line($status, $text)
{
    echo str_pad("[$status]", 8) . $text . "\n";
}

function fail($text)
{
    global $ok;
    $ok = false;
    line('FAIL', $text);
}

echo "PROFX Awards live setup\n=======================\n\n";

// 1. PHP version (Laravel 10 needs 8.1+)
if (version_compare(PHP_VERSION, '8.1.0', '>=')) {
    line('OK', 'PHP ' . PHP_VERSION);
} else {
    fail('PHP ' . PHP_VERSION . ' is too old. In cPanel > "Select PHP Version" / "MultiPHP Manager" choose PHP 8.1 or 8.2.');
}

foreach (['pdo_mysql', 'mbstring', 'openssl', 'fileinfo', 'gd'] as $ext) {
    extension_loaded($ext) ? line('OK', "PHP extension $ext") : fail("PHP extension $ext is missing (enable it in cPanel > Select PHP Version > Extensions)");
}

// 2. Required files
foreach (['/vendor/autoload.php' => 'vendor folder (upload core/vendor)', '/.env' => '.env file', '/bootstrap/app.php' => 'bootstrap/app.php'] as $file => $label) {
    file_exists($core . $file) ? line('OK', $label) : fail("Missing core$file - $label");
}

// 3. Clear stale caches (cached config/routes from another server break new code)
$cacheFiles = glob($core . '/bootstrap/cache/{config,routes-v7,routes,events}.php', GLOB_BRACE) ?: [];
foreach ($cacheFiles as $file) {
    @unlink($file) ? line('OK', 'Deleted stale cache ' . basename($file)) : fail('Could not delete ' . $file);
}
foreach (glob($core . '/storage/framework/views/*.php') ?: [] as $file) {
    @unlink($file);
}
line('OK', 'Cleared compiled views');

// 4. Storage folders must exist and be writable
$dirs = ['/storage/app', '/storage/framework/cache/data', '/storage/framework/sessions', '/storage/framework/views', '/storage/logs', '/bootstrap/cache'];
foreach ($dirs as $dir) {
    $path = $core . $dir;
    if (!is_dir($path)) {
        @mkdir($path, 0755, true);
    }
    if (!is_writable($path)) {
        @chmod($path, 0755);
    }
    is_dir($path) && is_writable($path) ? line('OK', "writable core$dir") : fail("core$dir is not writable - set permission 755 in cPanel File Manager");
}
foreach (['/uploads', '/uploads/sponsors'] as $dir) {
    $path = $root . $dir;
    if (!is_dir($path)) {
        @mkdir($path, 0755, true);
    }
    is_writable($path) ? line('OK', "writable $dir") : fail("$dir is not writable - set permission 755");
}

// 5. Boot Laravel, check database, create sponsor tables
if (file_exists($core . '/vendor/autoload.php')) {
    try {
        require $core . '/vendor/autoload.php';
        $app = require $core . '/bootstrap/app.php';
        $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
        $kernel->bootstrap();
        line('OK', 'Laravel booted (APP_ENV=' . config('app.env') . ', APP_URL=' . config('app.url') . ')');

        Illuminate\Support\Facades\DB::connection()->getPdo();
        line('OK', 'Database connected: ' . config('database.connections.mysql.database'));

        Illuminate\Support\Facades\Artisan::call('migrate', [
            '--path' => 'database/migrations/2026_10_07_000001_create_sponsors_tables.php',
            '--force' => true,
        ]);
        $schema = Illuminate\Support\Facades\Schema::class;
        if ($schema::hasTable('sponsors') && $schema::hasTable('sponsor_categories')) {
            line('OK', 'Sponsor tables ready (' . App\Models\Sponsor::count() . ' sponsors, '
                . App\Models\SponsorCategory::count() . ' categories)');
        } else {
            fail('Sponsor tables missing - import core/database/sql/sponsors.sql in phpMyAdmin');
        }
        foreach (['nominations', 'contacts', 'users', 'webmaster_sections'] as $table) {
            $schema::hasTable($table) ? line('OK', "table $table") : fail("table $table missing - import the full database");
        }
    } catch (Throwable $e) {
        fail(get_class($e) . ': ' . $e->getMessage() . ' (' . str_replace($root, '', $e->getFile()) . ':' . $e->getLine() . ')');
    }
}

// 6. Latest server errors
echo "\nLatest errors\n-------------\n";
foreach ([$root . '/error_log', $core . '/error_log', $core . '/storage/logs/laravel.log'] as $log) {
    if (is_file($log) && filesize($log) > 0) {
        $lines = array_slice(file($log, FILE_IGNORE_NEW_LINES), -15);
        echo "\n" . str_replace($root, '', $log) . ":\n" . implode("\n", array_map(fn($l) => '  ' . substr($l, 0, 400), $lines)) . "\n";
    }
}

echo "\n";
if ($ok) {
    @unlink(__FILE__);
    echo "ALL CHECKS PASSED. Open https://profxawards.com/admin now.\nThis setup file has deleted itself.\n";
} else {
    echo "Fix the FAIL lines above, then reload this page.\n";
}
