<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require __DIR__ . '/vendor/autoload.php';

use \Prototurk\Core\{App, Route};

$app = new \Prototurk\Core\App();

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

require __DIR__ . '/App/routes/web.php';

Route::prefix('/api');
require __DIR__ . '/App/routes/api.php';
Route::$prefix = '';

Route::dispatch();