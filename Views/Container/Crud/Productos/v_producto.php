<?php
        include_once("../../../../controller/coneccion.php");

          if (isset($_POST['id_sub'])){
            $id_sub = $_POST['id_sub'];

            $wish = new conexion;
            $wish->cat($id_sub);
            $wish->cerrar();
          }
          if (isset($_POST['id_Categoria'])) {
            $id_Categoria=$_POST['id_Categoria'];

            $wish = new conexion;
            $wish->marca($id_Categoria);
            $wish->cerrar();
          }
          if (isset($_POST['id_CategoriaT'])) {
            $id_Categoria=$_POST['id_CategoriaT'];

            $wish = new conexion;
            $wish->talla($id_Categoria);
            $wish->cerrar();
          }

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

          $wish = new conexion;
          $wish->r_producto($cod, $nom,$sto,$pre,$est,$can,$mar,$cat,$tal,$des);
          $wish->cerrar();
        }
?>
