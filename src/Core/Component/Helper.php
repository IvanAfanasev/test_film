<?php
namespace Core\Component;


class Helper{


    public static function redirect($uri){
        header("Location: $uri");
        die();
    }

    //WHERE
    public static function wh($key,$val){
        return "`$key` = '".$val."'";
    }


    public static function WHERE($array){
        $WHERE=' WHERE ';
        foreach ($array as $value){
            if(isset($value['operator'])){
                $WHERE.=" ".$value['operator']." ";
            }elseif(isset($value['col1'])){
                $WHERE.=$value['col1']." ".$value['compare']." ".$value['col2'];
            }else{
                $WHERE.=$value['key']." ".$value['compare']." '".$value['val']."'";
            };
        }
        return $WHERE;
    }


    public static function dump($array){
        echo '<pre>';
        var_dump($array);
    }
}
