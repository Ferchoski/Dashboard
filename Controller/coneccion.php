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
        #    echo "<br><br>";
        #    echo "<a href='registrar.html'>No tienes cuenta? registrate..</a>";
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

        $query="INSERT into tb_producto values('$cod','$nom','$sto','$pre', '$est','$can','$cat','$tal','$mar','$img')";
        $consulta = $this->conexion->query($query);

        if (!$consulta) {
            printf("Error: %s\n", mysqli_error($this->conexion));
                echo "<br><br>";
            exit();
        }else {
                echo "El producto $nom se ha registrado correctamente con el siguiente codigo: $cod";
        }

    }

    function con_producto($id){
        if (empty ($id)){
            $query="SELECT p.id_Producto id,p.nombre ,p.stockMinimo stock,p.precio ,p.estado_producto estado,p.cantidad ,c.nom_categoria ,t.nombre nom_talla,m.nom_marca ,p.imagen FROM tb_producto p join tb_categoria c on p.tb_Categoria_id_Categoria=c.id_Categoria join tb_tallas t on p.Tallas_idtallas=t.idtallas join tb_marca m on p.tb_Marca_id_Marca=m.id_Marca";
        }else{
            $query="SELECT p.id_Producto id,p.nombre ,p.stockMinimo stock,p.precio ,p.estado_producto estado,p.cantidad ,c.nom_categoria ,t.nombre nom_talla,m.nom_marca ,p.imagen FROM tb_producto p join tb_categoria c on p.tb_Categoria_id_Categoria=c.id_Categoria join tb_tallas t on p.Tallas_idtallas=t.idtallas join tb_marca m on p.tb_Marca_id_Marca=m.id_Marca where p.id_Producto = '$id'";
        }

        $consulta = $this->conexion->query($query);

            echo "<div class='table-responsive'>";
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
                    echo "<th>Talla</th>";
                    echo "<th>Marca</th>";
                    echo "<th>Imagen</th>";
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
                    echo "<td>".$lol['nom_talla']."</td>";
                    echo "<td>".$lol['nom_marca']."</td>";
                    echo "<td><img style='width: 200px;height: 150px;' src=".$lol['imagen']."></td>";
                    echo "<td><button type='button' class='btn btn-warning'>Modificar</button></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
    }

    function r_usuario($doc, $nom,$ape,$telf,$pass,$email,$telm,$dir,$esta,$tdoc,$rol){
        $query="INSERT into tb_usuario values ('$doc','$tdoc','$nom','$ape','$email','$pass','$telf','$telm','$dir','$esta','$rol')";
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
                $query="SELECT u.documento,tp.nom_TipoDocumento nom_tipo,u.nombres,u.apellido_1 apellidos,u.email,u.contrasena,u.telefonoFijo,u.telefonoMovil,u.direccion,u.estado,r.nom_rol rol FROM tb_usuario u JOIN tb_tipodocumento tp on tp.id_TipoDocumento = u.tb_TipoDocumento_id_TipoDocumento JOIN tb_rol r on r.id_rol=u.tb_Rol_id_rol";
            } else {
                $query="SELECT u.documento,tp.nom_TipoDocumento nom_tipo,u.nombres,u.apellido_1 apellidos,u.email,u.contrasena,u.telefonoFijo,u.telefonoMovil,u.direccion,u.estado,r.nom_rol rol FROM tb_usuario u JOIN tb_tipodocumento tp on tp.id_TipoDocumento = u.tb_TipoDocumento_id_TipoDocumento JOIN tb_rol r on r.id_rol=u.tb_Rol_id_rol where u.documento='$doc'";
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
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
    }
  }
// Para arreglar el code https://www.tools4noobs.com/online_tools/beautify_php/
?>
