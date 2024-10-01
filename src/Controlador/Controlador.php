<?php
namespace Controlador;

abstract class Controlador{

    protected $request;

    public function __construct($usuario=null){
        $request = file_get_contents('php://input');
        $requestArray = json_decode($request, true);
        $this->request = [
            "data"=> $requestArray,
            "post"=> $_POST,
            "get"=> $_GET,
            "files" => $_FILES,
            "headers" => getallheaders(),
            "usuario" => $usuario
        ];
    } 

    // public function addUsuario($usuario){
    //     $this->request["usuario"] = $usuario;
    // }

    public abstract function inicio();

    protected function retorno($valores, $codigo = 200){
        http_response_code($codigo);
        header('Content-type: application/json');
        return json_encode($valores);
    }
}