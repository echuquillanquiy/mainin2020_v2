<!-- Edit Modal HTML -->
<div class="modal fade" id="editPositionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditPosition">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Editar puesto
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="edit-error-bag">
                        <ul id="edit-position-errors">
                        </ul>
                    </div>
                    <div class="form-group">
                        <label>
                            Nombre del puesto
                        </label>
                        <input class="form-control" id="name" name="name" required="" type="text">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Descripción
                        </label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input id="position_id" name="position_id" type="hidden" value="0">
                        <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                            <button class="btn btn-info" id="btn-edit" type="button" value="add">
                                Actualizar puesto
                            </button>
                        </input>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>