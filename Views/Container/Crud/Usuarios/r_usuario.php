<div class="container-fluid animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Usuario</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <h1>Registrar Usuario</h1>
        <form role="form" method="post" class="animated bounceInRight">

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-address-card" style="width: 15px;"></i></span>
                <input type="number" class="form-control" name="codigo" placeholder="Documento" id="1">
            </div>

            <?php
                include '../../../../Model/config.php';
                $query = 'SELECT * FROM tb_tipodocumento';
                $result = $conexion->query($query);
            ?>
            <div class="form-group">
                <label>Tipo de documento</label>
                <select class="form-control"  id="2">
                      <option value="">Seleccione un tipo de documento</option>
                <?php
                      while ( $row = $result->fetch_array() )
                      {
                ?>

                <option value=" <?php echo $row['id_TipoDocumento'] ?> "  >
                  <?php echo $row['nom_TipoDocumento']; ?>
                </option>
                <?php
                }
                ?>
                </select>
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-user" style="width: 15px;"></i></span>
                <input type="number" class="form-control"  placeholder="Nombre" id="3">
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-user" style="width: 15px;"></i></span>
                <input type="number" class="form-control"  placeholder="Apellido" id="4">
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-phone" style="width: 15px;"></i></span>
                <input type="number" class="form-control"  placeholder="Telefono fijo" id="5">
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-unlock-alt" style="width: 15px;"></i></span>
                <input type="number" class="form-control"  placeholder="Contraseña" id="6">
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-unlock-alt" style="width: 15px;"></i></span>
                <input type="number" class="form-control"  placeholder="Repetir contraseña" id="7">
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-envelope" style="width: 15px;"></i></span>
                <input type="number" class="form-control"  placeholder="Email" id="8">
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-mobile" style="width: 15px;"></i></span>
                <input type="number" class="form-control"  placeholder="Telefono Movil" id="9">
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker" style="width: 15px;"></i></span>
                <input type="number" class="form-control"  placeholder="Direccion" id="10">
            </div>

            <?php
                include '../../../../Model/config.php';
                $query = 'SELECT * FROM tb_rol';
                $result = $conexion->query($query);
            ?>
            <div class="form-group">
                <label>Rol</label>
                <select class="form-control"  id="11">
                      <option value="">Seleccione un rol</option>
                <?php
                      while ( $row = $result->fetch_array() )
                      {
                ?>

                <option value=" <?php echo $row['id_rol'] ?> "  >
                  <?php echo $row['nom_rol']; ?>
                </option>
                <?php
                }
                ?>
                </select>
            </div>

            <div class="form-group">
                <label>Estado</label>
                <select class="form-control" name="estado" id="12">
                        <option value="">Seleccione un estado</option>
                        <option value="0">Falso</option>
                        <option value="1">Activo</option>
                  </select>
            </div>

            <div class="form-group input-group">
                      <button type="button" onclick="Val_r_usuarios()" class="form-control">Enviar</button>

            </div>

            <div class="form-group">
                      <label class="form-group" id="qwe"></label>
            </div>

        </form>
        <script src="../../../../../dashboard/Views/js/validar.js"></script>
    </div>
</div>
