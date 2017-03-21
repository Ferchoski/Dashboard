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

                </form>
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
