<?php
namespace Controlador;
use Modelo\UsuarioModelo;
class UsuarioControlador extends Controlador{
    public function inicio(){
        $usuario = new UsuarioModelo();
        $results=$usuario->select([]);
        return $this->retorno(["usuarios"=>$results]);
    }
    public function new(){
        $usuario = new UsuarioModelo();
        $body = $this->request["data"];
        $body["password"]=md5($body["password"]);
        $usuarioCreado = $usuario->insert($body);
        return $this->retorno(["usuarios"=>$usuarioCreado]);
    }
}