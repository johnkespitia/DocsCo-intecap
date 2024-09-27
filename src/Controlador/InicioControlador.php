<?php
namespace Controlador;
use Modelo\UsuarioModelo;
class InicioControlador extends Controlador{
    public function inicio(){
        return $this->retorno(["mensaje"=>"Bienvenido"]);
    }
    public function saludoAccion(){
        $usuario =  new UsuarioModelo();
        // $result = $usuario->select([
        //     [
        //         "campo" => "email",
        //         "operacion" => "=",
        //         "valor" => "john@correo"
        //     ],
        //     [
        //         "campo" => "password",
        //         "operacion" => "=",
        //         "valor" => md5("123456789")
        //     ],
        // ]);
        $result = $usuario->delete(2);
        return $this->retorno(["mensaje"=>"Hola Amigos Intecap", "resultados"=> $result], 200);
    }
}
