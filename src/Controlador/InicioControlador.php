<?php
namespace Controlador;
use Modelo\UsuarioModelo;
class InicioControlador extends Controlador{
    public function inicio(){
        return $this->retorno(["mensaje"=>"Bienvenido"]);
    }
    public function saludoAccion(){
        $usuario =  new UsuarioModelo();
        $result = $usuario->insert([
            'nombre'=> "John",
            'email'=> "john@correo",
            'rol'=> 1,
            'password'=> md5("123456789"),
        ]);
        return $this->retorno(["mensaje"=>"Hola Amigos Intecap", "resultados"=> $result], 200);
    }
}
