<?php

namespace Prototurk\Core\Helpers;

class Redirect
{

    /**
     * @param string $toUrl
     * @param int $status
     */
    public static function to(string $toUrl, int $status = 301)
    {
        header('Location:' . getenv('BASE_PATH') . $toUrl, true, $status);
        exit;
    }

}