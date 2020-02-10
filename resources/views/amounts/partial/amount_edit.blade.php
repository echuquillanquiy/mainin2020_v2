<!-- Edit Modal HTML -->
<div class="modal fade" id="editAmountModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditAmount">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Editar Monto
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="edit-error-bag">
                        <ul id="edit-amount-errors">
                        </ul>
                    </div>
                    <div class="form-group">
                        <label>
                            Descripción
                        </label>
                        <input class="form-control" id="description" name="description" required="" type="text">
                    </div>
                    <div class="form-group">
                        <label>
                            Monto S/.
                        </label>
                        <input class="form-control" id="amount" name="amount" type="number">
                    </div>
                </div>
                <div class="modal-footer">
                    <input id="amount_id" name="amount_id" type="hidden" value="0">
                        <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancelar">
                            <button class="btn btn-info" id="btn-edit" type="button" value="add">
                                Actualizar monto
                            </button>
                </div>
            </form>
        </div>
    </div>
</div>