<?php
namespace Controlador;

class ErrorControlador extends Controlador{
    public function inicio(){}
    public function error($ex){
        $this->retorno($ex, 500);
    }
}