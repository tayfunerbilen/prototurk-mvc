<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require __DIR__ . '/vendor/autoload.php';

use \Prototurk\Core\{App, Route};

require_once __DIR__ . '/App/bootstrap.php';


$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();
$app = new App();

require __DIR__ . '/App/routes/web.php';

Route::prefix('/api');
require __DIR__ . '/App/routes/api.php';
Route::$prefix = '';

Route::dispatch();