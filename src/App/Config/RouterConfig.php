<?php
namespace App\Config;


use App\Controller\FilmController;
use App\Controller\UserController;
use Core\Component\Http\Request;
use Core\Component\Route\Route;
use Core\Component\View\View;

class RouterConfig{
    public static function initial(){

        Route::instance()->get('/', function(){
            $controller = new FilmController();
            $controller->listFilmsPage();
        });


        Route::instance()->get('/login', function(){
            $controller = new UserController();
            $controller->userLoginPage();
        });
        Route::instance()->get('/logout', function(){
            $controller = new UserController();
            $controller->userLogout();
        });
        Route::instance()->post('/user_login', function (){
            $controller = new UserController();
            $controller->userLogin();
        });
        Route::instance()->post('/user_registration', function (){
            $controller = new UserController();
            $controller->userRegistration();
        });

        Route::instance()->get('/new-film', function (){
            $controller = new FilmController();
            $controller->newFilmPage();
        });
        Route::instance()->post('/add-film', function (){
            $controller = new FilmController();
            $controller->addFilm();
        });

        Route::instance()->get('/film/(\d+)', function($id){
            $controller = new FilmController();
            $controller->filmPage($id);
        });

        Route::instance()->get('/remove-film/(\d+)', function($id){
            $controller = new FilmController();
            $controller->removeFilm($id);
        });


        Route::instance()->get('/import', function (){
            $controller = new FilmController();
            $controller->importFilmPage();
        });
        Route::instance()->get('/parse', function (){
            $controller = new FilmController();
            $controller->parse();
        });





    }


}
