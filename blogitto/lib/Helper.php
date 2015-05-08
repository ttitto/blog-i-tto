<?php

namespace Core;

class Helper
{
    public static function isset_get($array, $key, $default = null)
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }
} 