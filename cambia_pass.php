<?php
	
	require 'includes/db.php';
	require 'funcs/funcs.php';
	
	if(empty($_GET['user_id'])){
		header('Location: index2.php');
	}
	
	if(empty($_GET['token'])){
		header('Location: index2.php');
	}
	
	$user_id = $mysqli->real_escape_string($_GET['user_id']);
	$token = $mysqli->real_escape_string($_GET['token']);
	
	if(!verificaTokenPass($user_id, $token))
	{
echo 'No se pudo verificar los Datos';
exit;
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
		<title>Cambiar Password</title>
		
		<div class="container-login200" style="background-image: url('images/sam2.jpg');" >
		<div class="wrap-login200 p-l-55 p-r-55 p-t-80 p-b" >
		<form class="login200-form validate-form" method="post" action="index2.php"></form>
		
	</head>
	
	<body>
		
		<div class="container">    
		<div id="loginbox" style="margin-top:20px" class="mainbox col-md-20 col-md-offset-3 col-sm-80 col-sm-offset-2">
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Cambiar Password</div>
				<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index2.php">Iniciar Sesi&oacute;n</a></div>
			</div>     
			
			<div style="padding-top:30px" class="panel-body" >
				
				<form id="loginform" class="form-horizontal" role="form" action="guarda_pass.php" method="POST" autocomplete="off">
					
					<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />
					
					<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />
					
					<div class="form-group">
						<label for="password" class="col-md-10 control-label">Nuevo Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="con_password" class="col-md-10 control-label">Confirmar Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
						</div>
					</div>
					
					<div style="margin-top:10px" class="form-group">
						<div class="col-sm-12 controls">
							<button id="btn-login" type="submit" class="btn btn-success">Modificar</a>
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