<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').focus()
    })
</script>
<div class="modal fade" id="myModal_regMarca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title" id="myModalLabel">Registrar Marca</h1>
            </div>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-cube" style="width: 15px;"></i></span>
                    <input type="text" class="form-control" placeholder="Nombre de la marca" id="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="Val_mod_producto()">Guardar</button>
                </div>
                <div class="modal-footer">
                    <label id="zxc"></label>
                </div>
        </div>
    </div>
</div>
