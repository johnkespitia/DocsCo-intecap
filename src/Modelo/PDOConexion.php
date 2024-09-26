<?php
namespace Modelo;

class PDOConexion{
    private static $instancia = null;
    private $pdo;

    private function __construct(){
        $this->conectar();
    }

    public static function getInstancia(){
        if(self::$instancia === null){
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    private function conectar(){
        try {
            $dns="{$_ENV['DATABASE_DRIVER']}:host={$_ENV['DATABASE_HOST']};dbname={$_ENV['DATABASE_DBNAME']}";
            $this->pdo = new \PDO($dns, $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD']);
        } catch (\Throwable $th) {
            throw new \Exception("Error al conectar a la base de datos: " . $th->getMessage());
        }
    }

    public function getPDO() {
        return $this->pdo;
    }
}