<?php

namespace Prototurk\Core;

use Jenssegers\Blade\Blade;

class View
{

    /**
     * @param string $viewName
     * @param array $data
     * @return string
     */
    public static function show(string $viewName, array $data = []): string
    {

        $blade = new Blade(dirname(__DIR__) . '/public/views', dirname(__DIR__) . '/public/cache');
        return $blade->render($viewName, $data);

//        extract($data);
//        $viewName = str_replace('.', '/', $viewName);
//        ob_start();
//        require dirname(__DIR__) . '/public/views/' . $viewName . '.php';
//        return ob_get_clean();
    }

}