<?php

require_once "./class/Connection.php";

class User{

    //metodo para obtener todos los usuarios
    public static function all(){
        $conection = Connection::connect(); //tengo el objeto con la informacion de la bd

        //generar una consulta sql
        $query = $conection->query("SELECT user_id, name,last_name, email FROM user"); //creando la consulta
        $query->execute(); //true / false

        $result = $query->fetchAll(PDO::FETCH_ASSOC); //arreglo de datos
        return $result;

    }
}
