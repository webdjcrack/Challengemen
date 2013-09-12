<?php session_start();
	unset($_SESSION['id_user']);
	unset($_SESSION['nombre']);
	session_destroy();
	echo "<script type='text/javascript'>document.location.href='index.php'</script>";


?>