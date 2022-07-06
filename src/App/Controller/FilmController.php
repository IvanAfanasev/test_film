<?php
namespace App\Controller;

use App\Model\Film;
use App\Model\FilmFormat;
use Core\Component\Helper;
use Core\Component\Http\Request;
use Core\Component\User\Authentication;
use Core\Component\View\View;

class FilmController{

    public function newFilmPage(){
        if(Authentication::isLogin()){
            $FilmFormatModel = new FilmFormat();
            View::instance()->render('base','new-film',['film-format'=>$FilmFormatModel->getAll()]);
        }else{
            Helper::redirect('/login');
        }

    }

    public function addFilm(){
        if(Authentication::isLogin()){
            $request = Request::instance()->getPost();
            if(isset($request['Name']) && isset($request['Year']) && isset($request['Format']) && isset($request['Actors'])) {
                $FilmModel = new Film();
                $FilmModel->add(Authentication::isLogin()['id'],$request['Format'],$request['Name'],$request['Year'],$request['Actors']);
                Helper::redirect('/');
            }else{
                Helper::redirect('/new-film');
            }

        }else{
            Helper::redirect('/login');
        }
    }

    public function listFilmsPage(){
        $request = Request::instance()->getPost();
        $findName=false;
        $findActor=false;
        if(isset($request['find_film_name'])){
            $findName=$request['find_film_name'];
        }
        if(isset($request['find_film_actor'])){
            $findActor=$request['find_film_actor'];
        }

        $FilmModel = new Film();
        View::instance()->render('base','list-films',['films'=> $FilmModel->getList($findName,$findActor)]);
    }

    public function filmPage($id){
        $FilmModel = new Film();
        $film = $FilmModel->getForID($id);
        if($film){
            $removeButton=false;
            if(Authentication::isLogin() and Authentication::isLogin()['id']==$film['user_id']){
                $removeButton=true;
            }

            View::instance()->render('base','film',['film'=>$film,'remove_button'=>$removeButton ]);
        }else{
            Helper::redirect('/');
        }
    }

    public function removeFilm($id){
        if(Authentication::isLogin()){
            $FilmModel = new Film();
            $FilmModel->remove($id);
            Helper::redirect('/');
        }else{
            Helper::redirect('/login');
        }
    }
}