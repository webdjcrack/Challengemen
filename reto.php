<?php session_start(); 
require("clase/innerDatos.php");
$inner = New innerDatos();
$id_reto = $inner->URL();
$id_user = $inner->getUser($id_reto);
$_SESSION['usuario'] = $id_user;
if(!isset($_SESSION['usuario'])){
	echo "Error sesion";
	exit;
}
if($id_user == FALSE){ 
	echo "No existe el reto! :("; 
	die;
}
if($inner->retoFinalizado($id_reto) == TRUE){
	echo "Reto finalizado!";
	die;
}
if($id_user == FALSE){ 
	echo "No existe el reto! :("; 
	die;
}

//if(!isset($_SESSION['usuario']) && empty($_SESSION['usuario'])) echo "<script type='text/javascript'>document.location.href='reto.php'</script>";
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
<script src="js/jquery.jeditable.mini.js" type="text/javascript"></script>
<script src="js/reto.js" type="text/javascript"></script>

</head>
<body>
<div id="content">
	<div class="overlay-popup" id="popup"><!-- div_overlay -->
		  <div class="detalles">
		  <div id="nuevo-usuario">
		  <form id="" action="" method="">
				<p class="titulo-alta">SOY NUEVO</p>
					<span class="">Nombre:</span>
					<input type="text"  class="" name="nombre"/><br/>
					<span class="">Apellidos:</span>
					<input type="text" class="" name="apellidos"/><br/>
					<span class="">E-mail:</span>
					<input type="text"  class="" name="email"/><br/>	
					<span class="">Contraseña:</span>
					<input type="password"  class="text" name="pass"/><br/>
					<span class="">Repetir Contraseña:</span>
					<input type="password"  class="text" name="repeat-pass"/><br/>
					<img class="envio-usuario" src="archivos/botonregistro.png" />
			</form>
		  </div>
		  <div id="login-usuario">
		   <form id="" action="" method="">
				<p class="titulo-usuario">ACCEDER A MI CUENTA</p>
				<span class="">E-mail:</span>
				<input type="text"  class="" name="nombre"/><br/>
				<span class="">Contraseña:</span>
				<input type="password" class="" name="apellidos"/><br/>
				<img class="entrar-usuario" src="archivos/botonentrar.png" />
			</form>
		  </div>
		  </div>
	</div>
	<!-- Fin div_overlay -->
	<div class="overlay-consejos" id="consejos">
	<img class="next" src="archivos/next.png" />
	<img class="prev" src="archivos/prev.png" />
	<div id="consejos-overflow">
		<div id="content-consejos">
			<div class="details" name="current" rel="first">
				<div class="contet-text-right" rel="133px">
					<p class="titulo-consejos">Nunca dejes a nadie indiferente.</p>
					<p class="cuerpo-consejos"><span class="resalte-verde">Elige una fotografía tuya que sea espectacular, 
					divertida, emotiva</span>: Que te defina y no deje indiferente a nadie. Descríbete 
					con sinceridad y frescura: Habla de tus gustos, tus motivaciones, tus experiencias.
					Cuanto más cercana y personal sea tu página, más eficaz será.</p>
				</div>	
				<img class="slide_consejos" src="archivos/slide-consejo1.jpg"/>
			</div>
			<div class="details" name="">
				<div class="contet-text-left" rel="122px">
					<p class="titulo-consejos">Si tú donas, ellos donan.</p>
					<p class="cuerpo-consejos"><span class="resalte-verde">Las primeras donaciones son siempre las que más cuestan.</span>
					El número cero es un gran desmotivador con un bucle perverso -Nadie quiere ser el primero en donar.<br/>
					<span class="resalte-verde">La solución es fácil:</span> Sé tú el primero. Romperás el bucle, ganarás credibilidad e impulsarás la suma de donaciones.
					</p>
				</div>
				<img class="slide_consejos" src="archivos/slide-consejo2.jpg"/>
			</div>
			<div class="details" name="">
				<div class="contet-text-right" rel="149px">
					<p class="titulo-consejos">Tu entorno quiere que seas un Superhéroe.</p>
					<p class="cuerpo-consejos">¿Quién le dice no a un hijo? ¿O a una novia? 
					¿O a su mejor amigo? <span class="resalte-verde">Contacta primero con tu entorno más directo, familiares
					y amigos, y anímales a participar en tu reto.</span> Seguro que estarán encantados
					de convertirte en Challenge Men.</p>
				</div>
				<img class="slide_consejos" src="archivos/slide-consejo3.jpg"/>
			</div>
			<div class="details" name="">
				<div class="contet-text-left" rel="138px">
					<p class="titulo-consejos">Correo electrónico, un clásico muy eficaz.</p>
					<p class="cuerpo-consejos"><span class="resalte-verde">Utiliza tu propio correo electrónico.</span> Describe 
					tu iniciativa en un mail breve con el link de tu reto y envíalo a todos tus 
					contactos. Te sorprenderá la eficacia de un simple mail para sumar aliados 
					a tu causa.</p>
				</div>
				<img class="slide_consejos" src="archivos/slide-consejo4.jpg"/>
			</div>
			<div class="details" name="">
				<div class="contet-text-right" rel="141px">
					<p class="titulo-consejos">Convierte tu reto en tu firma.</p>
					<p class="cuerpo-consejos"><span class="resalte-verde">Aprovecha cualquier oportunidad para difundir tu reto.</span>
					Incluye el link de tu reto en la firma de tus correos electrónicos, en tu web personal,
					blogs, cartas de presentación...
					Te recomendamos añadir una frase introductoria como - <span class="resalte-verde">¿Te sumas a mi reto solidario?</span>
					</p>
				</div>
				<img class="slide_consejos" src="archivos/slide-consejo5.jpg"/>
			</div>
			<div class="details" name="">
				<div class="contet-text-left" rel="128px">
					<p class="titulo-consejos">Tu reto también es el nuestro.</p>
					<p class="cuerpo-consejos">Además de tus amigos y familiares, todo el equipo
					de Fenexy apoyamos al 100% tu reto. Haremos todo lo posible para convertirte en Challenge Men.
						<span class="resalte-verde">Escríbenos siempre que quieras a info@fenexy.org</span> y te ayudaremos a conseguir tu objetivo.</p>
				</div>
				<img class="slide_consejos" src="archivos/slide-consejo6.jpg"/>
			</div>
			<div class="details" name="" rel="last">
				<div class="contet-text-right" rel="128px">
					<p class="titulo-consejos">Prográmate un calendario de mailings.</p>
					<p class="cuerpo-consejos"><span class="resalte-verde">¡Con un mail no es suficiente! Reescribe a tus
					contactos al menos una vez al mes hasta la fecha límite de tu reto.</span> Da las
					gracias cada vez que alguien suma una nueva donación, mantén informados a 
					los que han colaborado y a todos los que no lo han hecho recuérdales que aún 
					están a tiempo de donar ; )</p>
				</div>
				<img class="slide_consejos" src="archivos/slide-consejo7.jpg"/>
			</div>
		</div>
	</div>
	</div>
