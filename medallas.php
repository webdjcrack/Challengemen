<?php
	require("clase/conexion.inc.php");
	require("clase/innerMedallas.php");
	$cn = procesaMedallas($id_user,$id_reto);
	//Conexión BD y COnsulta
	$medallas = mysql_query("SELECT * FROM cm_medallas WHERE id_user = '$id_user'",$cn);
	$query = mysql_fetch_array($medallas);
	$tag = "";
	for($i=1;$i<25;$i++){
		if($query["medalla_".$i] != 0){
			$tag .= "<img class='medallas' src='archivos/".$i.".png' />";
		}
	}
	
	echo $tag;

?>