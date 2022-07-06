<?php
namespace Core\Component\View;

use Core\Traits\Singleton;

class View{
    use Singleton;


    public function render($template, $page, $data=[]){
        include('src/App/View/Template/'.$template.'.php');
    }

}