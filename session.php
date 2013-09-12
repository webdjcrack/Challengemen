<?php session_start();
require("clase/clase_consulta.php");
if(!isset($_SESSION['titulo'])){
$titulo = $_POST['titulo'];
$_SESSION['titulo'] = $titulo; 
	$consulta = New Consulta();
	$resultado = $consulta->ConsultaTitulo($titulo);// procesarlo en archivo separado para no iniciar sesion
	if($resultado != 1){
		echo $resultado;
		unset($_SESSION['titulo']);
	}else{
		echo "0";
	}
	
}else{
	$_SESSION['objetivo'] = $_POST['objetivo']; 
	$_SESSION['cantidad'] = $_POST['cantidad'];
	$_SESSION['fracaso'] = $_POST['no-objetivo'];
	$_SESSION['sobremi'] = $_POST['sobremi'];
	$_SESSION['donde'] = $_POST['donde'];
	$_SESSION['cuando'] = $_POST['cuando'];
	$_SESSION['hora'] = $_POST['hora'];
	$_SESSION['reto'] = $_POST['tipo-reto'];
	echo "1";
	
}
?>