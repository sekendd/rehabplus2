<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// Debug: Test database connection after boot
try {
    $pdo = new PDO($_ENV['DATABASE_URL'] ?? '');
    $stmt = $pdo->query("SELECT VERSION()");
    $version = $stmt->fetchColumn();
    error_log("DB Connection OK: MySQL $version");
} catch (\Throwable $e) {
    error_log("DB Connection FAILED: " . $e->getMessage());
    error_log("DATABASE_URL: " . ($_ENV['DATABASE_URL'] ?? 'NOT SET'));
}

$app->handleRequest(Request::capture());
