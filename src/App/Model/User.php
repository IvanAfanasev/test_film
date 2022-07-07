<?php
namespace App\Model;

use Core\Component\DataBase\DataBase;
use Core\Component\Helper;

class User{

    private $table='users';

    /**\
     * @param $name
     * @param $email
     * @param $password
     * @return bool
     */
    public function add($name,$email,$password){
        $password = md5($password);
        DataBase::instance()->insert($this->table, ['email'=>$email,'name'=>$name,'password'=>$password]);
        return true;
    }

    /**
     * @param $email
     * @param $password
     * @return false|\PDOStatement
     */
    public function getForEmailPassword($email,$password){
        $password = md5($password);
        $WHERE =  Helper::WHERE([
            ['key'=>'email','val'=>$email,'compare'=>'='],
            ['operator'=>'AND'],
            ['key'=>'password','val'=>$password,'compare'=>'=']
        ]);
        $sql = "SELECT * FROM ".$this->table.$WHERE;
        return DataBase::instance()->query($sql);
    }

}