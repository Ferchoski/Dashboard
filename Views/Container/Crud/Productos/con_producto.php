<div class="container-fluid animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Consultar Producto</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <h1>Consultar</h1>
        <form role="form" class="animated bounceInRight" method="post">

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-hashtag" style="width: 15px;"></i></span>
                <input type="number" class="form-control" name="codigo" placeholder="Codigo Producto" id="1">
            </div>

            <div class="form-group input-group">
                <button type="button" class="btn btn-success" onclick="Val_con_producto()">Consultar</button>
            </div>

        </form>
    </div>

    <div class="row">
        <div class="col-lg-12" style="text-align:center;">
            <div class="table-responsive" id="qwe">

            </div>
        </div>
    </div>

    <?php include('mod_producto.php'); ?>

    <script src="../../../../dashboard/Views/js/Validaciones/val_mod_producto.js"></script>
    <script src="../../../../dashboard/Views/js/Validaciones/val_con_producto.js"></script>

</div>
