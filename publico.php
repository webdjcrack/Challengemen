<?php session_start(); 
require("clase/innerDatos.php");
$inner = New innerDatos();
$id_reto = strtolower($inner->URL());
$id_user = $inner->getUser($id_reto);
$inner->retoFinalizado($id_reto);
if($id_user == FALSE){ 
	echo "<script type='text/javascript'>document.location.href='index.php'</script>";
	die;
}elseif($id_user == 1){
	echo "<script type='text/javascript'>document.location.href='index.php'</script>";
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
<link rel="stylesheet" type="text/css" href="css/reto.css" /><!-- Unificar CSS -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.2.custom.css" />
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script><!-- Unificar javascript -->
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script src="js/publico.js" type="text/javascript"></script>

</head>
<body>
<div id="fondo-reto"></div>
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
		<!--<img class="logo" src="archivos/textomision.png" />-->		
		<img class="cabecera" src="archivos/cabecerareto.jpg" />
</div>
<div id="cuerpo">
<div id="left">
	<div id="carpeta_superior">
	<?php echo $inner->innerFoto($id_reto);?>
		<p class="nombre">
			<?php echo $inner->datosUser($id_user,'nombre');?>
		</p>
	</div>
	<div id="repeat_carpeta">
		<p class="titulos-libreta">ACERCA DE MI</p>
		<img class="franja" src="archivos/franjaverde.png" />
		<p class="sobremi">
			<?php echo $inner->datosUser($id_user,'sobremi');?>
		</p>
		<p class="titulos-libreta">MEDALLAS</p>
		<img class="franja" src="archivos/franjaverde.png" />
	<?php require("medallas.php"); ?>
	</div>
	<div id="pie_carpeta"></div>
	
</div>
	<div id="right">
	<div id="redes">
		<p class="texto-redes">Compartir reto en:</p>
		<img class="shareface" rel="face" src="archivos/face1.jpg" />
		<img class="sharetwitter" rel="twitter" src="archivos/twitter1.jpg" />
	</div>
		<p class="titulo"><?php echo $inner->datosReto($id_reto,'titulo');?></p>
		<img class="icono-donde" src="archivos/iconodonde.png" /><img class="icono-cuando" src="archivos/iconohora.png" /><img class="icono-fecha" src="archivos/iconocuando.png" />
		<div id="datos_perfil">
			<span class="donde"><?php echo $inner->datosReto($id_reto,'donde');?></span><span class="cuando"><?php echo $inner->datosReto($id_reto,'hora');?></span><span class="fecha-perfil"><?php echo $inner->datosReto($id_reto,'fecha');?></span>
			<?php echo $inner->tiempoRestante($id_reto);?>
		</div>
		<div id="div_slider"><span class="conseguido"><?php echo $inner->datosReto($id_reto,'conseguido');;?></span><span class="euro1">€</span><span class="texto-conseguido"> CONSEGUIDOS</span><span class="cantidad"><?php echo $inner->datosReto($id_reto,'dinero');?></span><span class="euro2">€</span><span class="texto-cantidad"> NECESARIOS</span></div>
			<div id="progressbar" style="width:625px;height:8px;margin-top: 10px;"></div>
		<p class="mensaje"><?php echo $inner->datosReto($id_reto,'comentario');?></p>
		<div id="donar">
		<?php if($inner->datosReto($id_reto,'finalizado') != 1){?>
		<form id="donacion" method="" action="" >	
			<span class="titulo-donacion">¡AYÚDAME A CONSEGUIRLO!</span>
				<div style="width:342px;margin:53px 0 0 68px;">
					<div id="slider-range-min"></div><div id="input"><input type="text" id="input-cantidad" name="cantidad" /><span class="euro">€</span></div>
				</div>
				
				
			<div id="tarjeta">
				<img class="sombra2" src="archivos/sombragris.jpg" />
				<p class="titulo-tarjeta">TUS DATOS</p>
							
				<div id="form-bloque1">
					<span class="desc-nombre">Nombre:</span>
					<input type="text"  class="text-nombre" name="nombre"/>
					<span class="desc-apellidos">Apellidos:</span>
					<input type="text"  class="text-apellidos" name="apellidos"/>
				</div>
				<div id="form-bloque2">
					<span class="desc-email">E-mail:</span>
					<input type="text"  class="text-email" name="correo"/>
					
				</div>
				<div id="form-bloque4">
					<span class="desc-pais">País:</span>
					<input type="text"  class="text-pais" name="pais"/>
				</div>
				<div id="form-bloque3">	
					
					<span class="desc-poblacion">Población:</span>
					<input type="text"  class="text-poblacion" name="poblacion"/>
					<p class="titulo-donacion">¡DALE ÁNIMOS! <span style="font-size:16px;">(OPCIONAL)</span></p>
					<textarea  class="text-comentario" name="comentario"></textarea>
					<input type="hidden" name="id_reto" value="<?php echo $inner->datosReto($id_reto,'titulo');?>" />
					<input type="hidden" name="id_user" value="<?php echo $inner->datosReto($id_reto,'id_usuario');?>" />
				</form>	
			</div>
			</div>
			
		<p class="alert-formulario">* Debes rellenar los campos necesarios</p>	
		
		<img class="donar"  src="archivos/botondonar.png" />
		<?php } ?>
		</div>
		<?php echo $inner->mensajeUsuario($id_reto);?>
		<img class="sombra-flecha" src="archivos/flechagris.jpg" />
		<div class="cajas">
			<p class="subtitulos">¿CUAL ES MI RETO?</p>
			<p class="exito"><?php echo $inner->datosReto($id_reto,'descripcion');?></p>
		</div>
		<div class="cajas">
			<span class="subtitulos2">Y si no lo consigo</span>
			<span class="fracaso">
			<?php echo $inner->datosReto($id_reto,'fracaso');?></span>
		</div>
		<img class="sombra" src="archivos/sombragris.jpg" />
		<div id="promo">
			<p class="titulo_promo">¿Cómo ayudas a curar las lesiones medulares?</p>
			<img class="img-promo" src="archivos/banner-reto.jpg" />
			<p class="texto-promo1"><span class="resalte-url">Fundación Fenexy</span> y <span class="resalte-url">Proyecto Lazarus</span> hemos iniciado el proceso de creación de un tratamiento<br/> definitivo para curar la lesión medular.<br/>
			Descubre más en <span class="resalte-url">www.fenexy.org y en www.proyectolazarus.com.</span></p>
			<p class="texto-promo2">Hoy es un buen día para ser un Challenge Men.</p>
		<p class="gracias"> GRACIAS A: </p>
		</div>
		<div id="donaciones">	
			<?php echo $inner->innerComentarios($id_reto);?>	
		</div>
		<input type="hidden" name="<?php echo urlencode($id_reto);?>" id="id_reto" />
	</div>
</div>
</div>
<div id="footer"></div>
</body>
</html>