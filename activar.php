<?php
	
	require 'includes/db.php';
	require 'funcs/funcs.php';
	
	if(isset($_GET["id"]) AND isset($_GET['val']))
	{
		
		$idUsuario = $_GET['id'];
		$token = $_GET['val'];
		
		$mensaje = validaIdToken($idUsuario, $token);	
	}
?>

<html>
	<title>Registro</title>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		
	</head>
	
	<body>
		<div class="container">
			<div class="jumbotron">
				
				<h1><?php echo $mensaje; ?></h1>
				
				<p><a class="btn btn-primary btn-lg" href="index2.php" role="button">Iniciar Sesi&oacute;n</a></p>
			</div>
		</div>
	</body>
</html>												