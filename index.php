<?php
include 'vendor/autoload.php';
use Servicios\Enrutador;
use Controlador\InicioControlador;

$inicioControlador = new InicioControlador();
$enrutador = new Enrutador();
$enrutador->addRuta(Enrutador::GET, "/saludo",$inicioControlador, "saludoAccion");

echo $enrutador->ruta();