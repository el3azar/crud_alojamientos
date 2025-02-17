<?php
require_once "./class/Connection.php";
require_once "./class/Accommodation.php";
require_once "./class/Authentication.php";

Authentication::verifySession();
$user_full_name = $_SESSION['user'];
// Manejar la solicitud POST para crear, actualizar o eliminar un alojamiento
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $user_id = $_SESSION['id_user'];

    if ($action === 'create') {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $imagen = $_POST['imagen'];

        // Crear el objeto Accommodation y guardar en la base de datos
        $accommodation = new Accommodation($name, $address, $description, $price, $imagen, $user_id);
        $accommodation->saveAccommodation();
    } elseif ($action === 'update') {
        $accommodation_id = $_POST['accommodation_id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $imagen = $_POST['imagen'];

        // Actualizar el alojamiento existente
        Accommodation::updateAccommodation($accommodation_id, $name, $address, $description, $price, $imagen);
    } elseif ($action === 'delete') {
        $accommodation_id = $_POST['accommodation_id'];

        // Eliminar el alojamiento
        Accommodation::deleteAccommodation($accommodation_id);
    }

    // Redirigir a la página principal después de realizar la acción
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Accommodations</title>
</head>
<body>
    <?php include "./assets/header.php"; ?>

    <main class="container mt-5">
    <h1>Bienvenido <?= htmlspecialchars($user_full_name) ?> </h1>
        <h3 class="text-center">Mis Alojamientos</h3>

        <!-- Botón de agregar alojamiento -->
        <div class="text-end mb-3">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
        Agregar Alojamiento
        </button>
        </div>
        <?php include './assets/newAccommodation.php'; ?>
        <?php
        // Obtener los alojamientos del usuario actual
        $user_id = $_SESSION['id_user'];
        $accommodations = Accommodation::getAccommodation($user_id);

        if (count($accommodations) > 0): ?>
        <!-- Tabla de alojamiento -->
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accommodations as $accommodation): ?>
                    <tr>
                        <td><?= htmlspecialchars($accommodation['name']) ?></td>
                        <td><?= htmlspecialchars($accommodation['address']) ?></td>
                        <td><?= htmlspecialchars($accommodation['description']) ?></td>
                        <td>$<?= htmlspecialchars($accommodation['price']) ?> </td>
                        <td><img src="<?= htmlspecialchars($accommodation['imagen']) ?>" alt="Imagen" style="width: 100px;"></td>
                        <td>

                        <div class="table-actions">
                            <!-- Botón para abrir el modal de edición -->
                            <button class="edit_btn btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $accommodation['accommodation_id'] ?>"> Editar </button>
                                
                            <!-- Botón para abrir el modal de eliminación -->
                            <button class="delete_btn btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $accommodation['accommodation_id'] ?>"> Eliminar </button>
                        </div>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
            
        <!-- Incluir modales especificos para cada alojamiento -->
        <?php 
                foreach ($accommodations as $acc) {
                   include './assets/updateAccommodation.php';  // Modal para editar
                    include './assets/deleteAccommodation.php'; // Modal para eliminar
                }
            ?>
        <?php else: ?>
            <p class="text-center">No tienes alojamientos registrados.</p>
        <?php endif; ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
