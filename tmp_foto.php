<?php session_start();
$directorio = "./tmp_images/";
chdir($directorio);
$type = explode('/',$_FILES['foto']['type']);
$ext = $type[1];
$_SESSION['ext'] = $ext;
$move = move_uploaded_file($_FILES['foto']['tmp_name'], 'tmp_foto.'.$ext);
if($move){
	echo "<script type='text/javascript'>document.location.href='personal.php?jcrop=true'</script>";
}else{
	echo 'error';
}

?>