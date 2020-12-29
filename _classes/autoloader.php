<?php


class Autoloader{

    static function register(){
        spl_autoload_register(function($class){
            require_once 'models/'.$class.'.php';

        });
    }
}