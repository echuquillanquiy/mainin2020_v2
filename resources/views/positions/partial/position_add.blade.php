<!-- Add Task Modal Form HTML -->
<div class="modal fade" id="addPositionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddPosition">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Agregar puesto
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="add-error-bag">
                        <ul id="add-position-errors">
                        </ul>
                    </div>
                    <div class="form-group">
                        <label>
                            Nombre del puesto
                        </label>
                        <input class="form-control" name="name" required="" type="text">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Descripción
                        </label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                        <button class="btn btn-info" id="btn-add" type="button" value="add">
                            Agregar puesto
                        </button>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>