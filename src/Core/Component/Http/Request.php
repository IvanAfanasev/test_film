<?php

namespace Core\Component\Http;


use Core\Traits\Singleton;


/**
 * Class Request
 * @package Core\Space\System\Http
 */
class Request
{
    use Singleton;

    private $post = [];

    public function initial(){
        foreach ($_POST as $item =>  $value){
            $this->post[$this->clean($item)]=$this->clean($value);
        }
        return true;
    }

    public function getPost(){
        return $this->post;
    }

    private function clean($value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

}