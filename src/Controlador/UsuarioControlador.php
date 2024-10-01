<?php
namespace Controlador;
use Modelo\UsuarioModelo;
class UsuarioControlador extends Controlador{
    public function inicio(){
        $usuario = new UsuarioModelo();
        $results=$usuario->select([]);
        return $this->retorno(["usuarios"=>$results, "usuario"=>$this->request["usuario"]], 200);
    }
    public function new(){
        $usuario = new UsuarioModelo();
        $body = $this->request["data"];
        $body["password"]=md5($body["password"]);
        $usuarioCreado = $usuario->insert($body);
        return $this->retorno(["usuarios"=>$usuarioCreado], 201);
    }
    public function update(){
        $usuario = new UsuarioModelo();
        $get_params = $this->request["get"];
        $id = $get_params["id"];
        $body = $this->request["data"];
        $usuarioCreado = $usuario->update($body, $id);
        return $this->retorno(["usuarios"=>$usuarioCreado], 200);
    }
    public function delete(){
        $usuario = new UsuarioModelo();
        $get_params = $this->request["get"];
        $id = $get_params["id"];
        $usuarioCreado = $usuario->delete($id);
        return $this->retorno(["usuarios"=>$usuarioCreado], 200);
    }
}