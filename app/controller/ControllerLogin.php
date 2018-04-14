<?php

include "../core/core.php";
include "../core/session.php";


use core\CoreApp,
    core\Session;


CoreApp::HeaderContetType();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $data = json_decode( file_get_contents( 'php://input' ), true );

    Session::setSession(
        'DataLogin',
        array(
            'key'=>$data['key'],
            'idusuario'=>$data['idusuario'],
            'idperfil'=>$data['idperfil'],
            'nombre'=>$data['nombre']
        )
    );

    CoreApp::getResponseJson('cosulta exitosa',true);

}else{
    CoreApp::getResponseJson('Metodo no soportado');
}

