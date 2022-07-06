<?php
namespace App\Controller;

use App\Model\User;
use Core\Component\Helper;
use Core\Component\Http\Request;
use Core\Component\User\Authentication;
use Core\Component\View\View;


class UserController{

    public function userLoginPage(){
        if(Authentication::isLogin()){
            Helper::redirect('/');
        }else{
            View::instance()->render('base','login');
        }
    }

    public function userLogout(){
        Authentication::logout();
        Helper::redirect('/login');
    }

    public function userLogin(){
        $request= Request::instance()->getPost();
        if(isset($request['Email']) and isset($request['Password'])){
            $this->authentication($request['Email'],$request['Password']);
        }
    }

    public function userRegistration(){
        $request = Request::instance()->getPost();
        if(isset($request['Name']) && isset($request['Email']) && isset($request['Password'])){
            $user=new User();
            $user->add($request['Name'],$request['Email'],$request['Password']);
            $this->authentication($request['Email'],$request['Password']);
            Helper::redirect('/');
        }else{
            Helper::redirect('/login');
        }

    }


    public function authentication($email,$password){
        $user=new User();
        $result =  $user->getForEmailPassword($email,$password);
        if($result ){
            $result= $result->fetchAll();
            if(isset($result[0]) && isset($result[0]['id'])){
                Authentication::login($result[0]['id']);
                Helper::redirect('/');
            }else{
                Helper::redirect('/login');
            }
        }else{
            Helper::redirect('/login');
        }
    }
}