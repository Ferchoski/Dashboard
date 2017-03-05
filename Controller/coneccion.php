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

		$query = "select nombre,email,contrasena from usuario where email = '".$this->email."' and contrasena = '".$this->password."'";
		$consulta = $this->conexion->query($query);

		if($row = mysqli_fetch_array($consulta)){
			session_start();
			$_SESSION['usu'] = $row['nombre'];
			$_SESSION['id'] = $row['email'];
			$_SESSION['nom'] = $row['contrasena'];

			echo "Bienvenido " .$_SESSION['usu']." has iniciado sesion";

		}else {

			echo "Usuario o contraseña incorrectos";
		#	echo "<br><br>";
		#	echo "<a href='registrar.html'>No tienes cuenta? registrate..</a>";
		}
	}

	 function registrar($doc,$nom,$ape,$email,$pass,$fec,$dir,$tel){

		$query ="insert into usuario(documento,nombre,apellido,email,contrasena,fecha,direccion,telefono)values('$doc','$nom','$ape','$email','$pass','$fec','$dir','$tel')";
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

	function r_producto($cod, $nom,$sto,$pre,$est,$can,$mar,$cat,$tal){

		$query="insert into tb_producto(id_Producto,nombre,stockMinimo,precio,estado_producto,cantidad,tb_Categoria_id_Categoria,Tallas_idtallas,tb_Marca_id_Marca)values('$cod','$nom','$sto','$pre', '$est','$can','$cat','$tal','$mar')";

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
			$query="select p.id_Producto id,p.nombre ,p.stockMinimo stock,p.precio ,p.estado_producto estado,p.cantidad ,c.nom_categoria ,t.nombre nom_talla,m.nom_marca FROM tb_producto p join tb_categoria c on p.tb_Categoria_id_Categoria=c.id_Categoria join tb_tallas t on p.Tallas_idtallas=t.idtallas join tb_marca m on p.tb_Marca_id_Marca=m.id_Marca";
		}else{
			$query="select p.id_Producto id,p.nombre ,p.stockMinimo stock,p.precio ,p.estado_producto estado,p.cantidad ,c.nom_categoria ,t.nombre nom_talla,m.nom_marca FROM tb_producto p join tb_categoria c on p.tb_Categoria_id_Categoria=c.id_Categoria join tb_tallas t on p.Tallas_idtallas=t.idtallas join tb_marca m on p.tb_Marca_id_Marca=m.id_Marca where p.id_Producto = '$id'";
		}

		$consulta = $this->conexion->query($query);


			echo "<table border='3px solid' align='center' style='width:100%;'>";
			echo "<tr style='text-align:center;'>";
					echo "<th align='center' height='50px'>Id Producto</th>";
					echo "<th height='50px'>Nombre</th>";
					echo "<th height='50px'>Stock</th>";
					echo "<th height='50px'>Precio</th>";
					echo "<th height='50px'>Estado</th>";
					echo "<th height='50px'>Cantidad</th>";
					echo "<th height='50px'>Categoria</th>";
					echo "<th height='50px'>Talla</th>";
					echo "<th height='50px'>Marca</th>";
			echo "</tr>";
			while ($lol = mysqli_fetch_array($consulta)) {
				echo "<tr>";
					echo "<td height='30px'>".$lol['id']."</td>";
					echo "<td height='30px'>".$lol['nombre']."</td>";
					echo "<td height='30px'>".$lol['stock']."</td>";
					echo "<td height='30px'>".$lol['precio']."</td>";
					echo "<td height='30px'>".$lol['estado']."</td>";
					echo "<td height='30px'>".$lol['cantidad']."</td>";
					echo "<td height='30px'>".$lol['nom_categoria']."</td>";
					echo "<td height='30px'>".$lol['nom_talla']."</td>";
					echo "<td height='30px'>".$lol['nom_marca']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		

	}

		 function recuperar($email){
			$this->mail = $email;
			$query = "select pass from usuario where email = '".$this->mail."'";

			$consulta = $this->conexion->query($query);
			if($row = mysqli_fetch_array($consulta)){
			session_start();
			$_SESSION['contra'] = $row['pass'];

			echo "Tu contraseña es " .$_SESSION['contra']." ";
			session_destroy();
			}else {
				echo "No hay ningun registro con el email ".$email." ";
			}
		}
	}

?>
