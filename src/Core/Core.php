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
        session_start();
        RouterConfig::initial();
        Request::instance()->initial();
        Route::instance()->route($_SERVER['REQUEST_URI']);


       /**
        * обработка запроса
        * получение метода
        * вызов метода
        */
    }

}
/**
 * иденитификация пользователя
 * подключение к базе данных
 * шаблонитизатор твиг
 * респонс 
 */