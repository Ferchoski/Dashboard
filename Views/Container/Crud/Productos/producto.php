<div class="container-fluid animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Productos</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <h1>Registrar producto</h1>
        <form role="form" method="post" class="animated bounceInRight">

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-cube" style="width: 15px;"></i></span>
                <input type="text" class="form-control" placeholder="Nombre" id="2">
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-hashtag" style="width: 15px;"></i></span>
                <input type="number" class="form-control" placeholder="Stock" id="3">
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-usd" style="width: 15px;"></i></span>
                <input type="number" class="form-control" placeholder="Precio" id="4">
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-cubes" style="width: 15px;"></i></span>
                <input type="number" class="form-control" placeholder="Cantidad" id="5">
            </div>

            <div class="form-group">
                <label>Estado</label>
                <select class="form-control" name="estado" id="6">
                    <option value="">Seleccione un estado</option>
                    <option value="0">Falso</option>
                    <option value="1">Activo</option>
                </select>
            </div>

            <!-- Sub Categoria -->
            <?php include '../../../../Model/config.php'; $query='SELECT * FROM tb_sub_cate' ; $result=$conexion->query($query); ?>
            <div class="form-group">
                <label>Categoria</label>
                <select class="form-control" name="13" id="13">
                    <option>Seleccione una categoria..</option>
                    <?php while ( $row=$result->fetch_array() ) { ?>
                    <option value=" <?php echo $row['id_sub'] ?> ">
                        <?php echo $row['nombre']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <script language="javascript">
                $(document).ready(function() {
                    $("#13").change(function() {
                        $("#13 option:selected").each(function() {
                            id_sub = $(this).val();
                            $.post("Views/Container/Crud/Productos/v_producto.php", {
                                id_sub: id_sub
                            }, function(data) {
                                $("#8").html(data);
                            });
                        });
                    })
                });
            </script>

            <!-- Categoria -->
            <div class="form-group">
                <select class="form-control" name="8" id="8">
                  <option>Seleccione una categoria primero</option>
                </select>
            </div>

            <script language="javascript">
                $(document).ready(function() {
                    $("#8").change(function() {
                        $("#8 option:selected").each(function() {
                            id_Categoria = $(this).val();
                            $.post("Views/Container/Crud/Productos/v_producto.php", {
                                id_Categoria: id_Categoria
                            }, function(data) {
                                $("#7").html(data);
                            });
                        });
                    })
                });
            </script>

            <script language="javascript">
                $(document).ready(function() {
                    $("#8").change(function() {
                        $("#8 option:selected").each(function() {
                            id_CategoriaT = $(this).val();
                            $.post("Views/Container/Crud/Productos/v_producto.php", {
                                id_CategoriaT: id_CategoriaT
                            }, function(data) {
                                $("#9").html(data);
                            });
                        });
                    })
                });
            </script>

            <!-- Marca -->
            <div class="form-group">
                <label>Marca</label>
                <select class="form-control" name="7" id="7">
                    <option>Seleccione una categoria primero</option>
                </select>
            </div>

            <!-- Talla -->
            <div class="form-group">
                <label>Talla</label>
                <select class="form-control" name="9" id="9">
                    <option>Seleccione una categoria primero</option>
                </select>
            </div>

            <label for="">Insertar imagen (opcional)</label>
            <div class="form-group input-group">
                <input type="file" name="flsimage" class="form-control" id="10">
                <span class="input-group"></span>
            </div>

            <div class="form-group input-group">
                <button type="button" onclick="Val_reg_producto()" class="btn btn-primary">Enviar</button>
            </div>

            <div class="form-group">
                <label class="form-group" id="qwe"></label>
            </div>

        </form>
        <script src="../../../../dashboard/Views/js/Validaciones/val_reg_producto.js"></script>
    </div>
</div>
