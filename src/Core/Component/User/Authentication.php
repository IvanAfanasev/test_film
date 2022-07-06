<?php
namespace Core\Component\User;

use Core\Traits\Singleton;

class Authentication{
    use Singleton;



    public static function login($id){
        $_SESSION['user']=[];
        $_SESSION['user']['id']=$id;
    }
    public static function logout(){
        $_SESSION['user']=[];
    }
    public static function isLogin(){
        if($_SESSION['user'] && isset($_SESSION['user']['id'])){
            return $_SESSION['user'];
        }else{
            return false;
        }
    }
}