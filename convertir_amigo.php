<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv="content-language" content="es" />
<title>ChallengeMen</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/estilos.css" />
<link rel="stylesheet" type="text/css" href="css/convertir_amigo.css" />
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
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
<div id="content">
<div id="menu">
		<img class="menu" src="archivos/challenge-boton.png" />
</div>
<div id="cabecera">
		<img class="logo" src="archivos/textoamigo.png" />		
		<img class="cabecera" src="archivos/cabecera2.jpg" />
</div>
<div id="cuerpo">
	<img class="iconos-amigos" src="archivos/iconoamigo.jpg" />
	
	<div class="titulos-box">
		<p class="titulo-box">Dedícale un reto<br/>
		a medida.</p>
		<p class="cuerpo-box">Motívalo con un reto
		que tenga pendiente
		o que vaya con su carácter.</p>
	</div>
	<div class="titulos-box">
		<p class="titulo-box">Motívale con un
		desafío entre tú y él.</p>
		<p class="cuerpo-box">
		Si tú consigues amigos
		que te apoyen, él deberá
		cumplir su reto. ¡Este es el trato!</p>
	</div>
	<div class="titulos-box">
		<p class="titulo-box">Lánzale el desafío</p>
		<p class="cuerpo-box">Completa este formulari
		o y lánzale tu desafió
		por correo electrónico</p>
	</div>
	<div class="titulos-box">
		<p class="titulo-box">Sí acepta,<br/>
		empieza el juego</p>
		<p class="cuerpo-box">Si acepta el desafío, se activará
		la página y podrás empezar
		a sumar donantes.</p>
	</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>