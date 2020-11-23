<?php


namespace Prototurk\Core;


class Request extends Helpers\Singleton
{
	/**
	 * @var string $uri İstek gönderilen URL uzantısını barındırır
	 */
	public static string $uri;
	/**
	 * @var string $query HTTP GET query değerlerini barındırır
	 */
	public static string $query;
	/**
	 * @var string $method İstek metodunu barındırır
	 */
	public static string $method;

	/**
	 * @var array $middlewares Interrupt sınıflarını barındırır
	 */
	public static array $middlewares = [];

	/**
	 * @inheritDoc
	 */
	protected function __construct()
	{
		parent::__construct();
		self::parse();
		$url = explode('?', self::getUrl());
		self::$uri = $url[0];
		self::$query = $url[1] ?? "";
		self::$method = self::getMethod();
	}

	/**
	 * @return string
	 */
	public static function getMethod(): string
	{
		return strtolower($_SERVER['REQUEST_METHOD']);
	}

	/**
	 * @return string
	 */
	public static function getUrl(): string
	{
		return self::$uri;
	}

	protected static function parse()
	{
		return self::$uri = str_replace($_ENV['BASE_PATH'], null, $_SERVER['REQUEST_URI']);
	}

	protected static function middleware($middleware)
	{
		self::$middlewares[] = new $middleware();
	}

	public function dispatch()
	{
		if (count(self::$middlewares)) {
			foreach (self::$middlewares as $interrupt) {
				$interrupt->interrupt();
			}
		}
	}

	public static function setMiddlewares(array $middlewares)
	{
		foreach ($middlewares as $middleware) {
			self::middleware($middleware);
		}
	}

	public function input($name = '')
	{
		switch (self::getMethod()) {
			case "put":
			case "delete":
			case "patch":
			default:
				return false;
			case "get":
				return $_GET[$name] ?? false;
			case "post":
				return $_POST[$name] ?? false;
		}
	}

}