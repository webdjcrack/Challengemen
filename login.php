<?php session_start();
require('../clase/conexion.inc.php');
if(isset($_POST['email'])){	
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
		$conexion = new conexion();
		$conexion->conexion();
		$cn = $conexion->conectar();
		$query = "SELECT * FROM cm_usuarios WHERE email = '$email' AND pass = '$pass'";
		$consulta = mysql_query($query,$cn);
		if(mysql_num_rows($consulta)){
			$linea = mysql_fetch_assoc($consulta);
			$_SESSION['nombre'] = $linea['nombre'];
			$_SESSION['id_user'] = $linea['id_user'];
			echo 1;
		}else{
			echo 0;
		}
}
?>