<?php
	
	require 'includes/db.php';
	require 'funcs/funcs.php';
	
	$errors = array();
	
	if(!empty($_POST))
	{
		$nombre = $mysqli->real_escape_string($_POST['username']);	
		$usuario = $mysqli->real_escape_string($_POST['users']);
		$surname = $mysqli->real_escape_string($_POST['surname']);	
		$password = $mysqli->real_escape_string($_POST['password']);
		$con_password = $mysqli->real_escape_string($_POST['con_password']);	
		$email = $mysqli->real_escape_string($_POST['email']);	
		$captcha = $mysqli->real_escape_string($_POST['g-recaptcha-response']);
		$joined = date(" d M Y ");
		$activo = 0;
		$permission = 3;
		$type = 'user';
		$year = date("Y");
		$secret = '6LcFq8UUAAAAAIkExRMo6d3rPAUqk7NTDMN1S-uo';
		
		if(!$captcha){
			$errors[] = "Por favor verifica el captcha";
		}
		
		if(isNull($nombre, $usuario, $password, $con_password, $email))
		{
			$errors[] = "Debe llenar todos los campos";
		}
		
		if(!isEmail($email))
		{
			$errors[] = "Dirección de correo inválida";
		}
		
		if(!validaPassword($password, $con_password))
		{
			$errors[] = "Las contraseñas no coinciden";
		}
		
		if(usuarioExiste($usuario))
		{
			$errors[] = "El nombre de usuario $usuario ya existe";
		}
		
		if(emailExiste($email))
		{
			$errors[] = "El correo electronico $email ya existe";
		}
		
		if(count($errors) == 0)
		{
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
			
			$arr = json_decode($response, TRUE);
			
			if($arr['success'])
			{
				
				//$pass_hash = hashPassword($password);
				$pass_hash = $password;
				$token = generateToken();
				
				$registro = registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $surname, $permission, $type, $joined, $year);

				
				if($registro >= 0 )
				{
					
						$url = 'http://'.$_SERVER["SERVER_NAME"].'/dashboard/proyectos/PsicoUneRegistro/activar.php?id='.$registro.'&val='.$token;
								
						$asunto = 'Activar Cuenta ';
						$cuerpo = "Estimado $usuario: <br /><br />Para continuar con el proceso de registro, es indispensable de click en la siguiente Link 
						<a href='$url'>Activar Cuenta</a>";
					
				

						if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
						
						echo "Para terminar el proceso de registro siga las instrucciones que le hemos enviado la direccion de correo electronico: $email";
						echo "<br><a href='index2.php'>Iniciar Sesion</a>";
						exit;
						
						} else {
							$erros[] = "Error al enviar Email";
						}
					
					} else {
					$errors[] = "Error al Registrar";
					}
				
				} else {
				$errors[] = 'Error al comprobar Captcha';
			}
			
		}
		
	}
	
?>

<!-- Inicio -->
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
	<link rel="stylesheet" type="text/css" href="css/registroo.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
<!--===============================================================================================-->
</head>
<!-- Fin -->


<html>
	<head>
		<title>Registro</title>

		<div class="container-login200" style="background-image: url('images/sam1.jpg');" >
		<div class="wrap-login200 p-l-55 p-r-55 p-t-80 p-b" >
		<form class="login200-form validate-form" method="post" action="index2.php"></form>

		<script src='https://www.google.com/recaptcha/api.js'></script>
		
	</head>
	
	<body>
		<div class="container">
			<div id="signupbox" style="margin-top:20px" class="mainbox col-md-20 col-md-offset-3 col-sm-80 col-sm-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						
						
						<div class="panel-title">Reg&iacute;strate
					
					
					   </div>
						<p><hr width=100%  align="center" size=20><p>
						<div style="float:right; font-size: 85%; position: relative; top:-50px"><a id="signinlink" href="index2.php">Iniciar Sesi&oacute;n</a></div>
					</div>  
					<div class="panel-body" >
						

							
						<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							
							<div class="form-group">
								<label for="nombre" class="col-md-3 control-label">Nombres:</label>
								<div class="col-md-10">
								<input type="text" class="form-control" name="users" placeholder="Usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
								
								</div>
							</div>

							<div class="form-group">
								<label for="nombre" class="col-md-3 control-label">Apellidos:</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="surname" placeholder="Apellidos" value="<?php if(isset($surname)) echo $surname; ?>" required >
								</div>
							</div> 
							
							<div class="form-group">
								<label for="usuario" class="col-md-10 control-label">Nombre de Usuario</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="username" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >

								</div>
							</div>
							
							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Password</label>
								<div class="col-md-10">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="con_password" class="col-md-10 control-label">Confirmar Password</label>
								<div class="col-md-10">
									<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="email" class="col-md-3 control-label">Email</label>
								<div class="col-md-10">
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" required>
								</div>
							</div>

							
							<div class="form-group">
								<label for="captcha" class="col-md-3 control-label"></label>
								<div class="g-recaptcha col-md-9" data-sitekey="6LcFq8UUAAAAAFgSICeJIIYHFFu_NWO8kVmH20WD"></div>
							</div>
							
							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Registrar</button> 
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