<?php
namespace Modelo;
abstract class Modelo{
    protected $pdo;

    public function __construct(){
        $this->pdo = PDOConexion::getInstancia()->getPDO();
    } 
    
    public abstract function select($args);
    public abstract function insert($args); 
    public abstract function update($args, $id); 
    public abstract function delete($id); 
}