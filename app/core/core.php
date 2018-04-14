<?php
namespace core;


//Headers para evitar el cache en el Navegador
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


class CoreApp {


    public static function Test(){
        echo "123";
    }

    /**
     * Funcion para Retornar la respuesta con Header JSON
     */
    public static function HeaderContetType($Type = "JSON"){

        $Type = strtolower($Type);

        echo header("Content-Type: application/$Type; charset=utf-8");

    }
    /**
     * Funcion para Incluir los Ficheros CSS solicitados, por archivo o toda la carpeta
     */
    public static function includeCSS($dir_path,$all_folder = false){
        if($all_folder){
            // Recorrer todas las hojas de estilo y agregarlas
            $path = $dir_path;
            $handle=opendir($path);
            if($handle){
                while (false !== ($entry = readdir($handle)))  {
                    if($entry!="." && $entry!=".."){
                        $fullpath = $path.$entry;
                        if(!is_dir($fullpath)){
                            echo "<link rel='stylesheet' type='text/css' href='".$fullpath."' />";

                        }
                    }
                }
                closedir($handle);
            }
        }else{
            // Adjuntar solo la Hoja de Estilo solicitada
            echo "<link rel='stylesheet' type='text/css' href='".$dir_path."' />";
        }
    }

    /**
     * Funcion para Incluir los Ficheros JS solicitados, por archivo o toda la carpeta
     */
    public static function includeJS($dir_path,$all_folder = false){
        if($all_folder){
            // Agregar todos los js y agregarlos
            $path = $dir_path;
            $handle=opendir($path);
            if($handle){
                while (false !== ($entry = readdir($handle)))  {
                    if($entry!="." && $entry!=".."){
                        $fullpath = $path.$entry;
                        if(!is_dir($fullpath)){

                            echo "<script type='text/javascript' src='".$fullpath."'></script>";

                        }
                    }
                }
                closedir($handle);
            }
        }else{
            // Agregar solo el js Solicitado
            echo "<script type='text/javascript' src='".$dir_path."'></script>";
        }
    }

    /**
     * Funcion para retornar una respuesta en formato JSON
     */
    public static function getResponseJson($message = 'datos invalidos',$result = false, $data = array() ){

        echo json_encode(array('result'=>$result,'message'=>$message,'data'=>$data) );

    }


}