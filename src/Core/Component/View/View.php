<?php
namespace Core\Component\View;

use Core\Component\Helper;
use Core\Traits\Singleton;

class View{
    use Singleton;



    public function render($template, $page, $data=[]){
        $messages=$this->getMessages();
        include('src/App/View/Template/'.$template.'.php');
        $this->clearMessages();
    }

    public function message($type,$message){
        $_SESSION['message'][$type][]=$message;
    }
    public function getMessages(){
        return $_SESSION['message'];
    }

    public function clearMessages(){
        $_SESSION['message']=[];
    }

}