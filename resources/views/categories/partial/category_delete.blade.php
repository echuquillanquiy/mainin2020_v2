<!-- Delete Task Modal Form HTML -->
<div class="modal fade" id="deleteCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmDeleteCategory">
                <div class="modal-header">
                    <h4 class="modal-title" id="delete-title" name="title">
                        Eliminar Categoría
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        ¿Estás seguro de eliminar la Categoría?.
                    </p>
                    <p class="text-warning">
                        <h4 class="text-warning">
                            Está acción no podrá deshacerse.
                        </h4>
                    </p>
                </div>
                <div class="modal-footer">
                    <input name="category_id" type="hidden" value="0">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancelar">
                    <button class="btn btn-danger" id="btn-delete" type="button">
                        Eliminar Categoría
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>