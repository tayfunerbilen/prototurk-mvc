<?php


namespace Prototurk\Middlewares;

use Prototurk\Core\Middleware;

class TestMiddleware extends Middleware
{

	function interrupt()
	{
		if(request()->input('test') || request()->input('test')==""){
			return;
		}
		throw new \Exception('Test değeri gönderilmedi!');
	}
}