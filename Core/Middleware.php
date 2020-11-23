<?php


namespace Prototurk\Core;

/**
 * @class abstract Middleware
 * @package Prototurk\Core
 * @author Utku Korkmaz <uutkukorkmaz@gmail.com>
*/
abstract class Middleware
{
	/**
	 * İstek duraklatıldığında türev sınıfların bu methodu çalışır.
	 *
	 * İstek return ile devam ettirilir; Exception fırlatılarak sonlandırılır.
	*/
	abstract function interrupt();

}