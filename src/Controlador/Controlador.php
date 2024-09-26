<?php
namespace Controlador;

abstract class Controlador{

    // protected $pdo;

    // public function __construct($pdo=null){
    //     $this->pdo = $pdo;
    // } 

    public abstract function inicio();

    protected function retorno($valores, $codigo = 200){
        http_response_code($codigo);
        header('Content-type: application/json');
        return json_encode($valores);
    }
}