<?php
require_once "./class/Connection.php";

class Accommodation{
    
    private $name;
    private $address;
    private $description;
    private $price;
    private $imagen;
    private $user_id;

    public function __construct( $name, $address, $description, $price, $imagen, $user_id){
        $this->name = $name;
        $this->address = $address;
        $this->description = $description;
        $this->price = $price;
        $this->imagen = $imagen;
        $this->user_id = $user_id;
    }
    

    //metodo para guardar un alojamiento
    public function saveAccommodation(){
        try{
            $pdo = Connection::connect();
            //preparando la consulta
            $query = $pdo->prepare("INSERT INTO Accommodation(name, address, description, price, imagen, user_id) VALUES (?, ?, ?, ?, ?,?)");

            //ejecutamos la consulta
            $result = $query->execute(["$this->name","$this->address","$this->description",$this->price,"$this->imagen", $this->user_id]);

           
        }catch(PDOException $e){
            echo "Error al registrar una tarea: " . $e->getMessage();
        }
    }

    //metodo para obtener la informacion de los alojamientos segun el usuario
    public static function getAccommodation($user_id){
        //conexion a la bd
        $pdo = Connection::connect();

        $query = $pdo->query("SELECT * FROM accommodation WHERE user_id = $user_id");
        $query->execute();
        //esa informacion se retorne en un arreglo
        $array = $query->fetchAll(PDO::FETCH_ASSOC); //[]
        return $array;
    }
    
    // Método para actualizar un alojamiento
    public static function updateAccommodation($accommodation_id, $name, $address, $description, $price, $imagen) {
        try {
            $pdo = Connection::connect();
    
            // Obtener el registro actual
            $query = $pdo->prepare("SELECT * FROM Accommodation WHERE accommodation_id = ?");
            $query->execute([$accommodation_id]);
            $currentData = $query->fetch(PDO::FETCH_ASSOC);
    
            // Comparar si los valores son diferentes
            if (
                $currentData['name'] === $name &&
                $currentData['address'] === $address &&
                $currentData['description'] === $description &&
                $currentData['price'] == $price &&
                $currentData['imagen'] === $imagen
            ) {
                echo "No hay cambios para actualizar.";
                return;
            }
    
            // Ejecutar la actualización si hay cambios
            $query = $pdo->prepare("UPDATE Accommodation SET name = ?, address = ?, description = ?, price = ?, imagen = ? WHERE accommodation_id = ?");
            $result = $query->execute([$name, $address, $description, $price, $imagen, $accommodation_id]);
    
            if ($result) {
                echo "Alojamiento actualizado correctamente.";
            }
        } catch (PDOException $e) {
            echo "Error al actualizar el alojamiento: " . $e->getMessage();
        }
    }
    

    // Método para eliminar un alojamiento
    public static function deleteAccommodation($accommodation_id) {
        try {
            $pdo = Connection::connect();
            $query = $pdo->prepare("DELETE FROM Accommodation WHERE accommodation_id = ?");
            $result = $query->execute([$accommodation_id]);

            if ($result) {
                echo "Alojamiento eliminado correctamente.";
            }
        } catch (PDOException $e) {
            echo "Error al eliminar el alojamiento: " . $e->getMessage();
        }
    }

}