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

    public function __construct(){
        $this->_getRutas = [];
        $this->_postRutas = [];
        $this->_putRutas = [];
        $this->_deleteRutas = [];
    }

    public function addRuta($metodoHTTP, $ruta, $objetoControlador, $callback){
        switch($metodoHTTP){
            case self::GET:
                $this->_getRutas[$ruta] = [$objetoControlador, $callback];
                break;
            case self::POST:
                $this->_postRutas[$ruta] = [$objetoControlador, $callback];
                break;
            case self::PUT:
                $this->_putRutas[$ruta] = [$objetoControlador, $callback];
                break;
            case self::DELETE:
                $this->_deleteRutas[$ruta] = [$objetoControlador, $callback];
                break;
            default:
                $this->_getRutas[$ruta] = [$objetoControlador, $callback];
                break;
        }
    }

    public function ruta(){
        $url = $_SERVER["REQUEST_URI"];
        $metodoHTTP = $_SERVER["REQUEST_METHOD"];
        if($metodoHTTP == "GET"){
            if(!empty($this->_getRutas[$url])){
                $objeto = new $this->_getRutas[$url][0](); //($pdo);
                $metodo = $this->_getRutas[$url][1];
                return $objeto->$metodo();
            }
        }elseif($metodoHTTP == "POST"){
            if(!empty($this->_postRutas[$url])){
                $objeto = new $this->_postRutas[$url][0](); //($pdo);
                $metodo = $this->_postRutas[$url][1];
                return $objeto->$metodo();
            }
        }
        }elseif($metodoHTTP == "PUT"){
            if(!empty($this->_putRutas[$url])){
                $objeto = new $this->_putRutas[$url][0](); //($pdo);
                $metodo = $this->_putRutas[$url][1];
                return $objeto->$metodo();
            }
        }
        }elseif($metodoHTTP == "DELETE"){
            if(!empty($this->_deleteRutas[$url])){
                $objeto = new $this->_deleteRutas[$url][0](); //($pdo);
                $metodo = $this->_deleteRutas[$url][1];
                return $objeto->$metodo();
            }
        }
        echo "Estas llamando a $url por $metodoHTTP";
    } 
}
