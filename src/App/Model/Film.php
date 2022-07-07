<?php
namespace App\Model;

use Core\Component\DataBase\DataBase;
use Core\Component\Helper;

class Film{

    private $table='film';

    /**
     * @param $user_id
     * @param $format_id
     * @param $name
     * @param $year
     * @param $actors
     * @return bool
     */
    public function add($user_id, $format_id,$name,$year,$actors){
        DataBase::instance()->insert($this->table, ['user_id'=>$user_id,'format_id'=>$format_id,'name'=>$name,'year'=>$year,'actors'=>$actors]);
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function remove($id){
        $WHERE =  Helper::WHERE([
            ['key'=>'id','val'=>$id,'compare'=>'='],
        ]);
        $sql = "DELETE FROM ".$this->table.$WHERE;
        DataBase::instance()->query($sql);
        return true;
    }

    /**
     * @param $findName
     * @param $findActors
     * @return array|false
     */
    public function getList($findName=false,$findActors=false){
        $WHERE =  Helper::WHERE([
            ['col1'=>'film.format_id','col2'=>'film_format.id','compare'=>'=']
        ]);
        if($findName){
            $WHERE.=  substr(Helper::WHERE([
                ['operator'=>'AND'],
                ['key'=>'film.name','val'=>"%".addcslashes($findName,"'")."%",'compare'=>'like'],
            ]),7);
        }
        if($findActors){
            $WHERE.=  substr(Helper::WHERE([
                ['operator'=>'AND'],
                ['key'=>'film.actors','val'=>"%".$findActors."%",'compare'=>'like'],
            ]),7);
        }

        $sql = "SELECT film.*,film_format.name as film_format FROM ".$this->table.",film_format ".$WHERE." ORDER BY film.name";
        return DataBase::instance()->query($sql)->fetchAll();
    }

    public function getForID($id){
        $WHERE =  Helper::WHERE([
            ['key'=>'film.id','val'=>$id,'compare'=>'='],
            ['operator'=>'AND'],
            ['col1'=>'film.format_id','col2'=>'film_format.id','compare'=>'=']
        ]);
        $sql = "SELECT film.*,film_format.name as film_format FROM ".$this->table.",film_format ".$WHERE;
        return DataBase::instance()->query($sql)->fetchAll()[0];
    }
}