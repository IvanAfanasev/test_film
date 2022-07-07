<?php
namespace Core;

use App\Config\RouterConfig;
use App\Model\Dog;
use Core\Component\Http\Request;
use Core\Component\Route\Route;
use Core\Traits\Singleton;

class Core{
    use Singleton;


    public function run(){
        $this->session();
        RouterConfig::initial();
        Request::instance()->initial();
        Route::instance()->route($_SERVER['REQUEST_URI']);

    }

    private function session(){
        session_start();
        if(!isset($_SESSION['user'])) $_SESSION['user']=[];
        if(!isset($_SESSION['message'])) $_SESSION['message']=[];
    }

}