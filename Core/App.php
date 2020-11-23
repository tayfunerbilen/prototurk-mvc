<?php

namespace Prototurk\Core;

class App
{

	/**
	 * @var Request $request    Tarayıcıdan gönderilen istek nesnesini barındırır.
	*/
	public Request $request;

    public function __construct()
    {
		$this->request = Request::getInstance();
    }

}