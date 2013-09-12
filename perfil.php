<?php session_start(); 
	require("clase/innerDatos.php");
	require("clase/clase_perfil.php");
	$inner = New innerDatos();
	$perfil = New Perfil();
	$id_user = $_SESSION['id_user'];
	$id_reto = $inner->datosReto($id_user,'titulo');
	if(!isset($_SESSION['id_user']) && empty($_SESSION['id_user'])) echo "<script type='text/javascript'>document.location.href='index.php'</script>";
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
<link rel="stylesheet" type="text/css" href="css/perfil.css" /><!-- Unificar CSS -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.2.custom.css" />
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script><!-- Unificar javascript -->
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="js/jquery.jeditable.mini.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	var reto;
	$("#contenedor-medallas img").overlay({mask:'grey'});
	$(".reto-pendiente img").overlay({mask:'grey'});
	$(".cancela-reto").click(function(){
		reto = $(this).attr("name");
		$(".eliminar-reto").click(function(){
			$.ajax({
			type: "POST",
			url: "controlador/eliminar-reto.php",
			data: 'reto='+reto,
			success: function(data) {
				if(data == 1){
						location.reload(true);
				}else{ 
					alert("error");
				}
			}
		})
		})
	
	})
	
	$(".seguir-reto").click(function(){
			$(".reto-pendiente img.cancela-reto").overlay().close();
	})
	
});
</script>
</head>
<body>
<div id="fondo-cabecera2"></div>
<div id="content">
<div class="overlay-cancelar" id="cancelar">
<div class="details">
	<p class="titulo-cancelar">¿Estás seguro que deseas cancelar el reto?</p>
	<p class="cuerpo-cancelar">Solo se permite cancelar el reto en un período de 12 horas desde la
	creación del mismo alegando un error de formulación.</P>
	<img class="eliminar-reto" src="archivos/eliminarlo.png" />
	<img class="seguir-reto" src="archivos/seguir.png" />
</div>
</div>
<div class="overlay-popup" id="popup">
<div class="details">
	<div class="medallas">
		<img class="medalla-popup" src="archivos/1.png" />
		<span class="titulo-medalla">El origen</span>
		<span class="cuerpo-medalla">Empezar tu primer reto</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/2.png" />
		<span class="titulo-medalla">Primera victoria</span>
		<span class="cuerpo-medalla">Conseguir tu primer reto</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/3.png" />
		<span class="titulo-medalla">Buen intento</span>
		<span class="cuerpo-medalla">Medalla de consolación por no alcanzar tu objetivo</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/4.png" />
		<span class="titulo-medalla">Doctor Fenexy</span>
		<span class="cuerpo-medalla">Completar 10 retos</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/5.png" />
		<span class="titulo-medalla">All In</span>
		<span class="cuerpo-medalla">Marcarte un objetivo solidario de +500€</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/6.png" />
		<span class="titulo-medalla">Sentido arácnido</span>
		<span class="cuerpo-medalla">Alcanzar el objetivo marcado</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/7.png" />
		<span class="titulo-medalla">Popular</span>
		<span class="cuerpo-medalla">Conseguir más de 10 donaciones</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/8.png" />
		<span class="titulo-medalla">Famoso</span>
		<span class="cuerpo-medalla">Conseguir más de 25 donaciones</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/9.png" />
		<span class="titulo-medalla">Eterno</span>
		<span class="cuerpo-medalla">Conseguir más de 50 donaciones</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/10.png" />
		<span class="titulo-medalla">Cronos</span>
		<span class="cuerpo-medalla">Alcanzar tu objetivo antes del día límite</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/11.png" />
		<span class="titulo-medalla">Profesor X</span>
		<span class="cuerpo-medalla">Compartir 10 veces en el Facebook</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/12.png" />
		<span class="titulo-medalla">Tarzan Call</span>
		<span class="cuerpo-medalla">Compartir 10 veces en el Twitter</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/13.png" />
		<span class="titulo-medalla">Antorcha humana</span>
		<span class="cuerpo-medalla">Cumplir un reto en verano</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/14.png" />
		<span class="titulo-medalla">Ice man</span>
		<span class="cuerpo-medalla">Cumplir un reto en invierno</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/15.png" />
		<span class="titulo-medalla">Reto deportivo</span>
		<span class="cuerpo-medalla">2 retos conseguidos</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/16.png" />
		<span class="titulo-medalla">Reto deportivo</span>
		<span class="cuerpo-medalla">5 retos conseguidos</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/17.png" />
		<span class="titulo-medalla">Reto deportivo</span>
		<span class="cuerpo-medalla">+5 retos conseguidos</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/18.png" />
		<span class="titulo-medalla">Reto ocio</span>
		<span class="cuerpo-medalla">2 retos conseguidos</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/19.png" />
		<span class="titulo-medalla">Reto ocio</span>
		<span class="cuerpo-medalla">5 retos conseguidos</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/20.png" />
		<span class="titulo-medalla">Reto ocio</span>
		<span class="cuerpo-medalla">+5 retos conseguidos</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/21.png" />
		<span class="titulo-medalla">Reto original</span>
		<span class="cuerpo-medalla">2 retos conseguidos</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/22.png" />
		<span class="titulo-medalla">Reto original</span>
		<span class="cuerpo-medalla">5 retos conseguidos</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/23.png" />
		<span class="titulo-medalla">Reto original</span>
		<span class="cuerpo-medalla">+5 retos conseguidos</span>
	</div>
	<div class="medallas">
		<img class="medalla-popup" src="archivos/24.png" />
		<span class="titulo-medalla">Fotogénico</span>
		<span class="cuerpo-medalla">Subir una foto al evento</span>
	</div>
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
		
			<p class="nombre" id="nombre_<?php echo $inner->datosUser($id_user,'id_user');?>">
				<?php echo $inner->datosUser($id_user,'nombre');?>
			</p>
		</div>
		<div id="repeat_carpeta">
			<p class="titulos-libreta">ACERCA DE MI</p>
			<img class="franja" src="archivos/franjaverde.png" />
			<p class="sobremi" id="sobremi_<?php echo $inner->datosUser($id_user,'id_user');?>">
				<?php echo $inner->datosUser($id_user,'sobremi');?>
			</p>
		</div>
		<div id="pie_carpeta"></div>
		<div id="mis-datos">
			<p class="titulo-pendientes">MIS DATOS</p>
			<p class="titulo-datos">EMAIL:</p>
			<p class="cuerpo-datos"><?php echo $inner->datosUser($id_user,'email');?></p>
			<p class="titulo-datos">CONTRASEÑA:</p>
			<p class="cuerpo-datos"><?php echo $inner->datosUser($id_user,'pass');?></p>
		</div>
		
	</div>
	<div id="right">
		<p class="titulo">PERFIL PERSONAL</p>
		<!-- Retos Pendientes -->
		<div id="retos-pendientes">
			<p class="titulo-pendientes">RETOS PENDIENTES</p>
			<?php echo $perfil->retosPendientes($id_user); ?>
			</div>
		<!-- Todos retos -->
		<div id="todos-retos">
			<p class="titulo-pendientes">TODOS MIS RETOS</p>
				<?php echo $perfil->todosRetos($id_user); ?>
		
		</div>
		<div class="clear"></div>
		<!-- Medallas -->
		<div id="medallas">
			<p class="titulo-pendientes">MEDALLAS</p>
			<div id="contenedor-medallas">
				<?php echo $perfil->Medallas($id_user); ?>
			</div>
			<img class="aclaracion" src="archivos/aclaracion-medallas.jpg" />
		</div>
		
	</div>
		
</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>