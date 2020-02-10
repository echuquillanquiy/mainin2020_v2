<!-- Edit Modal HTML -->
<div class="modal fade" id="editAreaModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditArea">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Editar área
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="edit-error-bag">
                        <ul id="edit-area-errors">
                        </ul>
                    </div>
                    <div class="form-group">
                        <label>
                            Nombre del área
                        </label>
                        <input class="form-control" id="name" name="name" required="" type="text">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Descripción
                        </label>
                        <textarea class="form-control" id="description" name="description" rows="3">NINGUNA</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input id="area_id" name="area_id" type="hidden" value="0">
                        <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancelar">
                            <button class="btn btn-info" id="btn-edit" type="button" value="add">
                                Actualizar área
                            </button>
                        </input>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>