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
try {
    echo $enrutador->ruta();
} catch (\Exception $th) {
    $errorC = new Controlador\ErrorControlador();
    echo $errorC->error($th,500);
}
