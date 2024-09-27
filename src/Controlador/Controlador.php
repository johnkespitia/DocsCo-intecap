<?php
namespace Controlador;

abstract class Controlador{

    protected $request;

    public function __construct(){
        $request = file_get_contents('php://input');
        $requestArray = json_decode($request, true);
        $this->request = [
            "data"=> $requestArray,
            "post"=> $_POST,
            "get"=> $_GET,
            "files" => $_FILES
        ];
    } 

    public abstract function inicio();

    protected function retorno($valores, $codigo = 200){
        http_response_code($codigo);
        header('Content-type: application/json');
        return json_encode($valores);
    }
}