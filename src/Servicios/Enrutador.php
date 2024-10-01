<?php
namespace Servicios;

use Modelo\PDOConexion;

class Enrutador{

    const POST = "post";
    const GET = "get";
    const PUT = "put";
    const DELETE = "delete";

    protected $_getRutas;
    protected $_postRutas;
    protected $_putRutas;
    protected $_deleteRutas;
    protected $_middlewares;

    public function __construct(){
        $this->_getRutas = [];
        $this->_postRutas = [];
        $this->_putRutas = [];
        $this->_deleteRutas = [];
    }

    public function addRuta($metodoHTTP, $ruta, $objetoControlador, $callback, $middleware = null){
        switch($metodoHTTP){
            case self::GET:
                $this->_getRutas[$ruta] = [$objetoControlador, $callback, $middleware];
                break;
            case self::POST:
                $this->_postRutas[$ruta] = [$objetoControlador, $callback, $middleware];
                break;
            case self::PUT:
                $this->_putRutas[$ruta] = [$objetoControlador, $callback, $middleware];
                break;
            case self::DELETE:
                $this->_deleteRutas[$ruta] = [$objetoControlador, $callback, $middleware];
                break;
            default:
                $this->_getRutas[$ruta] = [$objetoControlador, $callback, $middleware];
                break;
        }
    }

    public function ruta(){
        try {
            $urlFull = $_SERVER["REQUEST_URI"];
            $url = explode("?",$urlFull)[0];
            $metodoHTTP = $_SERVER["REQUEST_METHOD"];
            $usuario = null;
            if($metodoHTTP == "GET"){
                if(!empty($this->_getRutas[$url])){
                    if(!empty($this->_getRutas[$url][2]) && $this->_getRutas[$url][2] != null){
                        $usuario = $this->_getRutas[$url][2]::handler(getallheaders());
                    }
                    $objeto = new $this->_getRutas[$url][0]($usuario);
                    $metodo = $this->_getRutas[$url][1];
                    return $objeto->$metodo();
                }
            }elseif($metodoHTTP == "POST"){
                if(!empty($this->_postRutas[$url])){
                    if(!empty($this->_postRutas[$url][2]) && $this->_postRutas[$url][2] != null){
                        $usuario = $this->_postRutas[$url][2]::handler(getallheaders());
                    }
                    $objeto = new $this->_postRutas[$url][0]($usuario);
                    $metodo = $this->_postRutas[$url][1];
                    return $objeto->$metodo();
                }
            }elseif($metodoHTTP == "PUT"){
                if(!empty($this->_putRutas[$url])){
                    if(!empty($this->_putRutas[$url][2]) && $this->_putRutas[$url][2] != null){
                        $usuario = $this->_putRutas[$url][2]::handler(getallheaders());
                    }
                    $objeto = new $this->_putRutas[$url][0]($usuario);
                    $metodo = $this->_putRutas[$url][1];
                    return $objeto->$metodo();
                }
            }elseif($metodoHTTP == "DELETE"){
                if(!empty($this->_deleteRutas[$url])){
                    if(!empty($this->_deleteRutas[$url][2]) && $this->_deleteRutas[$url][2] != null){
                        $usuario = $this->_deleteRutas[$url][2]::handler(getallheaders());
                    }
                    $objeto = new $this->_deleteRutas[$url][0]($usuario);
                    $metodo = $this->_deleteRutas[$url][1];
                    return $objeto->$metodo();
                }
            }
            echo "Estas llamando a $url por $metodoHTTP";
        } catch (\Exception $th) {
            throw $th;
        }
        
    }
}
