<?php
  include_once("../../../../controller/coneccion.php");

  if (isset($_POST)) {
    $doc = $_POST['codigo'];

    $wish = new conexion;
    $wish->c_usuario($doc);
    $wish->cerrar();
  }
 ?>
