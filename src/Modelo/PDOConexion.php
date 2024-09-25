<?php
namespace Modelo;

class PDOConexion{
    public function conectar(){
        try {
            $dns="mysql:host=$host;dbname=$dbname";
            $pdo = new \PDO($dns, $username, $password);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}