<?php
// include 'ConexionBD_.php';
// include_once 'ConexionBD.php';
// include_once
// require_once 'ConexionBD.php';
// require_once
class ConexionSQLite extends ConexionBD{
    protected function configuracionConexion(){
        $this->conexion = "<h1>Conectado a SQLite</h1>";
    }
    public function putConexion(){
        $this->configuracionConexion();
    }
}