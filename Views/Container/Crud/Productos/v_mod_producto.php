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

            $img= $_POST['flsimage'];
            $des="Views/Container/Crud/Productos/img/".$img;

          $wish =new conexion;
          $wish->mod_producto($cod, $nom,$sto,$pre,$est,$can,$mar,$cat,$tal,$des);
          $wish->cerrar();
        }else {
          echo "Error Post";
        }
?>
