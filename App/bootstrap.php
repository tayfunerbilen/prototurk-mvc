<?php
use \Prototurk\Core\Request;

/**
 * İsteği bekleterek middleware'leri çalıştıralım.
*/
Request::setMiddlewares([
//	\Prototurk\Middlewares\TestMiddleware::class,
]);