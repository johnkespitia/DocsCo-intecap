<?php
namespace Modelo;

class UsuarioModelo extends Modelo{
    const TABLE_NAME = "usuarios";
    public  function select($args){
        //
    }
    public  function insert($args){
        $query = $this->pdo->prepare("insert into usuarios (nombre,email,rol,password) values (:nombre, :email, :rol, :password)");
        $result = $query->execute([
            ':nombre'=> $args['nombre'],
            ':email'=> $args['email'],
            ':rol'=> $args['rol'],
            ':password'=> $args['password'],
        ]);
        return $result;
    }
    public  function update($args, $id){
        //
    }
    public  function delete($id){
        //
    }
}