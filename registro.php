<?php session_start();
	if(isset($_SESSION['reto'])){
		unset($_SESSION['reto']);
	}
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
<link rel="stylesheet" type="text/css" href="css/registro.css" />
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript">
$(document).ready(function(){
var over;
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
	$(".img-retos").mouseover(function(){
		over = $(this);
		rel = $(this).attr("rel");
		$(".titular-reto").css("color","rgb(136, 136, 136)");
		$(".titular-reto[rel='"+rel+"']").css("color","white");
		$(this).prev().animate({
			margin: "0 0 0 0",
		},50)
		
	}).prev().mouseleave(function(){
		$(this).animate({
			margin: "135px 0 0 0",
		},50)
	$(".titular-reto").css("color","rgb(136, 136, 136)");
		
	})
	$(".empezar").click(function(){
		if($("#input-reto").val() == "" ) {
					$("#input-reto").css("border","1px inset red");
					$('.alert-input').fadeIn();
		}else{
			$("#formulario").submit();
		}	
	})
	 $("input,textarea").focus(function() {
			$(this).css("border","1px inset");
			$('.alert-input').fadeOut();
		});	
	
	 $(".boton-empezar").click(function(){
		var destino = $(this).attr('rel');
		var reto = $(this).attr('name');
		document.location.href='session_preset.php?titulo='+destino+'&reto='+reto;
	 });
	 
})
</script>
</head>
<body>
<div id="fondo-cabecera2"></div>
<div class="despliegue">
<div id="open"></div>
</div>
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
		<img class="logo" src="archivos/textoReto.png" />
		
		<img class="cabecera" src="archivos/cabecera2.jpg" />
	
</div>
<div id="reto">
	<img class="sombra" src="archivos/sombragris.jpg" />
	<img class="pasos" src="archivos/pasos1.jpg" />
	<p class="titulo-reto">ESCRIBE TU RETO</p>
	<form action="session_preset.php" method="GET" id="formulario">
		<input type="text" name="titulo" id="input-reto" />
		<img class="empezar" src="archivos/botonempezar.png" />	
	</form>
	<p class="alert-input">* Debes rellenar los campos necesarios</p>