<div id="menu">
		<img class="menu" src="archivos/challenge-boton.png" />
</div>
<div id="cabecera">
		<!--<img class="logo" src="archivos/textomision.png" />-->
		
		<img class="cabecera" src="archivos/cabecerareto.jpg" />
	
</div>
<div id="cuerpo">
<img class="close-alert" src="archivos/close.png" /><div id="alert">Registrate para conseguir tu primera medalla</div>
<img class="close-alert" src="archivos/close.png" /><div id="alert">Confirma tu dirección de correo y consigue una medalla de “confirmacion”</div>
<div id="left">
	<div id="over-foto">
		<div id="input-foto">
		<span class="simbolo-mas">+</span><span class="texto-agregar">Añadir foto</span>
		<input type="file" name="foto-perfil" class="input-agregar" />
		</div>
	</div>
	<img class="foto_perfil" src="archivos/fotopredef.jpg" />
	
	<div id="carpeta">
		<p class="nombre">
			Antonio Pérez Pérez
		</p>
		<p class="sobremi">
			I wanted to see what else we could do.Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
			homoeroticism. I wanted to see what else we could do.Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
			homoeroticism. I wanted to see what else we could do.Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
		</p>
	</div>
	<img class="boton-consejos" rel="#consejos" src="archivos/botonconsejos.jpg" />
	
