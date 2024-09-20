<?php
include 'ILog.php';
include 'ConexionBD.php';
include 'ConexionMySQL.php';
include 'ConexionSQLite.php';
include 'LogFunctionSentry.php';

define("DB_HOST","localhost");
define("DB_USERNAME","root");
define("DB_PORT","3306");
define("DB_PASSWORD","*************");

class Carro implements ILog{
    public $marca;
    public function printError($error){
        return $error->getMessage();
    }
    public function printTrace($error){
        return $error->getTraceAsString();
    }
    public function except(){
        throw new Exception("Error en carro, se pinchó", 600);
    }
} 

try{
    $conexion = new ConexionSQLite(DB_USERNAME,DB_PASSWORD,DB_HOST, DB_PORT);
    // var_dump($conexion);
    $conexion->putConexion();
    echo $conexion->getConexion();
    // throw new Exception("Algo salió mal!", 500);
    $c = new Carro();
    $c->except();
}catch(Exception $e){
    LogFunctionSentry::Log($c,$e);
}

