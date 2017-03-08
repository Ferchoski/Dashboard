<?php
        include_once("../../../../controller/coneccion.php");
          if (isset($_POST)) {
            $cod = $_POST['codigo'];
            $nom = $_POST['nombre'];
            $sto = $_POST['stock'];
            $pre = $_POST['precio'];
            $est = $_POST['estado'];
            $can = $_POST['cantidad'];
            $mar = $_POST['marca'];
            $cat = $_POST['categoria'];
            $tal = $_POST['talla'];

          $wish = new conexion;
          $wish->r_producto($cod, $nom,$sto,$pre,$est,$can,$mar,$cat,$tal);
          $wish->cerrar();
        }else {
          echo "Error Post";
        }
?>
