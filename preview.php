<?php session_start(); 
//if(!isset($_SESSION['usuario']) && empty($_SESSION['usuario'])) echo "<script type='text/javascript'>document.location.href='reto.php'</script>";
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
<script src="js/jquery.jeditable.mini.js" type="text/javascript"></script>
<script src="js/preview.js" type="text/javascript"></script>
<script type="text/javascript">
 (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
$(document).ready(function(){
	$('#popup').overlay({closeOnClick:false, mask:'grey', load: true})

	function loginCallback(authResult) {
		  if (authResult['access_token']) {	
				gapi.client.load('plus', 'v1', function() {
				  var request = gapi.client.plus.people.get({
					'userId': 'me'
				  });
				  request.execute(function(resp) {
					gapi.client.load('oauth2', 'v2', function() {
					  var request = gapi.client.oauth2.userinfo.get();
					  request.execute(function(obj){
						var el = document.getElementById('hidden-data');
						var email = '';
						if (obj['email']) {
						  email = obj['email'];
						}						
						el.innerHTML = email;
						correo = document.getElementById('hidden-data').innerHTML;
						$.ajax({
							type: "POST",
							url: "controlador/procesaRetoFacebook.php",
							data:  { name: resp.displayName, email: correo },
							success: function(data) {	
								if(data == 1){
									document.location.href='privado.php';//Reenviar a página privado.php con sesion usuario iniciada
								}else{ 
									$('.alert-error').fadeIn();
									  var revokeUrl = 'https://accounts.google.com/o/oauth2/revoke?token=' + authResult['access_token'];
									  // Perform an asynchronous GET request.
									  $.ajax({
										type: 'GET',
										url: revokeUrl,
										async: false,
										contentType: "application/json",
										dataType: 'jsonp',
										success: function(nullResponse) {
										  // Do something now that user is disconnected
										  // The response is always undefined.
										},
										error: function(e) {
										  // Handle the error
										  // console.log(e);
										  // You could point users to manually disconnect if unsuccessful
										  // https://plus.google.com/apps
										}
									  });
									
								}	
							}
						})
					  })	  
					});
					
				  });
			   });	  
		  } else if (authResult['error']) {
		  }
		
}
function registroCallback(authResult) {
		  if (authResult['access_token']) {	
				gapi.client.load('plus', 'v1', function() {
				  var request = gapi.client.plus.people.get({
					'userId': 'me'
				  });
				  request.execute(function(resp) {
					gapi.client.load('oauth2', 'v2', function() {
					  var request = gapi.client.oauth2.userinfo.get();
					  request.execute(function(obj){
						var el = document.getElementById('hidden-data');
						var email = '';
						if (obj['email']) {
						  email = obj['email'];
						}						
						el.innerHTML = email;
						correo = document.getElementById('hidden-data').innerHTML;
						$.ajax({
						type: "POST",
						url: "controlador/procesaRegistroFacebook.php",
						data:  {  name: resp.displayName, email: correo },
						success: function(data) {	
							if(data == 1){
								document.location.href='privado.php';//Reenviar a página privado.php con sesion usuario iniciada
							}else{ 
								$('.alert-error').fadeIn();
								 var revokeUrl = 'https://accounts.google.com/o/oauth2/revoke?token=' + authResult['access_token'];
								  // Perform an asynchronous GET request.
								  $.ajax({
									type: 'GET',
									url: revokeUrl,
									async: false,
									contentType: "application/json",
									dataType: 'jsonp',
									success: function(nullResponse) {
									  // Do something now that user is disconnected
									  // The response is always undefined.
									},
									error: function(e) {
									  // Handle the error
									  // console.log(e);
									  // You could point users to manually disconnect if unsuccessful
									  // https://plus.google.com/apps
									}
									  });
								}
								
							}
						})
					  })	  
					});
					
				  });
			   });	  
		  } else if (authResult['error']) {
		  }
		
}
	$('#login-google').click(function(){
	  var clientId = '542489101212.apps.googleusercontent.com';
      var apiKey = 'AIzaSyCpH0qthwt60HNcBBg_VMQIclM0mgXUfMc';
      var scopes = "https://www.googleapis.com/auth/userinfo.email";
	  gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false},   loginCallback);
	 })
	 $('#registro-google').click(function(){
	  var clientId = '542489101212.apps.googleusercontent.com';
      var apiKey = 'AIzaSyCpH0qthwt60HNcBBg_VMQIclM0mgXUfMc';
      var scopes = "https://www.googleapis.com/auth/userinfo.email";
	  gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false},   registroCallback);
	 })
});
</script>
</head>
<body>
<div id="fondo-reto"></div>
<div id="content">

