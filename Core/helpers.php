<?php

/**
 * @param string $name
 * @param array $params
 * @return string
 */
function route(string $name, array $params = [])
{
    return \Prototurk\Core\Route::url($name, $params);
}