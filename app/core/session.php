<?php
namespace core;

use core\CoreApp;

session_name('sysapp');
session_start();
session_id();

class Session {


    public static function setSession($nombre_array,$datos = array()){
        
        $_SESSION[$nombre_array] = $datos ;

    }

    public static function get($nombre_array,$nombre) {

        if (isset ( $_SESSION [$nombre_array][$nombre] )) {

            return $_SESSION [$nombre_array][$nombre];

        } else {

            return false;

        }
    }

    public static function eliminar($nombre_array,$nombre) {
        unset ($_SESSION [$nombre_array][$nombre] );
    }

    public static function getExisteSesion(){

        if(array_key_exists('DataLogin',$_SESSION)){

            if(!isset($_SESSION['DataLogin']['idusuario'])){
                self::delete_sesion();
                return false;
            }else{
                return true;
            }

        }else{
            self::delete_sesion();
            return false;
        }

    }

    public static function delete_sesion() {

        session_unset ();
        session_destroy ();
        session_start();
        session_regenerate_id(true);
    }


}