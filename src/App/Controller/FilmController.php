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
            if(isset($request['Name']) && isset($request['Year']) && isset($request['Format']) && isset($request['Actors'])
                && $request['Name'] && $request['Actors']
            ) {
                $FilmModel = new Film();
                $FilmModel->add(Authentication::isLogin()['id'],$request['Format'],$request['Name'],$request['Year'],$request['Actors']);
                Helper::redirect('/');
            }else{
                View::instance()->message('error','заполните обязательные поля');
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

    public function importFilmPage(){
        if(Authentication::isLogin()){
            View::instance()->render('base','import-film');
        }else{
            Helper::redirect('/login');
        }
    }

    public function parse(){
        if(Authentication::isLogin()){
            if($_FILES['file']['type']=='text/plain'){
                $string = file_get_contents($_FILES['file']['tmp_name']);
                $FilmFormatModel = new FilmFormat();
                $filmFormat= $FilmFormatModel->getAll();
                $filmFormatList=[];
                foreach ($filmFormat as $val){
                    $filmFormatList[$val['name']]=$val['id'];
                }
                $string=str_replace('Title:', '*Title*', $string);
                $string=str_replace('Release Year:', '*Release Year*', $string);
                $string=str_replace('Format:', '*Format*', $string);
                $string=str_replace('Stars:', '*Stars*', $string);
                $string=ltrim(rtrim($string));
                $data = explode("*", $string);
                $result= [];
                $id=0;
                $title=0;
                $year=0;
                $format=0;
                $stars=0;
                foreach ($data as $key=>$val){
                    if($title==1){
                        $result[$id]['name']=ltrim(rtrim($val));
                        $title=0;
                    }
                    if($year==1) {
                        $result[$id]['year']=ltrim(rtrim($val));
                        $year=0;
                    }
                    if($format==1){
                        $result[$id]['format']=$filmFormatList[ltrim(rtrim($val))];
                        $format=0;
                    }
                    if($stars==1){
                        $result[$id]['actors']=ltrim(rtrim($val));
                        $stars=0;
                    }
                    if(ltrim(rtrim($val))=='Format')$format=1;
                    if(ltrim(rtrim($val))=='Release Year')$year=1;
                    if(ltrim(rtrim($val))=='Stars')$stars=1;
                    if(ltrim(rtrim($val))=='Title'){
                        $title=1;
                        $id++;
                    }
                }
                $user_id=Authentication::isLogin()['id'];
                $coll=0;
                foreach ($result as $insert){
                    $FilmModel = new Film();
                    $FilmModel->add($user_id,$insert['format'],$insert['name'],$insert['year'],$insert['actors']);
                    $coll++;
                }
                Helper::redirect('/');
            }else{
                View::instance()->message('error','некоректный формат файла');
                Helper::redirect('/import');
            }
        }else{
            Helper::redirect('/login');
        }
    }
}