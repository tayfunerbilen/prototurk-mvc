<?php

namespace Prototurk\Core\Helpers;
use Exception;

/**
 * @class Singleton
 * @package Prototurk\Core\Helpers
 * @author Utku Korkmaz <uutkukorkmaz@gmail.com>
*/
abstract class Singleton
{
	/**
	 * @var array $instances  Tüm Singleton türevi sınıfların varlıklarını barındırır
	*/
	private static array $instances = [];

	/**
	 * Singleton constructor
	 *
	 * Singleton olmasını istediğimiz nesneleri new ClassName(); şeklinde
	 * çağıramamamız gerektiği için, türevi sınıfların construct metodları
	 * protected olmak zorundadır.
	*/
	protected function __construct(){}

	protected function __clone(){}

	/**
	 * Serialize ve unserialize işlemlerinin sonucunda yeni bir varlık oluşacağından
	 * olası conflict'leri engellemek için __wakeup metodunda basitçe hata
	 * gösteriyoruz.
	 *
	 * @throws Exception
	*/
	public function __wakeup(){
		throw new Exception("");
	}

	/**
	 * Singleton türevi olan sınıfların yaratılan tek varlığına erişebilmek için
	 * varlığı geri döndüreceğimiz methodumuz.
	 *
	 * method içinde kullanılan 'static' terimi türev sınıfın psr-4 karşılığına
	 * denk gelmektedir
	 *
	 * @return static
	*/
	public static function getInstance(){
		$instance = static::class;
		/**
		 * Türev varlık daha önceden yaratılmış mı?
		*/
		if(!array_key_exists($instance,self::$instances)){
			self::$instances[$instance] = new static();
		}

		return self::$instances[$instance];
	}


}