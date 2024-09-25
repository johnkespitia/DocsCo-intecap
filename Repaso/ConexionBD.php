<?php
abstract class ConexionBD implements ILog{
    protected $username;
    protected $password;
    protected $host;
    protected $port;
    protected $conexion;
    
    abstract protected function configuracionConexion();

    public function __construct($username, $password, $host, $port){
        $this->username = $username;
        $this->password = $password;
        $this->host = $host;
        $this->port = $port;
    }

    public function getConexion(){
        return $this->conexion;
    }

    public function printError($error){
        return $error->getMessage();
    }
    public function printTrace($error){
        return $error->getTraceAsString();
    }
}
