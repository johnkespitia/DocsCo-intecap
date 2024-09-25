<?php
namespace Controlador;

abstract class Controlador{
    public abstract function inicio();

    protected function retorno($valores, $codigo = 200){
        http_response_code($codigo);
        header('Content-type: application/json');
        return json_encode($valores);
    }
}