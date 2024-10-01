<?php
namespace Middleware;
use Modelo\UsuarioModelo;

class AuthMiddleware {
    static public function handler($param){
        $modelo = new UsuarioModelo();
        $user = $modelo->select([
            [
                "campo"=>"token",
                "operacion" => "=",
                "valor" => str_replace("Bearer ", "",$param["Authorization"])
            ],
            [
                "campo"=>"token_vencimiento",
                "operacion" => ">",
                "valor" => strtotime("now")
            ],
        ]);
        if(!empty($user) && sizeof($user) > 0){
            return $user;
        }else{
            throw new \Exception("token de usuario inválido");
        }
    }
}