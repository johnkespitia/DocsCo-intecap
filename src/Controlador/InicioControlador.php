<?php
namespace Controlador;
use Modelo\PDOConexion;
class InicioControlador extends Controlador{
    public function inicio(){
        return $this->retorno(["mensaje"=>"Bienvenido"]);
    }
    public function saludoAccion(){
        $db = new PDOConexion();
        $db->conectar();
        return $this->retorno(["mensaje"=>"Hola Amigos Intecap", "env"=> $_ENV], 404);
    }
}
