<?php
namespace Modelo;

class PDOConexion{
    public function conectar(){ 
        try {
            
            $dns="mysql:host={$_ENV['DATABASE_HOST']};dbname={$_ENV['DATABASE_DBNAME']}";
            $pdo = new \PDO($dns, $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD']);
        } catch (\Throwable $th) {
           throw $th;
        }

    }
}