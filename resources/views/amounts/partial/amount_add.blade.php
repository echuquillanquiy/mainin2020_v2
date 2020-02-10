<!-- Add Task Modal Form HTML -->
<div class="modal fade" id="addAmountModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddAmount">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Agregar Monto
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="add-error-bag">
                        <ul id="add-amount-errors">
                        </ul>
                    </div>
                    <div class="form-group">
                        <label>
                            Descripción
                        </label>
                        <input class="form-control" name="description" required="" type="text">
                    </div>
                    <div class="form-group">
                        <label>
                            Monto S/.
                        </label>
                        <input type="number" class="form-control" name="amount" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancelar">
                        <button class="btn btn-info" id="btn-add" type="button" value="add">
                            Agregar Monto
                        </button>
                </div>
            </form>
        </div>
    </div>
</div>