</div>
	<div id="right">
		<p class="titulo">SALTO EN PARACAIDAS</p>
		<img class="icono-donde" src="archivos/iconodonde.png" /><img class="icono-cuando" src="archivos/iconohora.png" /><img class="icono-fecha" src="archivos/iconocuando.png" />
		<div id="datos_perfil">
			<span class="donde">Barcelona</span><span class="cuando">22:00 / 00:00</span><span class="fecha-perfil">24/04/2013</span>
			<p class="titulo-tiempo">QUEDAN:</p><p class="tiempo-restante">0 DIAS Y 0 HORAS</p>
		</div>
		<div id="div_slider"><span class="conseguido">50</span><span class="euro1">€</span><span class="texto-conseguido"> CONSEGUIDOS</span><span class="cantidad">100</span><span class="euro2">€</span><span class="texto-cantidad"> NECESARIOS</span></div>
			<div id="progressbar" style="width:625px;height:8px;"></div>
		<p class="mensaje">Y si no lo consigo rom the perspective of butch-man-dance or Brokeback
			Mountain-style homoeroticism. I wanted to see what else we could do</p>
		<div id="donar">
			<span class="titulo-donacion">¡AYÚDAME A CONSEGUIRLO!</span>
				<div style="width:342px;margin:53px 0 0 68px;">
					<div id="slider-range-min"></div><div id="input"><input type="text" id="input-cantidad" name="cantidad" /><span class="euro">€</span></div>
				</div>
				<img class="siguiente" src="archivos/siguiente.jpg" />
				
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
					<input type="text"  class="text-email" name="email"/>
					
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
			</div>
			</div>
			
			
		</div>
		<img class="donar" src="archivos/botondonar.png" />
		<img class="sombra-flecha" src="archivos/flechagris.jpg" />
		<div class="cajas">
			<p class="subtitulos">¿CUAL ES MI RETO?</p>
			<p class="exito">Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
			homoeroticism. I wanted to see what else we could do.Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
			homoeroticism. I wanted to see what else we could do.Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
			homoeroticism. I wanted to see what else we could do.Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
			homoeroticism. I wanted to see what else we could do.</p>
		</div>
		<div class="cajas">
			<span class="subtitulos2">Y si no lo consigo</span>
			<span class="fracaso">
			Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
			homoeroticism. I wanted to see what else we could do.Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
			homoeroticism. I wanted to see what else we could do.</span>
		</div>
		<img class="sombra" src="archivos/sombragris.jpg" />
		<div id="promo">
			<p class="titulo_promo">¿Cómo ayudas a curar las lesiones medulares?</p>
			<img class="img-promo" src="archivos/banner-reto.jpg" />
			<p class="texto-promo1">Todas las donaciones se destinarán al Proyecto Volver a Caminar:<br/>  Una ambicioso proyecto científico para curar las lesiones medulares.</p>
			<p class="texto-promo2">Descubre más en <a href="http://www.fenexy.org" target="_blank">www.fenexy.org</a> y en <a href="http://www.proyectolazarus.com" target="_blank">www.proyectolazarus.com</a></p>
		</div>
		<div id="donaciones">
			<p class="gracias"> GRACIAS A: </p>
			<div class="donativo">
			<span class="nombre_donacion">ANTONIO</span><span class="fecha_donacion">24/12/2013</span><span class="cantidad_donacion">300€</span>
			<p class="comentario_donacion">“Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
			”</p>
			</div>	
		<div class="donativo">
			<span class="nombre_donacion">ANTONIO</span><span class="fecha_donacion">24/12/2013</span><span class="cantidad_donacion">12€</span>
			<p class="comentario_donacion">“Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
			homoeroticism. I wanted to see what else we could do.Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
			homoeroticism. I wanted to see what else we could do.”</p>
			</div>		
		<div class="donativo">
			<span class="nombre_donacion">ANTONIO</span><span class="fecha_donacion">24/12/2013</span><span class="cantidad_donacion">5€</span>
			<p class="comentario_donacion">“Y si no lo consigo rom the perspective of butch-man-dance or Brokeback Mountain-style
			homoeroticism. I wanted to see what else we could do.”</p>
			</div>				
		</div>
		
	</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>