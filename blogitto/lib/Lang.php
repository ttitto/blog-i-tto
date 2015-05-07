<?php

namespace Core;

class Lang {

    protected  static  $data;

    public  static  function  load($lang_code){
        $lang_file_path =  ROOT.DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.strtolower($lang_code).'.php';
        if(file_exists($lang_file_path)){
            self::$data = include($lang_file_path);
        } else{
            throw new \Exception('Language file not found.');
        }
    }

    public static function get($key, $default_value = ''){
        if(isset( self::$data[strtolower($key)])){
            return self::$data[strtolower($key)];
        } else {
            return $default_value;
        }
    }
} 