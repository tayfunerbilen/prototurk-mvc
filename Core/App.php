<?php

namespace Prototurk\Core;

class App
{

	public Request $request;

    public function __construct()
    {
		$this->request = Request::getInstance();
    }

}