<?php
  include_once("../../../../controller/coneccion.php");
  if (isset($_POST)) {
  $doc = $_POST['documento'];
  $nom = $_POST['nombre'];
  $ape = $_POST['apellido'];
  $telf = $_POST['telefono_f'];
  $pass = $_POST['pass'];
  $email = $_POST['email'];
  $telm = $_POST['telefono_m'];
  $dir = $_POST['direccion'];
  $esta = $_POST['estado'];
  $tdoc = $_POST['t_doc'];
  $rol = $_POST['rol'];

  $wish = new conexion;
  $wish->mod_usuario($doc, $nom,$ape,$telf,$pass,$email,$telm,$dir,$esta,$tdoc,$rol);
  $wish->cerrar();
  }
 ?>
