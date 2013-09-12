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
<link rel="stylesheet" type="text/css" href="css/empresas.css" />
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
		<img class="logo" src="archivos/textoempresas.png" />		
		<img class="cabecera" src="archivos/cabecera2.jpg" />
</div>
<div id="reto">
	<span class="titulo-pagina">¿CÓMO SER UNA <span style="color:#aede00">CHALLENGE COMPANY?</span></span>
	<p class="titular-organizar">Organizar un evento</p>
	<p class="titular-patrocinar">Patrocinar<br/> un evento Fenexy</p>
	<p class="titular-motivar">Motiva<br/> a los trabajadores</p>
	<img class="imagen-empresas" src="archivos/banderasEmpresas.jpg" />	
	<p class="titular-soporte">PIEZAS DE COMUNICACIÓN FENEXY</p>
	<p class="cuerpo-soporte">Te ofrecemos diferentes <span style="color:rgb(0, 143, 255)">materiales gráficos y audiovisuales</span> de Fenexy para ayudarte a <span style="color:rgb(0, 143, 255)">difundir
	y promocionar tu iniciativa solidaria</span> y conseguir que sea un éxito. Entra aquí para descargarlos.</p>
	<img class="soporte-empresas" src="archivos/soportesempresas.jpg" />	
	
</div>
<div id="organizar">
	<img class="imagen-organizar" src="archivos/organizar.jpg" />
	<p class="cuerpo-organizar1">Organizar un evento en favor de la curación de las lesiones medulares es
	una excelente manera de <span style="color:#aede00">transmitir los valores solidarios</span> de vuestra
	empresa a todos los empleados y al conjunto de la sociedad</p>
	<p class="cuerpo-organizar2">Por cada <span style="color:#aede00;font-size:23px;">100€</span><span style="color:#aede00"> recaudados</span>, tu empresa estará financiando <span style="color:#aede00">un día de investigación</span>
	para la curación de las lesiones medulares</p>
	<p class="cuerpo-organizar3">Puedes hacer <span style="color:#aede00">todo tipo de eventos</span> deportivos, festivos, culturales...</p>
	<p class="titulo-despliegue">Si necesitas ideas utiliza nuestro inspirador virtual: GENERADOR DE IDEAS</p>
	<a href="contacto.php" ><img src="archivos/botonempezar.png" class="empezar" /></a>
</div>
<div id="patrocinar">
	<img class="imagen-patrocinar" src="archivos/patrocinar.jpg" />
	<p class="cuerpo-patrocinar1">TE OFRECEMOS DIFERENTES MANERAS DE COLABORAR:</p>
	<div class="box-patrocinar">
		<p class="titulo-box">Aportación de productos<br/> y servicios.</p>
		<p class="cuerpo-box">Obsequios para todos los
		participantes, material deportivo,
		comida y bebida para los
		avituallamientos, grandes regalos
		para sortear. O bien aportar
		servicios de gestión.</p>
	</div>
	<div class="box-patrocinar">
		<p class="titulo-box">Aportación económica.</p>
		<p class="cuerpo-box">Financiar parte de los costes
		estructurales y de comunicación
		de los eventos Fenexy</p>
	</div>
	<div class="box-patrocinar">
		<p class="titulo-box">Difusión del evento.</p>
		<p class="cuerpo-box">Potenciar la comunicación del
		evento a través de los canales
		de comunicación de tu
		empresa: Página web, redes
		sociales, newsletters, etc...</p>
	</div>
	<div class="box-patrocinar">
		<p class="titulo-box">Sumar participantes.</p>
		<p class="cuerpo-box">Utilizar los canales de
		comunicación internos como
		Intranet o vuestra revista
		corporativa para fomentar la
		participación de los empleados
		de tu empresa en el evento.</p>
	</div>
	<a href="contacto.php" ><img src="archivos/botonempezar.png" class="empezar2" /></a>
</div>
<div id="motivar">
	<img class="imagen-motivar" src="archivos/motivar.jpg" />
	<p class="cuerpo-motivar1">Convertir a tus trabajadores en Challenge Men: Héroes que cumplen retos para curar las lesiones medulares,
	es una forma divertida y creativa de <span style="color:black;">fomentar la cultura de la solidaridad</span><br/>
	en tu empresa e incrementar la <span style="color:black;">motivación</span> y la <span style="color:black;">cohesión interna</span> de los empleados.</p>
	<p class="cuerpo-motivar2">ALGUNAS IDEAS:</p>
		<div class="box-motivar">
		<p class="titulo-box-motivar">Donativo compartido (matching gift):</p>
		<p class="cuerpo-box-motivar">Proyecto conjunto entre los trabajadores
		y tu empresa: Los trabajadores realizan
		donativos a Fenexy a favor de la
		investigación para la curación de las
		lesiones medulares y tu empresa doblará
		la cantidad aportada por los trabajadores.</p>
	</div>
	<div class="box-motivar">
		<p class="titulo-box-motivar">1 euro de la nómina (Teaming).</p>
		<p class="cuerpo-box-motivar">Ofrece la posibilidad a tus empleados a
		destinar un euro de su nómina mensual a
		la investigación por la curación de las
		lesiones medulares.</p>
	</div>
	<div class="box-motivar">
		<p class="titulo-box-motivar">Actividades internas solidarias.</p>
		<p class="cuerpo-box-motivar">Almuerzo benéfico, jornada de apuestas,
		Bingo solidario, etc... Ofrece una actividad
		divertida entre los empleados con un
		precio simbólico destinado íntegramente
		a la investigación por la curación de las
		lesiones medulares.</p>
	</div>
	<a href="contacto.php" ><img src="archivos/botonempezar.png" class="empezar3" /></a>
</div>
</div>
<div id="footer"></div>
</body>
</html>