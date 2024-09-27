<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

include 'vendor/autoload.php';

$cargadorDotEnv = Dotenv\Dotenv::createImmutable(__DIR__);
$cargadorDotEnv->load();

use Servicios\Enrutador;

$enrutador = new Enrutador();
$enrutador->addRuta(Enrutador::GET, "/saludo","Controlador\InicioControlador", "saludoAccion");
$enrutador->addRuta(Enrutador::GET, "/","Controlador\InicioControlador", "inicio");

$enrutador->addRuta(Enrutador::GET, "/usuarios","Controlador\UsuarioControlador", "inicio");
$enrutador->addRuta(Enrutador::POST, "/usuarios","Controlador\UsuarioControlador", "new");
$enrutador->addRuta(Enrutador::PUT, "/usuarios","Controlador\UsuarioControlador", "update");
$enrutador->addRuta(Enrutador::DELETE, "/usuarios","Controlador\UsuarioControlador", "delete");
try {
    echo $enrutador->ruta();
} catch (\Exception $th) {
    $errorC = new Controlador\ErrorControlador();
    echo $errorC->error($th,500);
}
