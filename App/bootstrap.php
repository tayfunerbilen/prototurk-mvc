<?php
use \Prototurk\Core\{Request, Route};


require __DIR__ . '/routes/web.php';

Route::prefix('/api');
require __DIR__ . '/routes/api.php';
Route::$prefix = '';

/**
 * İsteği bekleterek middleware'leri çalıştıralım.
*/
Request::setMiddlewares([
//	\Prototurk\Middlewares\TestMiddleware::class,
]);