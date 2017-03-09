<div class="container-fluid animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Entradas</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <h1>Registrar entradas</h1>
        <form role="form">


        <?php include '../../../../Model/config.php'; $query='SELECT * FROM tb_producto' ; $result=$conexion->query($query); ?>
            <div class="form-group">
                <label>Producto</label>
                <select class="form-control"  id="1">
                    <option>Seleccione el producto</option>
                    <?php while ( $row=$result->fetch_array() ) { ?>

                    <option value=" <?php echo $row['id_Producto'] ?> ">
                        <?php echo $row['nombre'];  ?>
                    </option>
                    <?php } ?>
                </select>
            </div>


        
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-cubes" style="width: 15px;"></i></span>
                <input type="number" class="form-control" placeholder="Cantidad" id="2">
            </div>

            <label >Fecha de registro</label>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-calendar" style="width: 15px;"></i></span>
                <input type="date" class="form-control" placeholder="Fecha de registro" id="3">
            </div>

            <?php include '../../../../Model/config.php'; $query='SELECT * FROM tb_proveedor' ; $result=$conexion->query($query); ?>
            <div class="form-group">
                <label>Proveedor</label>
                <select class="form-control"  id="4">
                    <option>Seleccione un proveedor</option>
                    <?php while ( $row=$result->fetch_array() ) { ?>

                    <option value=" <?php echo $row['id_Proveedor'] ?> ">
                        <?php echo $row['nom_proveedor'];  ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group input-group">
                <input type="submit" class="form-control" placeholder="enviar">

            </div>
        </form>
    </div>
</div>