<div class="overlay" id="popup">
<div class="details">
	<p class="titulo-login">¡HOLA DE NUEVO!</P>
	<p class="cuerpo-login">Puedes acceder al foro a través de tu cuenta facebook,
	cuenta de google o con la cuenta creada con anterioridad</p>
	<div class="separadores"><span class="separador1">CONECTAR CON:</span></div>
	<a onclick="javascript:facebookRegistroReto();"><img class="login-face" src="archivos/login-face.png" /></a>
	<img class="login-google" id="login-google" src="archivos/login-google.png" />
	<div class="separadores"><span class="separador2">O</span></div>
	<div id="hidden-data" style="display:none"></div>
	<form id="form-login" action="" method="">
	<p><span class="input-email">EMAIL</span><input type="text" id="email" name="email" /></p>
	<p><span class="input-email">CONTRASEÑA</span><input type="password" id="pass" name="pass" /></p>
	<img class="envio-reto" src="archivos/boton-ingresar.png" />
	<p class="alert-formulario">* Debes rellenar los campos necesarios</p>
	<p class="alert-error">* Email y/o contraseña erróneo</p>
	</form>
	<span class="registro1">¿No tienes cuenta?</span><span class="registro2" >¡Registrate!</span>
</div>
<div class="details2">
	<p class="titulo-registro">Crea tu cuenta en unos segundos</P>
	<p class="cuerpo-registro">Consigue tu propio perl, con el podrás publicar tus
		mensajes, desbloquear logros y elegir una foto para
		utilizar de avatar.</p>
	<div class="separadores"><span class="separador1">CONECTAR CON:</span></div>
	<a onclick="javascript:facebookNuevoReto();"><img class="login-face" src="archivos/login-face.png" /></a>
	<img class="login-google" id="registro-google" src="archivos/login-google.png" />
	<div class="separadores"><span class="separador2">O</span></div>
	<form id="form-registro" action="" method="">
	<p><span class="input-email">EMAIL</span><input type="text" id="email" class="email" name="email" /></p>
	<p><span class="input-email">CONTRASEÑA</span><input type="password" id="pass" class="pass" name="pass" /></p>
	<img class="envio-usuario" src="archivos/crearcuenta.png" />
	<p class="alert-formulario">* Debes rellenar los campos necesarios</p>
	<p class="alert-error">* El email introducido ya existe.</p>
	</form>
	
</div>
</div>

	<!-- Fin div_overlay -->
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
	<div id="over-foto">
		<div id="input-foto">
		<span class="texto-agregar">Cambiar Imagen</span>
		<input type="file" name="foto-perfil" class="input-agregar" />
		</div>
	</div>
	<div id="carpeta_superior">
		<p class="nombre">ChallengeMen</p>
	</div>
	<div id="repeat_carpeta">
		<p class="titulos-libreta">ACERCA DE MI</p>
		<img class="franja" src="archivos/franjaverde.png" />
		<p class="sobremi">
				<?php echo $_SESSION['sobremi'];?>
		</p>
		<p class="titulos-libreta">MEDALLAS</p>
		<img class="franja" src="archivos/franjaverde.png" />
	</div>
	<div id="pie_carpeta"></div>
	<img class="boton-consejos" src="archivos/botonconsejos.jpg" />
	
</div>
	<div id="right">
		<p class="titulo"><?php echo $_SESSION['titulo'];?></p>
		<img class="icono-donde" src="archivos/iconodonde.png" /><img class="icono-cuando" src="archivos/iconohora.png" /><img class="icono-fecha" src="archivos/iconocuando.png" />
		<div id="datos_perfil">
			<span class="donde"><?php echo $_SESSION['donde'];?></span><span class="cuando">22:00 / 00:00</span><span class="fecha-perfil"><?php echo $_SESSION['cuando'];?></span>
			<p class="titulo-tiempo">QUEDAN:</p><p class="tiempo-restante">0 DIAS Y 0 HORAS</p>
		</div>
		<div id="div_slider"><span class="conseguido">0</span><span class="euro1">€</span><span class="texto-conseguido"> CONSEGUIDOS</span><span class="cantidad"><?php echo $_SESSION['cantidad'];?></span><span class="euro2">€</span><span class="texto-cantidad"> NECESARIOS</span></div>
			<div id="progressbar" style="width:625px;height:8px;margin-top: 10px;"></div>
		<p class="mensaje">Escribe tu primer comentario</p>
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
			<p class="exito"><?php echo $_SESSION['objetivo'];?></p>
		</div>
		<div class="cajas">
			<span class="subtitulos2">Y si no lo consigo</span>
			<span class="fracaso"><?php echo $_SESSION['fracaso'];?></span>
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