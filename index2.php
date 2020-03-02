
<?php require_once('includes/db.php');
//vercion 2

if(isset($mysqli,$_POST['submit'])){
	$username = mysqli_real_escape_string($mysqli,$_POST['username']);
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
	//$password=md5($password);
	$password=$password;
	//print_r($password);exit; // muentra el contraseña enviada

	$query1=mysqli_query($mysqli,"SELECT username, surname, password, type, users, permission FROM usersrpo");

	while($row=mysqli_fetch_array($query1))
	{
        $db_name=$row["users"];
		$db_surname=$row["surname"];
		$db_username=$row["username"];
		$db_password=$row["password"];
		$db_type=$row["type"];
        $db_per=$row["permission"];
		
		if($username==$db_username && $password==$db_password){
			session_start();
			$_SESSION["username"]=$db_username;
			$_SESSION["type"]=$db_type;
            $_SESSION["permission"]=$db_per;
            $_SESSION["users"]=$db_name;
			$_SESSION["surname"]=$db_surname;
			
			if($_SESSION["type"]=='user'){
			header("Location:admin/dashboard.php");
			}			
		}

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> INICIO SESION | RPO</title>
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
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="container-login100" style="background-image: url('images/sam1.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" method="post" action="index2.php">
					
				<center><div style="float:center; font-size: 80%; position: relative; top:-10px"><a href="index.html"> Pantalla Principal</a></div><center>
				<br>
				<center><div style="float:center; font-size: 80%; position: relative; top:-10px"><a href="recupera.php">¿Se te olvid&oacute; tu contraseña?</a></div><center>
				<span class="login100-form-title p-b-37">
					REGISTRO
				</span>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username ">
					<input class="input100" type="text" name="username" placeholder="Usuario">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password" placeholder="Contraseña">
					<span class="focus-input100"></span>
				</div>

				<!--olvido contraseña-->
				<div class="form-group">
						<div class="col-md-12 control">
							<div style="border-top: 1px ; padding-top:15px; font-size:85%" >
								No tiene una cuenta! <a href="registro.php">Registrate aquí</a>
							</div>
						</div>
				</div>    
				<!--olvido contraseña-->
				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="submit">
						INGRESAR
					</button>
				</div>
			</form>
		</div>
	</div>
	
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

</body>
</html>