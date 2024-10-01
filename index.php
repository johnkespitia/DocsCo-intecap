<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

include 'vendor/autoload.php';

$cargadorDotEnv = Dotenv\Dotenv::createImmutable(__DIR__);
$cargadorDotEnv->load();

use Servicios\Enrutador;

$enrutador = new Enrutador();
$enrutador->addRuta(Enrutador::POST, "/login","Controlador\AuthControlador", "login");
$enrutador->addRuta(Enrutador::GET, "/saludo","Controlador\InicioControlador", "saludoAccion");
$enrutador->addRuta(Enrutador::GET, "/","Controlador\InicioControlador", "inicio");

$enrutador->addRuta(Enrutador::GET, "/usuarios","Controlador\UsuarioControlador", "inicio", "Middleware\AuthMiddleware");
$enrutador->addRuta(Enrutador::POST, "/usuarios","Controlador\UsuarioControlador", "new", "Middleware\AuthMiddleware");
$enrutador->addRuta(Enrutador::PUT, "/usuarios","Controlador\UsuarioControlador", "update", "Middleware\AuthMiddleware");
$enrutador->addRuta(Enrutador::DELETE, "/usuarios","Controlador\UsuarioControlador", "delete", "Middleware\AuthMiddleware");
try {
    echo $enrutador->ruta();
} catch (\Exception $th) {
    $errorC = new Controlador\ErrorControlador();
    echo $errorC->error($th,500);
}
