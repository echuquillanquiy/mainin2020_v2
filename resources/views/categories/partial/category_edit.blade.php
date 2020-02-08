<!-- Edit Modal HTML -->
<div class="modal fade" id="editCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditCategory">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Editar Categoría
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="edit-error-bag">
                        <ul id="edit-category-errors">
                        </ul>
                    </div>
                    <div class="form-group">
                        <label>
                            Nombre de la Categoría
                        </label>
                        <input class="form-control" id="name" name="name" required="" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <input id="category_id" name="category_id" type="hidden" value="0">
                        <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                            <button class="btn btn-info" id="btn-edit" type="button" value="add">
                                Actualizar Categoría
                            </button>
                        </input>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>