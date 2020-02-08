<!-- Add Task Modal Form HTML -->
<div class="modal fade" id="addCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddCategory">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Agregar Categoría
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="add-error-bag">
                        <ul id="add-category-errors">
                        </ul>
                    </div>
                    <div class="form-group">
                        <label>
                            Nombre de la categoría
                        </label>
                        <input class="form-control" name="name" required="" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                        <button class="btn btn-info" id="btn-add" type="button" value="add">
                            Agregar Categoría
                        </button>
                </div>
            </form>
        </div>
    </div>
</div>