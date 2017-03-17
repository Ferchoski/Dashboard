<?php
      include_once("../../../../controller/coneccion.php");

      if (isset($_POST)) {
        $cod = $_POST['codigo'];

        $wish = new conexion;
        $wish->con_producto($cod);
        $wish->cerrar();
      }

 ?>
