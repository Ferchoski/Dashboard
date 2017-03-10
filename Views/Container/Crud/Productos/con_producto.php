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
                <button type="button" class="form-control" onclick="Val_con_producto()">Consultar</button>
            </div>

        </form>
    </div>

    <div class="row">
        <div class="col-lg-12" style="text-align:center;">
            <div class="table-responsive" id="qwe">

            </div>
        </div>
    </div>

    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').focus()
        })
    </script>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h1 class="modal-title" id="myModalLabel">Modificar</h1>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" class="animated bounceInRight">

                      <?php include '../../../../Model/config.php'; $query='SELECT * FROM tb_producto' ; $result=$conexion->query($query); ?>

                      <div class="form-group">
                          <label>ID</label>
                          <select class="form-control" id="id2">
                            <option value="">Seleccione id a Modificar..</option>
                            <?php while ($row=$result->fetch_array() ) { ?>

                            <option value="<?php echo $row['id_Producto']?>">
                                <?php echo $row['id_Producto']; ?>
                            </option>

                            <?php } ?>
                        </select>
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
                                  <?php echo $row[ 'nombre'];  ?>
                              </option>
                              <?php } ?>
                          </select>
                        </div>

                        <label for="">Insertar imagen (opcional)</label>
                        <div class="form-group input-group">
                            <input type="file" name="flsimage" class="form-control" id="10">
                            <span class="input-group"></span>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <label id="qwe"></label>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="Val_mod_producto()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../../dashboard/Views/js/Validaciones/val_mod_producto.js"></script>
    <script src="../../../../dashboard/Views/js/Validaciones/val_con_producto.js"></script>

</div>
