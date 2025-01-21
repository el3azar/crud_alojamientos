<?php
require_once "./class/Connection.php";

class Authentication{

    public static function login($email, $password) {
        try {
            // Conectar a la base de datos
            $pdo = Connection::connect();

            // Preparar la consulta para verificar usuario por correo y contraseña
            $query = $pdo->prepare("SELECT user_id, name,last_name, email FROM User WHERE email = :email AND password = :password");

            // Asignar parámetros
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);

            // Ejecutar la consulta
            $query->execute();

            // Obtener el usuario como un arreglo asociativo
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Crear las sesiones para el usuario autenticado
                session_start();
                $_SESSION['id_user'] = $user['user_id'];
                $_SESSION['user'] = $user['name'] . ' ' . $user['last_name'];

                // Redirigir a una vista de inicio
                header("Location: index.php");
                exit;
            } else {
                // Mostrar un mensaje de error en caso de credenciales incorrectas
                echo "<p>Correo o contraseña incorrectos.</p>";
            }
        } catch (PDOException $e) {
            // Capturar errores y mostrar el mensaje
            echo "Error al iniciar sesión: " . $e->getMessage();
        }
    }

    public static function logout(){
        //iniciar sesion
        session_start();

        //destruir la informacion del usuario
        session_destroy();

        //destruir las variables de las sesiones
        session_unset();
        header("location: login.php");
        exit;
    }

    //verificando si la sesion existe
    public static function verifySession() {
        // Verificar si la sesión ya está iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Verificar si el usuario tiene una sesión activa
        if (!isset($_SESSION['id_user'])) {
            // Redirigir al login con un mensaje de error
            header("Location: login.php?error=Debes iniciar sesión para acceder a esta página");
            exit;
        }
    }
    
}