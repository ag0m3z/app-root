<?php

namespace app;

use core\View,
    core\Session,
    core\CoreApp;

class App {

    private static function ConfigApp(){

    }

    public static function run(){

        self::ConfigApp();

        include 'app/core/core.php';
        include 'app/core/view.php';
        include 'app/core/session.php';

        if(Session::getExisteSesion()){

            View::callView('home');

        }else{
            View::callView('login');
        }
        
        
    }

}

App::run();