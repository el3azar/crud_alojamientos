<?php


class Connection {

    //metodo que nos conecte a la bd
    public static function connect(){
        try{
            $dsn = 'mysql:host=localhost;dbname=accommodations;charset=utf8';
            $user = 'root';
            $password = '3005'; 
            //creando la instancia de PDO
            $pdo = new PDO($dsn, $user, $password);
            return $pdo; //retornar un objeto
        }catch(PDOException $e){
            echo "Error al conectarnos a la base de datos" . $e->getMessage();
            exit();
        }
    }
}