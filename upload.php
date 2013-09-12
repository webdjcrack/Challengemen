<?php session_start();
$id_reto = $_POST['id'];
$name = strtolower($id_reto.".jpg");
require("../clase/clase_insert.php");
$insert = new Insert();
$directorio = "../tmp_images/";
chdir($directorio);
if(file_exists($name)){
	unlink($name);
	$move = move_uploaded_file($_FILES['input-agregar']['tmp_name'],$name); //$name
	if($move){
		echo 1;
	}else {
		echo 0;
	}
}else{
	$move = move_uploaded_file($_FILES['input-agregar']['tmp_name'],$name); //$name
	if($move){
		$url = "tmp_images/".$name; //$name
		$insert = $insert->insertFoto($id_reto,$url);
		echo 1;
	}else {
		echo 0;
	}
}

	
