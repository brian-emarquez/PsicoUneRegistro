<?php
	
	require 'includes/db.php';
	require 'funcs/funcs.php';

	$errors=array();
	if(!empty($_POST))
	{
		$email = $mysqli->real_escape_string($_POST['email']);

		if(!isEmail($email))
		{
			$errors[] = "Debe ingresar un correo electronico valido";
		}

			if(emailExiste($email))
			{
				$user_id = getValor('id','email',$email);
				$nombre = getValor('username','email', $email);
				$usuario = getValor('users','email', $email); //mensaje el en correo

				$token = generaTokenPass($user_id);

				$url = 'http://'.$_SERVER["SERVER_NAME"].'/dashboard/proyectos/PsicoUneRegistro/cambia_pass.php?user_id='.$user_id.'&token='.$token;
							
				$asunto = 'Recuperar Password';
				$cuerpo = "Hola $usuario: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a, visita la siguiente  direcci&oacute;n: <a href='
				$url'>Cambiar Password</a>";

				if(enviarEmail($email, $nombre, $asunto, $cuerpo))
				{
					echo "Hemos enviado un correo electronico a la direccion $email para restablecer tu pasaword.<br/>";
					echo "<br><a href='index2.php'>Iniciar Sesion</a>";
					exit;
				}
				else{
					$errors[] = "Error al enviar Email";
				}
			}else{
				$errors[] = "No existe el correo electronico";

			}
		
	}
	
?>

<!--inicio-->
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/registroo.css">

<!--===============================================================================================-->
</head>
<!--fin-->

<html>
	<head>
		<title>Recuperar Contraseña</title>
		<div class="container-login200" style="background-image: url('images/sam1.jpg');" >
		<div class="wrap-login200 p-l-55 p-r-55 p-t-80 p-b" >
		<form class="login200-form validate-form" method="post" action="index2.php"></form>

	</head>
	
	<body>
		
		<div class="container">    
			<div id="loginbox" style="margin-top:20px" class="mainbox col-md-20 col-md-offset-3 col-sm-80 col-sm-offset-2">
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Recuperar Contraseña</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index2.php">Iniciar Sesi&oacute;n</a></div>
					</div>     
					
					<div style="padding-top:30px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="email" type="email" class="form-control" name="email" placeholder="email" required>                                        
							</div>
							
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Enviar</a>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										No tiene una cuenta! <a href="registro.php">Registrate aquí</a>
									</div>
								</div>
							</div>    
						</form>
						<?php echo resultBlock($errors); ?>
					</div>                     
				</div>  
			</div>
		</div>
		
<!-- Inicio -->

<div id="dropDownSelect1"></div>
	
	<!--===============================================================================================-->
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
		<script src="js/main.js"></script>
		
<!-- Fin -->

	</body>
</html>	