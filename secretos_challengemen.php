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
<link rel="stylesheet" type="text/css" href="css/secretos_challengemen.css" />
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".consejos div,.consejos-gris div").each(function(i){
			var rel = $(this).attr('rel');
			$(this).css('marginTop',rel);
		});
});
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
		<img class="logo" src="archivos/textoconsejos.png" />		
		<img class="cabecera" src="archivos/cabecera2.jpg" />
</div>
<div id="cuerpo">
	<div class="consejos">
		<div class="contet-text-right" rel="133px">
			<p class="titulo-consejos">Nunca dejes a nadie indiferente.</p>
			<p class="cuerpo-consejos"><span class="resalte-verde">Elige una fotografía tuya que sea espectacular, 
				divertida, emotiva</span>: Que te defina y no deje indiferente a nadie. Descríbete 
				con sinceridad y frescura: Habla de tus gustos, tus motivaciones, tus experiencias.
				Cuanto más cercana y personal sea tu página, más eficaz será.</p>
		</div>	
		<img class="" src="archivos/slide-consejo1.jpg" />
	</div>
	<div class="consejos-gris">
		<div class="contet-text-left" rel="122px">
			<p class="titulo-consejos">Si tú donas, ellos donan.</p>
			<p class="cuerpo-consejos"><span class="resalte-verde">Las primeras donaciones son siempre las que más cuestan.</span>
				El número cero es un gran desmotivador con un bucle perverso -Nadie quiere ser el primero en donar.<br/>
				<span class="resalte-verde">La solución es fácil:</span> Sé tú el primero. Romperás el bucle, ganarás credibilidad e impulsarás la suma de donaciones.
			</p>
		</div>
		<img class="img-consejo" src="archivos/slide-consejo2.jpg" />
	</div>
	<div class="consejos">
		<div class="contet-text-right" rel="149px">
			<p class="titulo-consejos">Tu entorno quiere que seas un Superhéroe.</p>
			<p class="cuerpo-consejos">¿Quién le dice no a un hijo? ¿O a una novia? 
				¿O a su mejor amigo? <span class="resalte-verde">Contacta primero con tu entorno más directo, familiares
				y amigos, y anímales a participar en tu reto.</span> Seguro que estarán encantados
				de convertirte en Challenge Men.</p>
		</div>
		<img class="" src="archivos/slide-consejo3.jpg" />
	</div>
	<div class="consejos-gris">
	<div class="contet-text-left" rel="138px">
		<p class="titulo-consejos">Correo electrónico,<br/> un clásico muy eficaz.</p>
		<p class="cuerpo-consejos"><span class="resalte-verde">Utiliza tu propio correo electrónico.</span> Describe 
			tu iniciativa en un mail breve con el link de tu reto y envíalo a todos tus 
			contactos. Te sorprenderá la eficacia de un simple mail para sumar aliados 
			a tu causa.</p>
	</div>
		<img class="img-consejo" src="archivos/slide-consejo4.jpg" />
	</div>
	<div class="consejos">
		<div class="contet-text-right" rel="141px">
			<p class="titulo-consejos">Convierte tu reto en tu firma.</p>
			<p class="cuerpo-consejos"><span class="resalte-verde">Aprovecha cualquier oportunidad para difundir tu reto.</span>
				Incluye el link de tu reto en la firma de tus correos electrónicos, en tu web personal,
				blogs, cartas de presentación...
				Te recomendamos añadir una frase introductoria como - <span class="resalte-verde">¿Te sumas a mi reto solidario?</span>
			</p>
		</div>
		<img class="" src="archivos/slide-consejo5.jpg" />
	</div>
	<div class="consejos-gris">
		<div class="contet-text-left" rel="128px">
			<p class="titulo-consejos">Tu reto también es el nuestro.</p>
			<p class="cuerpo-consejos">Además de tus amigos y familiares, todo el equipo
				de Fenexy apoyamos al 100% tu reto. Haremos todo lo posible para convertirte en Challenge Men.
				<span class="resalte-verde">Escríbenos siempre que quieras a info@fenexy.org</span> y te ayudaremos a conseguir tu objetivo.</p>
		</div>
		<img class="img-consejo" src="archivos/slide-consejo6.jpg" />
	</div>
	<div class="consejos">
		<div class="contet-text-right" rel="128px">
			<p class="titulo-consejos">Prográmate un calendario de mailings.</p>
			<p class="cuerpo-consejos"><span class="resalte-verde">¡Con un mail no es suficiente! Reescribe a tus
				contactos al menos una vez al mes hasta la fecha límite de tu reto.</span> Da las
				gracias cada vez que alguien suma una nueva donación, mantén informados a 
				los que han colaborado y a todos los que no lo han hecho recuérdales que aún 
				están a tiempo de donar ; )</p>
		</div>
		<img class="" src="archivos/slide-consejo7.jpg" />
	</div>
</div>
</div>
<div id="footer"></div>
</body>
</html>