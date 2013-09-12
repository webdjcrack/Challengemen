<?php session_start(); 
	$reto = false;	
	if(isset($_SESSION['reto'])){
		$reto = true;
		
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
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/estilos.css" />
<link rel="stylesheet" type="text/css" href="css/registro_next.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.2.custom.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	  $( "#slider-range-min" ).slider({
      range: "min",
      value: 200,
      min: 50,
      max: 1000,
      slide: function( event, ui ) {
        $("#input-cantidad").val( ui.value );
      }
    });
    $("#input-cantidad").val($( "#slider-range-min" ).slider( "value" ) );
  $("#fecha").mask("99/99/9999");
 var images =  $("#tipo-reto img");
 <?php if($reto == true) { ?>
 $("#tipo-reto").remove();
 $("#input-tipo").attr("value","<?php echo $_SESSION['reto'];?>");
 /*$.each(images,function(){
		var current = $(this);
		var name = current.attr("name");
		current.attr("src","archivos/"+name+"2.jpg");
	})
	$("#tipo-reto img[name='<?php echo $_SESSION['reto'];?>']").attr("src","archivos/<?php echo $_SESSION['reto'];?>1.jpg");*/
 <?php }else{ ?>
 $("#tipo-reto img").click(function(){
	$.each(images,function(){
		var current = $(this);
		var name = current.attr("name");
		current.attr("src","archivos/"+name+"1.jpg");
	})
	 $("#tipo-reto img").attr("rel","");
	 $(this).attr("rel","current");
		$.each(images,function(){
		var current = $(this);
			if(current.attr("rel") != "current"){
				var name = current.attr("name");
				current.attr("src","archivos/"+name+"2.jpg");
			}else{
				var value = current.attr("name");
				$("#input-tipo").attr("value",value);
			}
		});
		
 })
<?php } ?> 
		$("#empezar").click(function(){
			if($("#objetivo").val() == "") {
				$("#objetivo").css("border","1px inset red");
				$('#alert').fadeIn();
			}else if ($("#donde").val()  == "") {
				$("#donde").css("border","1px inset red");
				$('#alert').fadeIn();
			}else if ($("#fecha").val()  == "" || !(/^(0[1-9]|[12]\d|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/.test($("#fecha").val()))) {
				$("#fecha").css("border","1px inset red");
				$('#alert').fadeIn();
			}else if ($("#hora").val()  == "" || !(/^(0[1-9]|1\d|2[0-3]):([0-5]\d)$/.test($("#hora").val()))) {
				$("#hora").css("border","1px inset red");
				$('#alert').fadeIn();
			}else if ($("#no-objetivo").val()  == "") {
				$("#no-objetivo").css("border","1px inset red");
				$('#alert').fadeIn();
			}else{
					$.ajax({
					type: "POST",
					url: "session.php",
					data: $("#formulario").serialize(),
					success: function(data) {
						if(data == 1)
							document.location.href='preview.php';
						else 
							alert(data);
						}
					})
			}	
		 })
		 $("input,textarea").focus(function() {
			$(this).css("border","1px inset");
			$('#alert').fadeOut();
		});
});		
</script>
</head>
<body>
<div id="fondo-cabecera2"></div>
<div class="despliegue1"></div>
<div class="despliegue2"></div>
<div class="despliegue3"></div>
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
		<img class="logo" src="archivos/textomision.png" />
		
		<img class="cabecera" src="archivos/cabecera2.jpg" />
	
</div>
<div id="reto">
<form action="" method="" id="formulario">
	<img class="sombra" src="archivos/sombragris.jpg" />
	<img class="pasos" src="archivos/pasos2.jpg" />
	<p class="titulo-reto"><?php echo $_SESSION['titulo']; ?></p>
	<p class="titulo-url">www.challengemen.com/<span class="directorio-url"><?php echo $_SESSION['titulo']; ?></span></p>
	
</div>

	<p class="titulo-despliegue1">HAZ TU RETO TAN INCREÍBLE COMO QUIERAS</p>

<div class="open">
<div id="tipo-reto">
	<span class="tipo-challenge">Tipo de reto:</span>
	<img class="boton-reto" src="archivos/deportivo1.jpg" name="deportivo" rel="" />
	<img class="boton-reto" src="archivos/original1.jpg" name="original" rel="" />
	<img class="boton-reto" src="archivos/ocio1.jpg" name="ocio" rel=""/>	
</div>
<input type="hidden" name="tipo-reto" id="input-tipo" value="" />
	<img class="aclara1" src="archivos/aclara1.jpg" />
	<div class="challenge1">
	<span class="desc-challenge">Describe tu Challenge:</span><span class="desc-campos2">(max. 150 caracteres)</span>
	<textarea  class="text-challenge" id="objetivo" name="objetivo"></textarea>
	</div>
	<div class="donde">
	<span class="desc-donde">¿DÓNDE?</span>
	<input type="text" id="donde"  class="text-donde" name="donde"/>
	</div>
	<div class="cuando">
	<span class="desc-donde">¿CUÁNDO? <span class="fecha-hora">(FECHA Y HORA formato 00:00)</span></span>
	<input type="text" id="fecha" class="text-cuando" name="cuando"/><input type="text"  class="text-cuando" id="hora" name="hora"/>
	</div>
</div>

	<p class="titulo-despliegue2">TÚ PONES LOS LÍMITES</p>

<div class="open">
<div class="cantidad">
	<img class="aclara2" src="archivos/aclara2.jpg" />
	<p style="height:87px;">
		<span class="desc-challenge">Márcate un objetivo solidario:</span><span class="desc-campos2"> (Elige o personaliza una cantidad)</span>
	</p>
 
	<div id="slider-range-min"></div><div id="input"><input type="text" id="input-cantidad" name="cantidad" /><span class="euro">€</span></div>
</div>
<div class="fracaso">
	<span class="desc-challenge">¿Y si no llego a mi objetivo solidario?</span>
	<textarea  class="text-challenge2" id="no-objetivo" name="no-objetivo"></textarea>
</div>
</div>

	<p class="titulo-despliegue3">¿QUIÉN HAY DETRÁS DE LA MÁSCARA?</p>

<div class="open_final">
	<img class="aclara3" src="archivos/aclara3.jpg" />
	<div class="challenge2">
	<span class="desc-challenge">Habla un poco de ti:</span><span class="desc-campos2"> (Opcional)</span>
	<textarea  class="text-challenge2" id="sobremi" name="sobremi"></textarea>
	</div>
	<img id="empezar" src="archivos/botonactivareto.jpg" /> 
	<p id="alert">* Debes rellenar los campos necesarios</p>
</form>
</div>
</div>
<div id="footer"></div>
</body>
</html>