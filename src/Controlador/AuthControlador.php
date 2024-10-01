<?php 
namespace Controlador;
use Modelo\UsuarioModelo;
class AuthControlador extends Controlador{
    public function inicio(){
        
        return $this->retorno(["usuarios"=>$this->request["headers"]], 200);
    }
    public function login(){
        $usuarioModelo = new UsuarioModelo();
        $body = $this->request["data"];
        $usuarioLogin = $usuarioModelo->select([
            [
                "campo"=>"email",
                "operacion" => "=",
                "valor" => $body["email"]
            ],
            [
                "campo"=>"password",
                "operacion" => "=",
                "valor" => md5($body["password"])
            ],
        ]);
        if(!empty($usuarioLogin) && sizeof($usuarioLogin) > 0){
            $token = hash("sha256",strtotime("now").$usuarioLogin[0]["email"]);
            $usuarioModelo->update([ 
                "token"=>$token, 
                "token_vencimiento"=>strtotime("+1 hour")
            ],$usuarioLogin[0]["id"]);
            return $this->retorno(["token"=>$token], 200);
        }else{
            return $this->retorno(["mensaje"=>"Error en la autenticación, verifique los datos"], 401);
        }
        
    }
}