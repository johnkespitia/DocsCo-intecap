<?php
namespace Servicios;
use Controlador\InicioControlador;
class Enrutador{

    const POST = "post";
    const GET = "get";

    protected $_getRutas;
    protected $_postRutas;

    public function __construct(){
        $this->_getRutas = [];
        $this->_postRutas = [];
    }

    public function addRuta($metodoHTTP, $ruta, $objetoControlador, $callback){
        switch($metodoHTTP){
            case "get":
                $this->_getRutas[$ruta] = [$objetoControlador, $callback];
                break;
            case "post":
                $this->_postRutas[$ruta] = [$objetoControlador, $callback];
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
                $objeto = $this->_getRutas[$url][0];
                $metodo = $this->_getRutas[$url][1];
                return $objeto->$metodo();
            }
        }else{
            if(!empty($this->_postRutas[$url])){
                $objeto = $this->_getRutas[$url][0];
                $metodo = $this->_getRutas[$url][1];
                return $objeto->$metodo();
            }
        }
        echo "Estas llamando a $url por $metodoHTTP";
    } 
}
