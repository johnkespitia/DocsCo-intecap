<?php
include 'vendor/autoload.php';
use Servicios\Enrutador;

$enrutador = new Enrutador();
$enrutador->addRuta(Enrutador::GET, "/saludo","Controlador\InicioControlador", "saludoAccion");
$enrutador->addRuta(Enrutador::GET, "/","Controlador\InicioControlador", "inicio");
try {
    echo $enrutador->ruta();
} catch (\Throwable $th) {
    $errorC = new Controlador\ErrorControlador();
    echo $errorC->error($th,500);
}
