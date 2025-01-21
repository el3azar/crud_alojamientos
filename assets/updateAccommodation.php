<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./styles/updateAccommodation.css">
</head>

<div class="modal" id="editModal<?= $acc['accommodation_id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="index.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Alojamiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                </div>
                <div class="modal-body">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="accommodation_id" value="<?= $acc['accommodation_id'] ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($acc['name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="address" value="<?= htmlspecialchars($acc['address']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" name="description" required><?= htmlspecialchars($acc['description']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" name="price" value="<?= $acc['price'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">URL de la Imagen</label>
                        <input type="text" class="form-control" name="imagen" value="<?= htmlspecialchars($acc['imagen']) ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btnSave">Guardar cambios</button>
                    <button type="button" class="btn btnCancelar" data-bs-dismiss="modal">Cancelar</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
