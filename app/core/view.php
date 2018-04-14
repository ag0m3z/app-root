<?php

namespace core;

class View{

    private static $_view;
    private static $_nameView;

    public static function callView($view ){

        self::$_view = $view;
        self::$_nameView = "View".ucwords($view).".php";

        if(self::isValidView()){
            self::loadView();
        }

    }

    private static function loadView(){
        
        include "app/view/".self::$_view."/".self::$_nameView;

    }

    private static function isValidView(){

        $valid=false;

        if(file_exists($file =  "app/view/".self::$_view."/".self::$_nameView)){
            $valid = true;
        }else{
            self::Error("Error la vista solicitada no existe");
        }

        return $valid;

    }

    private static function Error($message){
        print  $message ;
    }
}