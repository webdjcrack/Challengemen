<?php session_start();
	 if(isset($_SESSION['id_user'])) {
		$login = "<a href='perfil.php'><span class='login'>".$_SESSION['nombre']."</span></a><a href='destroy.php'><span class='salir'>(Salir)</span></a><div id='enlaces1'>
			<a href='registro.php'><span class='enlaces'>Nuevo proyecto</span></a>
			<span class='enlaces'>|</span>
			<a href='secretos_challengemen.php'><span class='enlaces'>Guia de Usuario</span></a><span class='enlaces'>|</span>
			<a href='contacto.php'><span class='enlaces'>Contacto</span></a>
			<a href='empresas.php'><span class='empresas'>Empresas</span></a>
		</div>";
	}else{
		$login = "<span class='login' rel='#popup'>Ingresar</span><div id='enlaces2'>
			<a href='registro.php'><span class='enlaces'>Nuevo proyecto</span></a>
			<span class='enlaces'>|</span>
			<a href='contacto.php'><span class='enlaces'>Contacto</span></a>
			<a href='empresas.php'><span class='empresas'>Empresas</span></a>
		</div>";
		
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv="content-language" content="es" />
<title>ChallengeMen</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/estilos.css" />
<link rel="stylesheet" type="text/css" href="css/contacto.css" />
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".img-desplegar1,.img-desplegar2,.img-desplegar3").click(function(){
		if($(this).attr("rel") == "1"){
			$(this).parent().next().animate({
				height: 0,
			})
			$(this).attr("rel","0");
			$(this).attr("src","archivos/flecha-des.png");
		}else{
			$(this).parent().next().animate({
				height: 445,
			})
			$(this).attr("rel","1");
			$(this).attr("src","archivos/flecha.png");
		
		}
	})
})
</script>
</head>
<body>
<div id="fondo-cabecera2"></div>
<div id="content">
<div class="overlay-popup" id="popup">
	<div class="details">
		<p class="titulo-login">¡HOLA DE NUEVO!</P>
		<p class="cuerpo-login">Puedes acceder al foro a través de tu cuenta facebook,
		cuenta de google o con la cuenta creada con anterioridad</p>
		<div class="separadores"><span class="separador1">CONECTAR CON:</span></div>
		<img class="login-face" src="archivos/login-face.png" />
		<img class="login-google" src="archivos/login-google.png" />
		<div class="separadores"><span class="separador2">O</span></div>
		<form id="form-login" action="" method="">
		<p><span class="input-email">EMAIL</span><input type="text" id="email" name="email" /></p>
		<p><span class="input-email">CONTRASEÑA</span><input type="password" id="pass" name="pass" /></p>
		<img class="ingresar" src="archivos/boton-ingresar.png" />
		<p class="alert-formulario">* Debes rellenar los campos necesarios</p>
		<p class="alert-error">* Email y/o contraseña erróneo</p>
		</form>
		<span class="registro1">¿No tienes cuenta?</span><span class="registro2">¡Registrate!</span>
	</div>
	<div class="details2">
	<p class="titulo-registro">Crea tu cuenta en unos segundos</P>
	<p class="cuerpo-registro">Consigue tu propio perl, con el podrás publicar tus
		mensajes, desbloquear logros y elegir una foto para
		utilizar de avatar.</p>
	<div class="separadores"><span class="separador1">CONECTAR CON:</span></div>
	<img class="login-face" src="archivos/login-face.png" />
	<img class="login-google" src="archivos/login-google.png" />
	<div class="separadores"><span class="separador2">O</span></div>
	<form id="form-registro" action="" method="">
	<p><span class="input-email">EMAIL</span><input type="text" id="email" class="email" name="email-registro" /></p>
	<p><span class="input-email">CONTRASEÑA</span><input type="password" id="pass" class="pass" name="pass-registro" /></p>
	<img class="registrar" src="archivos/crearcuenta.png" />
	<p class="alert-formulario">* Debes rellenar los campos necesarios</p>
	<p class="alert-error">* El email introducido ya existe.</p>
	</form>
	
	</div>
</div>
<div id="menu">
	<div id="contenido-menu">
		<?php echo $login; ?>
	</div>
			<img class="menu" src="archivos/menu.png" />
</div>
<div id="cabecera">
		<img class="logo" src="archivos/textocontacto.png" />		
		<img class="cabecera" src="archivos/cabecera2.jpg" />
</div>
<div id="cuerpo">
	<div class="form">
	<form action="" method="" id="contacto">
			<div class="casillas">
				<p class="desc-nombre">Nombre:</p>
				<input type="text"  class="text-nombre" name="nombre"/>
			</div>
			<div class="casillas">
				<p class="desc-apellidos">E-mail:</p>
				<input type="text"  class="text-email" name="email"/>
			</div>
	
			<p class="desc-email">Asunto:</p>
			<input type="text"  class="text-asunto" name="asunto"/>
	

		<p class="desc-comentario">Comentario:</p>
		<textarea  class="text-comentario" name="comentario"></textarea>
	</form>
	<img class="enviar" src="archivos/enviar.png" />
	</div>
	
</div>
</div>
<div id="footer"></div>
</body>
</html>