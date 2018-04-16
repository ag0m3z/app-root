<?php

include "../core/core.php";
include "../core/session.php";

use core\CoreApp,
    core\Session;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    Session::delete_sesion();
    CoreApp::getResponseJson('Session terminada correctamente',true,[]);

}else{

    CoreApp::getResponseJson('Metodo no soportado');

}
