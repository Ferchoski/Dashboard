<?php
    class conexion {

        public $conexion;
        public $server = "localhost";
        public $usuario = "root";
        public $pass = "";
        public $db = "sk8";

        public function __construct(){
            $this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->db);
            if($this->conexion->connect_errno){
                die("Fallo al tratar de conectar con MySQL: (". $this->conexion->connect_errno.")");
            }
        }

        public function cerrar(){
            $this->conexion->close();
        }

        function login($usuario, $pass){

        $this->email = $usuario;
        $this->password = $pass;

        $query = "SELECT nombre,email,contrasena from usuario where email = '".$this->email."' and contrasena = '".$this->password."'";
        $consulta = $this->conexion->query($query);

        if($row = mysqli_fetch_array($consulta)){
            session_start();
            $_SESSION['usu'] = $row['nombre'];
            $_SESSION['id'] = $row['email'];
            $_SESSION['nom'] = $row['contrasena'];

            echo "Bienvenido " .$_SESSION['usu']." has iniciado sesion";
        }else {
            echo "Usuario o contraseña incorrectos";
        }
    }

     function registrar($doc,$nom,$ape,$email,$pass,$fec,$dir,$tel){

        $query ="INSERT into usuario(documento,nombre,apellido,email,contrasena,fecha,direccion,telefono)values('$doc','$nom','$ape','$email','$pass','$fec','$dir','$tel')";
        $consulta = $this->conexion->query($query);

        if (!$consulta) {
            printf("Error: %s\n", mysqli_error($this->conexion));
                echo "<br><br>";
                echo "Su cuenta ya exite, olvidaste contraseña?";
            exit();
        }else {
                echo "Bienvenido $nom $ape, sus datos fueron ingresados correctamente";
        }
    }

    function r_producto($cod,$nom,$sto,$pre,$est,$can,$mar,$cat,$tal,$img){

        $query="CALL reg_producto('$cod','$nom','$sto','$pre','$est','$can','$cat','$mar','$tal','$img')";

        $consulta = $this->conexion->query($query);

        if (!$consulta) {
            printf("Error: %s\n", mysqli_error($this->conexion));
                echo "<br><br>";
            exit();
        }else {
                echo "El producto $nom se ha registrado correctamente con el siguiente codigo: $cod";
        }

    }

    function cat($id){
      $query = "CALL con_cat('$id')";

      $consulta = $this->conexion->query($query);

      if (!$consulta) {
        printf("Error: %s\n", mysqli_error($this->conexion));
            echo "<br><br>";
        exit();
      }else {
            $html='<option value="">Seleccione...</option>';
        while ($row = $consulta->fetch_array()) {
            $html.= '<option value="'.$row['id_Categoria'].'">'.$row['nom_categoria'].'</option>';
        }
      }
      echo $html;
    }

    function marca($id){
      $query="SELECT cm.tb_marca_id_Marca id_marca,m.nom_marca FROM tb_categoria_has_tb_marca cm
      join tb_categoria c on c.id_Categoria=cm.tb_categoria_id_Categoria
      join tb_marca m on m.id_Marca=cm.tb_marca_id_Marca where cm.tb_categoria_id_Categoria='$id'";

      $consulta = $this->conexion->query($query);

      if (!$consulta) {
        printf("Error: %s\n", mysqli_error($this->conexion));
            echo "<br><br>";
        exit();
      }else {
            $html='<option value="">Seleccione...</option>';
        while ($row = $consulta->fetch_array()) {
            $html.= '<option value="'.$row['id_marca'].'">'.$row['nom_marca'].'</option>';
        }
      }
      echo $html;
    }

    function talla($id){
      $query="SELECT ct.tb_tallas_idtallas id_talla,t.nombre nom_talla FROM tb_categoria_has_tb_tallas ct
      join tb_categoria c on c.id_Categoria=ct.tb_categoria_id_Categoria
      join tb_tallas t on t.idtallas=ct.tb_tallas_idtallas where ct.tb_categoria_id_Categoria='$id'";

      $consulta = $this->conexion->query($query);

      if (!$consulta) {
        printf("Error: %s\n", mysqli_error($this->conexion));
            echo "<br><br>";
        exit();
      }else {
            $html='<option value="">Seleccione...</option>';
        while ($row = $consulta->fetch_array()) {
            $html.= '<option value="'.$row['id_talla'].'">'.$row['nom_talla'].'</option>';
        }
      }
      echo $html;
    }

    function con_producto($id){
        if (empty ($id)){
            $query="CALL con_producto_todo()";
        }else{
            $query="CALL con_producto('$id')";
        }

        $consulta = $this->conexion->query($query);

            echo "<div class='table-responsive' style='text-align:center;'>";
            echo "<table class='table table-hover'>";
            echo "<thead>";
            echo "<tr >";
                    echo "<th>Id Producto</th>";
                    echo "<th>Nombre</th>";
                    echo "<th>Stock</th>";
                    echo "<th>Precio</th>";
                    echo "<th>Estado</th>";
                    echo "<th>Cantidad</th>";
                    echo "<th>Categoria</th>";
                    echo "<th>Sub Categoria</th>";
                    echo "<th>Talla</th>";
                    echo "<th>Marca</th>";
                    echo "<th>Accion</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($lol = mysqli_fetch_array($consulta)) {
                echo "<tr>";
                    echo "<td>".$lol['id']."</td>";
                    echo "<td>".$lol['nombre']."</td>";
                    echo "<td>".$lol['stock']."</td>";
                    echo "<td>".$lol['precio']."</td>";
                    if ($lol['estado']!=1) {
                      echo "<td>Activo</td>";
                    }else {
                      echo "<td>Inactivo</td>";
                    }
                    echo "<td>".$lol['cantidad']."</td>";
                    echo "<td>".$lol['nom_categoria']."</td>";
                    echo "<td>".$lol['nom_sub']."</td>";
                    echo "<td>".$lol['nom_talla']."</td>";
                    echo "<td>".$lol['nom_marca']."</td>";
                    echo "<td><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal'><span class='glyphicon glyphicon-pencil'></span></button></td>";
                    echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
    }

    function mod_producto($cod,$nom,$sto,$pre,$est,$can,$mar,$cat,$tal,$img){
      $query="CALL mod_producto('$cod','$nom','$sto','$pre','$est','$can','$mar','$cat','$tal','$img')";

      $consulta = $this->conexion->query($query);

      if (!$consulta) {
          printf("Error: %s\n", mysqli_error($this->conexion));
              echo "<br><br>";
          exit();
      }else {
              echo "El producto $cod se ha moodificado correctamente con el siguiente nombre: $nom";
      }
    }

    function r_usuario($doc,$nom,$ape,$telf,$pass,$email,$telm,$dir,$esta,$tdoc,$rol){
        $query="CALL reg_usuario('$doc','$tdoc','$nom','$ape','$email','$pass','$telf','$telm','$dir','$esta','$rol')";

        $consulta = $this->conexion->query($query);

        if (!$consulta) {
            printf("Error: %s\n", mysqli_error($this->conexion));
                echo "<br><br>";
            exit();
        }else {
                echo "Usuario $nom $ape fue ingresado correctamente";
        }
    }

    function c_usuario($doc){
            if (empty ($doc)){
                $query="CALL con_usuario()";
            } else {
                $query="CALL con_usuario_todo('$doc')";
            }

            $consulta = $this->conexion->query($query);

            echo "<div class='table-responsive'>";
            echo "<table class='table table-hover'>";
            echo "<thead>";
            echo "<tr >";
                        echo "<th>Documento</th>";
                        echo "<th>Tipo Documento</th>";
                        echo "<th>Nombre</th>";
                        echo "<th>Apellido</th>";
                        echo "<th>Email</th>";
                        echo "<th>Contraseña</th>";
                        echo "<th>Telefono Fijo</th>";
                        echo "<th>Telefono Movil</th>";
                        echo "<th>Direccion</th>";
                        echo "<th>Estado</th>";
                        echo "<th>Rol</th>";
                        echo "<th>Accion</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                while ($lol = mysqli_fetch_array($consulta)) {
                    echo "<tr>";
                        echo "<td>".$lol['documento']."</td>";
                        echo "<td>".$lol['nom_tipo']."</td>";
                        echo "<td>".$lol['nombres']."</td>";
                        echo "<td>".$lol['apellidos']."</td>";
                        echo "<td>".$lol['email']."</td>";
                        echo "<td>".$lol['contrasena']."</td>";
                        echo "<td>".$lol['telefonoFijo']."</td>";
                        echo "<td>".$lol['telefonoMovil']."</td>";
                        echo "<td>".$lol['direccion']."</td>";
                        echo "<td>".$lol['estado']."</td>";
                        echo "<td>".$lol['rol']."</td>";
                        echo "<td><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModalRegUsu'><span class='glyphicon glyphicon-pencil'></span></button></td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
    }

    function mod_usuario($doc, $nom,$ape,$telf,$pass,$email,$telm,$dir,$esta,$tdoc,$rol){
      $query="CALL mod_usuario('$doc','$tdoc', '$nom','$ape','$email','$pass','$telf','$telm','$dir','$esta','$rol')";

      $consulta = $this->conexion->query($query);

      if (!$consulta) {
          printf("Error: %s\n", mysqli_error($this->conexion));
              echo "<br><br>";
          exit();
      }else {
              echo "El documento $doc se ha modificado correctamente con el siguiente nombre: $nom";
      }
    }
    }

?>
