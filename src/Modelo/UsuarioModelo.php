<?php
namespace Modelo;

class UsuarioModelo extends Modelo{
    const TABLE_NAME = "usuarios";
    public  function select($args){
        /*
        [
            [
                "campo" => "",
                "operacion" => "",
                "valor" => "";
            ]
        ]
        */
        $whereStm = "";
        $values = [];
        if(sizeof($args)>0){
            $where =[];
            $values = [];
            foreach ($args as $value) {
                $where[] = "{$value['campo']} {$value['operacion']} :{$value['campo']}";
                $values[":{$value['campo']}"] = $value['valor'];
            }
            $whereStm =" where ".implode(" AND ", $where);
        }
        $query = $this->pdo->prepare("select id, nombre, email, rol from ".self::TABLE_NAME.$whereStm." LIMIT 100 ");
        $query->execute($values);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public  function insert($args){
        $query = $this->pdo->prepare("insert into ".self::TABLE_NAME." (nombre,email,rol,password) values (:nombre, :email, :rol, :password)");
        $result = $query->execute([
            ':nombre'=> $args['nombre'],
            ':email'=> $args['email'],
            ':rol'=> $args['rol'],
            ':password'=> $args['password'],
        ]);
        return $result;
    }
    public  function update($args, $id){
        $clave = array_keys($args);
        $campos = array_map(function($clave){
            return "$clave = :$clave ";
        }, $clave );
        $values = [":id"=>$id];
        foreach ($args as $key => $value) {
            $values[":{$key}"] = $value;
        }
        $query = $this->pdo->prepare("UPDATE ".self::TABLE_NAME." SET  ".implode(", ",$campos)." where id = :id");
        $result = $query->execute($values);
        return $result;
    }

    public  function delete($id){
        $query = $this->pdo->prepare("DELETE FROM ".self::TABLE_NAME." where id = :id");
        $result = $query->execute([":id"=>$id]);
        return $result;
    }
}