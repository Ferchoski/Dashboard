<div class="container-fluid animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Consultar Usuarios</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <h1>Consultar</h1>
        <form role="form" class="animated bounceInRight" method="post">

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-address-card" style="width: 15px;"></i></span>
                <input type="number" class="form-control"  placeholder="identificacion" id="1">
            </div>

            <div class="form-group input-group">
                <button type="button" class="form-control" onclick="Val_con_usuario()">Consultar</button>
            </div>

        </form>
    </div>

    <div class="row">
        <div class="col-lg-12" style="text-align:center;">
            <div class="table-responsive" id="qwe">
                
            </div>
        </div>
    </div>

    <script src="../../../../dashboard/Views/js/Validaciones/val_con_usuario.js"></script>
</div>
