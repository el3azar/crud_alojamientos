<?php 
    //iniciamos la sesion
    session_start();
    require_once "./class/Authentication.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <title>Document</title>
</head>
<body>
    <?php 
        if(isset($_GET['error'])){
            echo "<p>".$_GET['error']."</p>";
        }
    ?>
    
    <h1>Inicio de Sesión</h1>
    <form action="" method="POST">
        <label for="email">Correo</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>


        <input type="submit" value="Iniciar Sesion">
    </form>

    <?php 
    //verificando si se envio el formulario
        if(isset($_POST['email'], $_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            Authentication::login($email, $password);
        }
    ?>
</body>
</html>