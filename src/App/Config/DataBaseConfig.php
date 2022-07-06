<?php
namespace App\Config;

class DataBaseConfig{

    public static function getConfig(){
        return [
            'host'=>'localhost',
            'dbname'=>'films',
            'username'=>'root',
            'password'=>''
        ];
    }
}