</div>
	<p class="titulo-despliegue1">ELIGE EL QUE MÁS TE GUSTE...</p><img class="img-desplegar1" rel="1" src="archivos/flecha.png" />

	<!-- Retos Deportivos -->
	<div class="content-retos1">
		<span class="over-reto-deportivo"><p class="content-reto1">Ruta en handbike</p><p class="content-reto2">Cruza un país en handbike</p><span class="boton-empezar" rel="Ruta en handbike" name="deportivo">EMPEZAR</span><img class="boton-empezar-reto" src="archivos/botonverde.png" /></span><img class="img-retos" src="archivos/img_handbike.jpg" rel='handbike'  /><span  class="over-reto-deportivo"><p class="content-reto1">Maratón Trip</p><p class="content-reto2">Corre una maratón en 3 países diferentes</p><span class="boton-empezar" rel="Maratón Trip" name="deportivo">EMPEZAR</span><img class="boton-empezar-reto" src="archivos/botonverde.png"/></span><img class="img-retos" src="archivos/img_correr.jpg" rel='correr' /><span  class="over-reto-deportivo"><p class="content-reto1">Quebrantahuesos</p><p class="content-reto2">Participa en la Marcha Ciclista Quebrantahuesos</p><span class="boton-empezar" rel="Quebrantahuesos" name="deportivo">EMPEZAR</span><img class="boton-empezar-reto" src="archivos/botonverde.png"/></span><img class="img-retos" src="archivos/img_bici.jpg" rel='quebrantahuesos' /><span class="over-reto-deportivo"><p class="content-reto1">Entre tiburones</p><p class="content-reto2">Apúntate a una inmersión con tiburones</p><span class="boton-empezar" rel="Entre tiburones" name="deportivo">EMPEZAR</span><img class="boton-empezar-reto" src="archivos/botonverde.png"/></span><img class="img-retos" src="archivos/img_tiburon.jpg" rel='tiburon'  />
	</div>
	<div class="titulos-retos">
		<span class="titular-reto" rel='handbike'>Ruta en handbike</span><span class="titular-reto" rel='correr'>Maratón Trip</span><span class="titular-reto" rel='quebrantahuesos'>Quebrantahuesos</span><span class="titular-reto" rel='tiburon'>Entre tiburones</span>
	</div>
	<!---->
	<!-- Retos Originales -->
	<div class="content-retos2">
		<span class="over-reto-original"><p class="content-reto1">Hacer el pino</p><p class="content-reto2">Camina haciendo el pino frente a 10 monumentos distintos</p><span class="boton-empezar" rel="Hacer el pino" name="original">EMPEZAR</span><img class="boton-empezar-reto" src="archivos/botonnaranja.png"/></span><img class="img-retos" src="archivos/img_pino.jpg" rel='pino'/><span class="over-reto-original"><p class="content-reto1">Dejarme barba</p><p class="content-reto2">Cambia tu look y déjate crecer la barba</p><span class="boton-empezar" rel="Dejarme barba" name="original">EMPEZAR</span><img class="boton-empezar-reto" src="archivos/botonnaranja.png"/></span><img class="img-retos" src="archivos/img_barba.jpg" rel='barba' /><span class="over-reto-original"><p class="content-reto1">Pelo azul Fenexy</p><p class="content-reto2">Tíñete el pelo de color azul Fenexy</p><span class="boton-empezar" rel="Pelo azul Fenexy" name="original">EMPEZAR</span><img class="boton-empezar-reto" src="archivos/botonnaranja.png"/></span><img class="img-retos" src="archivos/img_mostacho.jpg" rel='pelo' /><span class="over-reto-original"><p class="content-reto1">Volar sin capa</p><p class="content-reto2">Lanzarme en paracaídas vestido de superhéroe</p><span class="boton-empezar" rel="Volar sin capa" name="original">EMPEZAR</span><img class="boton-empezar-reto" src="archivos/botonnaranja.png"/></span><img class="img-retos" src="archivos/img_paracaidas.jpg" rel='volar' />
	</div>
	<div class="titulos-retos">
		<span class="titular-reto" rel='pino'>Hacer el pino</span><span class="titular-reto" rel='barba'>Dejarme barba</span><span class="titular-reto" rel='pelo'>Pelo azul Fenexy</span><span class="titular-reto" rel='volar'>Volar sin capa</span>
	</div>
	<!---->
	<!-- Retos Ocio -->
	<div class="content-retos3">	
		<span class="over-reto-ocio"><p class="content-reto1">Ghost concert</p><p class="content-reto2">Organiza un concierto en un pueblo fantasma</p><span class="boton-empezar" rel="Volar sin capa" name="ocio">EMPEZAR</span><img class="boton-empezar-reto" src="archivos/botonlila.png"/></span><img class="img-retos" src="archivos/img_concierto.jpg" rel='concierto' /><span class="over-reto-ocio"><p class="content-reto1">Paella gigante</p><p class="content-reto2">Prepara una paella gigante para más de 20 personas</p><span class="boton-empezar" rel="Paella gigante" name="ocio">EMPEZAR</span><img class="boton-empezar-reto" src="archivos/botonlila.png"/></span><img class="img-retos" src="archivos/img_paella.jpg" rel='paella' /><span class="over-reto-ocio"><p class="content-reto1">SAINT PATRICK al sol</p><p class="content-reto2">Organiza un Saint Patrick's Day en verano</p><span class="boton-empezar" rel="SAINT PATRICK al sol" name="ocio">EMPEZAR</span><img class="boton-empezar-reto" src="archivos/botonlila.png"/></span><img class="img-retos" src="archivos/img_saintpatrick.jpg" rel='saintpatrick'/><span class="over-reto-ocio"><p class="content-reto1">CINE & FRIENDS</p><p class="content-reto2">Reune a más de 50 personas en una sesión de cine al aire libre</p><span class="boton-empezar" rel="CINE & FRIENDS" name="ocio">EMPEZAR</span><img class="boton-empezar-reto" src="archivos/botonlila.png"/></span><img class="img-retos" src="archivos/img_cine.jpg"rel='cine' />
	</div>
	<div class="titulos-retos">
		<span class="titular-reto" rel='concierto'>Ghost concert</span><span class="titular-reto" rel='paella'>Paella gigante</span><span class="titular-reto" rel='saintpatrick'>SAINT PATRICK al sol</span><span class="titular-reto" rel='cine'>CINE & FRIENDS</span>
	</div>
	<!---->

<!--<div class="despliegue">
	<p class="titulo-despliegue2">GENERADOR DE IDEAS</p><img class="img-desplegar2" rel="0" src="archivos/flecha-des.png" />
</div>
<div id="close">
</div>
<div class="despliegue">
	<p class="titulo-despliegue3">O RETA A UN AMIGO</p><img class="img-desplegar3" rel="0" src="archivos/flecha-des.png" />
</div>
<div id="close">
	<div class="content-retos"><img class="logo-deportivos"  src="archivos/iconoamigos1.jpg" />	</div>	
	<div class="content-retos"><img class="logo-deportivos"  src="archivos/iconoamigos2.jpg" />	</div>	
</div>-->
</div>
<div id="footer"></div>
</body>
</html>