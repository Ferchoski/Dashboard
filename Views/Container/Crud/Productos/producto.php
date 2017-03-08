<div class="container-fluid animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Productos</h1>
        </div>
    </div>
    <div class="col-lg-5">
        <h1>Registrar producto</h1>
        <form role="form" method="post" class="animated bounceInRight">

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-hashtag" style="width: 15px;"></i></span>
                <input type="number" class="form-control" placeholder="Codigo Producto" id="1">
            </div>

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
            <!-- Marca -->
            <?php include '../../../../Model/config.php'; $query='SELECT * FROM tb_marca' ; $result=$conexion->query($query); ?>
            <div class="form-group">
                <label>Marca</label>
                <select class="form-control" name="marca" id="7">
                    <option value="">Seleccione una marca..</option>
                    <?php while ( $row=$result->fetch_array() ) { ?>

                    <option value=" <?php echo $row['id_Marca'] ?> ">
                        <?php echo $row[ 'nom_marca']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <!-- Categoria -->
            <?php include '../../../../Model/config.php'; $query='SELECT * FROM tb_categoria' ; $result=$conexion->query($query); ?>
            <div class="form-group">
                <label>Categoria</label>
                <select class="form-control" name="categoria" id="8">
                    <option>Seleccione una categoria..</option>
                    <?php while ( $row=$result->fetch_array() ) { ?>

                    <option value=" <?php echo $row['id_Categoria'] ?> ">
                        <?php echo $row[ 'nom_categoria']; ?>
                    </option>
                    <?php } ?>

                </select>
            </div>

            <!-- Talla -->
            <?php include '../../../../Model/config.php'; $query='SELECT * FROM tb_tallas' ; $result=$conexion->query($query); ?>
            <div class="form-group">
                <label>Talla</label>
                <select class="form-control" name="talla" id="9">
                    <option>Seleccione una talla..</option>
                    <?php while ( $row=$result->fetch_array() ) { ?>

                    <option value=" <?php echo $row['idtallas'] ?> ">
                        <?php echo $row[ 'nombre']; ?>
                    </option>
                    <?php } ?>

                </select>
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
