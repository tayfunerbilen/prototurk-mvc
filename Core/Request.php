<?php


namespace Prototurk\Core;

use Prototurk\Core\Helpers\Singleton;

/**
 * @class Request
 * @extends Prototurk\Core\Helpers\Singleton
 * @package Prototurk\Core
 * @author Utku Korkmaz <uutkukorkmaz@gmail.com>
*/
class Request extends Singleton
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
	 * İstek metodunu alır
	 *
	 * @return string
	 */
	public static function getMethod(): string
	{
		return strtolower($_SERVER['REQUEST_METHOD']);
	}

	/**
	 * İstek URL'ini alır
	 *
	 * @return string
	 */
	public static function getUrl(): string
	{
		return self::$uri;
	}

	/**
	 * İstek URL'ini işler
	 *
	 * @return string
	 */
	protected static function parse(): string
	{
		return self::$uri = str_replace($_ENV['BASE_PATH'], null, $_SERVER['REQUEST_URI']);
	}

	/**
	 * Bir middleware tanımlar
	 *
	 * @param string $middleware
	 * @return void
	 */
	protected static function middleware(string $middleware): void
	{
		self::$middlewares[] = new $middleware();
	}

	/**
	 * Tanımlanan middleware'ler ile isteği duraklatır ve tanımlanan interrupt'ları çağırır.
	 *
	 * @return void
	 */
	public function dispatch(): void
	{
		if (count(self::$middlewares)) {
			foreach (self::$middlewares as $interrupt) {
				$interrupt->interrupt();
			}
		}
	}

	/**
	 * İsteği interrupt etmesini istediğimiz middleware'leri tanımlar.
	 *
	 * @return void
	*/
	public static function setMiddlewares(array $middlewares): void
	{
		foreach ($middlewares as $middleware) {
			self::middleware($middleware);
		}
	}

	/**
	 * İstek metoduna ait gönderilen verileri döndürür
	 *
	 * @param string|null $name
	 * @return mixed
	 */
	public function input(?string $name = null)
	{

		switch (self::getMethod()) {
			case "put":
			case "delete":
			case "patch":
			default:
				return false;
			case "get":
				if (!is_null($name)) {
					return isset($_GET[$name]) ? $_GET[$name] : false;
				} else {
					return $_GET;
				}
			case "post":
				if (!is_null($name)) {
					return $_POST[$name] ?? false;
				} else {
					return $_POST;
				}
		}
	}

}