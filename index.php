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
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script src="js/facebooklogin.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript">
  (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
$(document).ready(function(){
	$(document).scroll(function(){
				var position = $(".empezar").position();
				var position2 = $(document).scrollTop();
				//alert(position.top);
				//alert(position2);


				 if(position.top > 1260){ //POSICIÓN INFERIOR
						$("#empezar").fadeOut();
						$(".empezar,.empezar-empresas").css("position","relative");
				}
				if(position2 < 480){
						$("#empezar").fadeIn();
						$(".empezar,.empezar-empresas").css("position","fixed");
				}
		})	
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
							url: "controlador/loginfacebook.php",
							data:  { name: resp.displayName, email: correo },
							success: function(data) {	
								if(data == 1){
									location.reload(true);
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
						url: "controlador/Registrofacebook.php",
						data:  {  name: resp.displayName, email: correo },
						success: function(data) {	
							if(data == 1){
								location.reload(true);
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
})
</script>
</head>
<body>
<div id="fondo-cabecera">
</div>
<div id="content">
<div class="overlay-popup" id="popup">
	<div class="details">
		<p class="titulo-login">¡HOLA DE NUEVO!</P>
		<p class="cuerpo-login">Puedes acceder al foro a través de tu cuenta facebook,
		cuenta de google o con la cuenta creada con anterioridad</p>
		<div class="separadores"><span class="separador1">CONECTAR CON:</span></div>
		<a onclick="javascript:facebookLogin();"><img class="login-face" src="archivos/login-face.png" /></a>
		<a><img class="login-google" id="login-google" src="archivos/login-google.png" /></a>
		<div id="hidden-data" style="display:none"></div>
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
	<a onclick="javascript:facebookRegistro();"><img class="login-face" src="archivos/login-face.png" /></a>
	<a><img class="login-google" id="registro-google" src="archivos/login-google.png" /></a>
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

<img class="barra-verde" src="archivos/menuverde-iconos.png" />
<div id="menu">
	<div id="contenido-menu">
		<?php echo $login; ?>
	</div>
		<img class="menu" src="archivos/menu.png" />
</div>
<div id="cabecera">
		<img class="logo" src="archivos/logo-copy.png" />
		<img class="cabecera" src="archivos/cabecera.png" />
		<div id="iconos">
			<div class="icono_cabecera1">
				<img class="icono1" src="archivos/iconohome1.png" />
				<p class="titulo_cabecera">PONTE UN SUPER RETO</P> 
				<p class="subtitulo_cabecera">Correr una maratón disfrazado, organizar una "Oktoberfest"...¡Tú decides!</P>
			</div>
			<div class="icono_cabecera2">
				<img class="icono2" src="archivos/iconohome2.png" />
				<p class="titulo_cabecera2">MÁRCATE UN OBJETIVO SOLIDARIO</P>
				<p class="subtitulo_cabecera2">Ponte una cifra de donaciones a conseguir.</P>
			</div>
			<div class="icono_cabecera3">
				<img class="icono3" src="archivos/iconohome3.png" />
				<p class="titulo_cabecera">PRESÉNTATE AL MUNDO</P>
				<p class="subtitulo_cabecera">Crea la web de tu propio reto en 3 minutos.</P>
			</div>
			<div class="icono_cabecera4">
				<img class="icono4" src="archivos/iconohome4.png" />
				<p class="titulo_cabecera">SUMA ALIADOS A TU CAUSA</P>
				<p class="subtitulo_cabecera">Publica tu Challenge web, compártela y suma donaciones.</P>
			</div>
		</div>
</div>
<div id="slider">
		<p class="titulo_slider">CREA TU RETO EN TRES PASOS</p>
		<img class="prev" src="archivos/prev.png" />
		<img class="pasos" src="archivos/pasos1.jpg" />
		<img class="next" src="archivos/next.png" />
		<div id="content-slider">
			<div class="divs-slider"  name="current" rel="first">
			<img class="img-slider" src="archivos/paso1.png" />
			<div class="texto-slider">
					<p class="titulo-slider">Para ser un superhéroe necesitas una misión.</p>
					<p class="subtitulo-slider">Escribe tu Challenge o elige la que más te guste:</p>
					<p class="cuerpo-slider"><span class="destacado-slider">Deportivo:</span> Maratón disfrazado. Cruzar un país en "handbike". 100KM en tándem...</p>
					<p class="cuerpo-slider"><span class="destacado-slider">Ocio:</span> Paella gigante. Concierto en un pueblo fantasma. "Oktoberfest" en verano...</p>
					<p class="cuerpo-slider"><span class="destacado-slider">Original:</span> Batalla de globos. Teñirse el pelo azul Fenexy.  Nadar con tiburones...</p>	
			</div>
			</div>
			<div class="divs-slider" name="">
			<img class="img-slider" src="archivos/paso2.png" />
			<div class="texto-slider">
					<p class="titulo-slider">Crea tu Challenge Web.</p>
					<p class="subtitulo-slider">Completa el formulario y se generará automáticamente la web de tu reto.</p>
					<p class="cuerpo-slider"><span class="destacado-slider">Define tu reto</span> ¿Qué, dónde, cuándo?</p>
					<p class="cuerpo-slider"><span class="destacado-slider">Fija un objetivo solidario.</span> ¿Cuándo dinero quieres recaudar?</p>
					<p class="cuerpo-slider"><span class="destacado-slider">Activa tu web.</span> Sólo con tu nombre, ciudad y correo electrónico</p>	
			</div>
			</div>
			<div class="divs-slider" name="" rel="">
			<img class="img-slider" src="archivos/paso3.png" />
			<div class="texto-slider">
					<p class="titulo-slider">Si conocen tu causa ¡triunfarás!</p>
					<p class="subtitulo-slider">Comparte el link de tu web y suma donaciones hasta conseguir tu objetivo.</p>
					<p class="cuerpo-slider">Publica el link en tus <span class="destacado-slider">redes sociales.</span> </p>
					<p class="cuerpo-slider">Añade el link en tu web, <span class="destacado-slider">blog o fotos</span> donde participes.</p>
					<p class="cuerpo-slider">Envía <span class="destacado-slider">emails</span> a tus amigos.</p>	
			</div>			
			</div>
			<div class="divs-slider" name="" rel="last">
			<img class="img-slider" src="archivos/paso4.png" />
			<div class="texto-slider">
					<p class="titulo-slider">1€ conseguido = 1€ para la investigación.</p>
					<p class="subtitulo-slider">El 100% de las donaciones que consigas desde la web de tu reto se destinan a una investigación para la curación de las lesiones medulares.</p>
					<p class="cuerpo-slider">Las donaciones se realizan automáticamente desde la <span class="destacado-slider">pasarela bancaria de "La Caixa"</span> </p>
					<p class="cuerpo-slider"><span class="destacado-slider">Sigue al momento la evolución de las donaciones</span> desde tu web.</p>
						
			</div>			
			</div>
		</div>
	<div id="contador-slider">
		<span class="numero-slider" rel="current"></span>
		<span class="numero-slider" rel=""></span>
		<span class="numero-slider" rel=""></span>
		<span class="numero-slider" rel=""></span>
	</div>
</div>
<!--<div id="reto-amigo">
		<span class="titulo-amigo">¿NO TE ATREVES A SER UN CHALLENGE MEN?</span><span class="titulo-amigo2">¡RETA A UN AMIGO!</span>
		<p class="subtitulo-amigo1">Sacarse el carnet de conducir, acabar una maratón...</p>
		<p class="subtitulo-amigo2">Teñirse el pelo de azul Fenexy, donar sangre disfrazado de vampiro...</p>
</div>-->
<div id="banner">
	<p class="subtitulo-banner1"><span class="resalte-url">Fundación Fenexy</span> y <span class="resalte-url">Proyecto Lazarus</span> hemos iniciado el proceso de creación de un tratamiento<br/> definitivo para curar la lesión medular.
	Descubre más en <span class="resalte-url">www.fenexy.org y en www.proyectolazarus.com.</span></p>
	<img class="banner-home" src="archivos/bannerhome2.jpg" />
</div>
<a href="registro.php"><img class="empezar" src="archivos/empezar-ahora.png" /></a>
<a href="empresas.php"><img class="empezar-empresas" src="archivos/reto-empresas.png" /></a>
</div>
 <button id="authorize-button" style="visibility: hidden">Authorize</button>
<div id="footer"></div>	
<div id="empezar">
</div>
</body>
</html>