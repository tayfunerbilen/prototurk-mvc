<?php

namespace Prototurk\App\Controllers;

class Home
{

    public function index()
    {
        return route('user', ['id1' => 5, 'id2' => 6]);
    }

}