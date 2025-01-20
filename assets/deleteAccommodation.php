

<div class="modal fade" id="deleteModal<?= $acc['accommodation_id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <form action="index.php" method="POST">
                <input type="hidden" name="action" value="delete">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="accommodation_id" value="<?= $acc['accommodation_id'] ?>">
                    <p>¿Estás seguro de que deseas eliminar el alojamiento <strong><?= htmlspecialchars($acc['name']) ?></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
