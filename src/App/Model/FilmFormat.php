<?php
namespace App\Model;

use Core\Component\DataBase\DataBase;

class FilmFormat{
    private $table='film_format';

    public function getAll(){
        $sql = "SELECT * FROM ".$this->table;
        $res = DataBase::instance()->query($sql);
        return $res->fetchAll();
    }

}