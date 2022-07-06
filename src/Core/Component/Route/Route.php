<?php
namespace Core\Component\Route;

use Core\Traits\Singleton;

class Route{
    use Singleton;

    private $route =[];

    public function get($pattern, $callback){
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $this->route[$pattern] = $callback;
    }

    public function post($pattern, $action){
        $this->get($pattern,$action);
    }

    public function route($url){
        foreach (   $this->route as $pattern => $callback) {
            if (preg_match($pattern, $url, $params)) {
                array_shift($params);
                return call_user_func_array($callback, array_values($params));
            }
        }
    }
}