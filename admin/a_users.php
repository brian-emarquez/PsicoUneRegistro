<!-- a_users.php -->

<?php require_once('includes/session.php');
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Agregar Persona</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar" class="sammacmedia">
                <div class="sidebar-header">
                    <h3>AÑADIR USUARIO</h3>
                    <strong>RPO</strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="dashboard.php">
                            <i class="fa fa-th"></i>
                            Panel de Control
                        </a>
                    </li>
                    <?php
                    if($_SESSION['permission']==1 or $_SESSION['permission']==2 ){
                        
                    
                    ?>
                    <li>
                        <a href="a_people.php">
                            <i class="fa fa-plus"></i>
                           Agregar Personas

                        </a>
                      
                    </li>
                    <?php }?>
                    <li>
                        <a href="all_people.php">
                            <i class="fa fa-table"></i>
                          Listado de Personas

                        </a>
                    </li>
                    <li>
                        <a href="invest.php">
                            <i class="fa fa-link"></i>
                            Informe de Problemas

                        </a>
                    </li>
                              <?php
                    if($_SESSION['permission']==1 or $_SESSION['permission']==2 ){
                        
                    
                    ?>
                    <li>
                        <a href="v_issue.php">
                            <i class="fa fa-table"></i>
                            Ver Problemas

                        </a>
                    </li>
                    <?php }?>
                             <?php

                    if($_SESSION['permission']==1 or $_SESSION['permission']==2 ){
                                                                
                                                            
                        ?>
                        <li>
                            <a href="maps.php">
                            <i class="fa fa-map-marker"></i>
                             Geolocalizacion

                            </a>
                        </li>
                        <?php }?>
                                <?php

                    if($_SESSION['permission']==1 or $_SESSION['permission']==2 ){
                                                                                                        
                                                                                                    
                        ?>
                        <li>
                            <a href="chart.php">
                            <i class="fa fa-dashboard"></i>
                            Monitor de Eventos

                            </a>
                        </li>
                        <?php }?>
                                <?php

                    if($_SESSION['permission']==1 or $_SESSION['permission']==2 ){
                        
                    
                    ?>
                    <li class="active">
                        <a href="a_users.php">
                            <i class="fa fa-user"></i>
                           Añadir Usuarios

                        </a>
                    </li>
                    <li>
                        <a href="v_users.php">
                            <i class="fa fa-table"></i>
                            Ver Usuarios

                        </a>
                    </li>
                    <?php }?>
                    <li>
                        <a href="settings.php">
                            <i class="fa fa-cog"></i>
                            Ajustes
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">
             
            <div clas="col-md-12">
                <!--<img src="assets/image/ssm.jpg" class="img-thumbnail">-->
                </div>
         
                
                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header" id="sams">
                            <button type="button" id="sidebarCollapse" id="makota" class="btn btn-sam animated tada navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>FLEX</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right  makotasamuel">
                                <li><a href="#"><?php require_once('includes/name.php');?></a></li>
                                <li ><a href="logout.php"><i class="fa fa-power-off"> Cerrar sesión</i></a></li>
           
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="line"></div>
                                            <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $name = mysqli_real_escape_string($mysqli,$_POST['users']);
                            $surname = mysqli_real_escape_string($mysqli,$_POST['surname']);
                            $email = mysqli_real_escape_string($mysqli,$_POST['email']);
                            $phone = mysqli_real_escape_string($mysqli,$_POST['phone']); 
                            $username = mysqli_real_escape_string($mysqli,$_POST['username']); 
                            $password = mysqli_real_escape_string($mysqli,$_POST['password']);
                            $cpassword = mysqli_real_escape_string($mysqli,$_POST['cpassword']);     
                            $permission = mysqli_real_escape_string($mysqli,$_POST['permission']); 
                            $gender = mysqli_real_escape_string($mysqli,$_POST['gender']);    
                            $joined = date(" d M Y ");
                            $token=md5("token");
                            $activacion = 1;
                           
                            if($password != $cpassword){
                               //echo 'Inbrese la contraseña de manera correcta';
                               ?>
                               <div class="alert alert-danger samuel animated shake" id="sams1">
                               <a href="#" class="close" data-dismiss="alert">&times;</a>
                               <strong> Error! </strong><?php echo'La Contrasela no Coinciden';?></div>
                               <?php
                            }
                            
                             else{ 
                              //$password=md5($cpassword);
                              $password=$cpassword;
                              $sql_n = "SELECT * FROM usersrpo WHERE phone ='$phone'";
                              $res_n = mysqli_query($mysqli, $sql_n);    
                              $sql_e = "SELECT * FROM usersrpo WHERE email ='$email'";
                              $res_e = mysqli_query($mysqli, $sql_e);
                              if(mysqli_num_rows($res_e) > 0){
                            ?>
                            <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Advertencia! </strong></div>
                        <?php    
                       }elseif(mysqli_num_rows($res_n) > 0){
                        ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <?php    
                       }
                    else{      
                  
                $sql = "INSERT INTO usersrpo(users,surname,password,username,email,phone,permission,gender,joined,type,token,activacion) VALUES('$name','$surname','$password','$username','$email','$phone','$permission','$gender','$joined','user','$token','$activacion')";
                $results = mysqli_query($mysqli,$sql);
                        
                        
                        
                        if($results==1){
                              ?>
                        <div class="alert alert-success strover animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Exitosamente! </strong><?php echo'Gracias por crear una cuenta';?></div>
                        <?php

                          }else
                          {
                            ?>
                         <div id="sams1" class="sufee-alert alert with-close alert-danger alert-dismissible fade show col-lg-12">
											<span class="badge badge-pill badge-danger">Error</span>
											OOPS Algo salio mal
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
                        <?php        
                          }      
                      }
                 }
            }
                
                ?>
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading"> Añadir Usuarios</div>
        <div class="panel-body">
            <form method="post" action="a_users.php">
        <div class="row form-group">
          <div class="col-lg-6">
            <label>Nombre</label>
              <input type="text" class="form-control" name="users" required>
            </div>  
            <div class="col-lg-6">
            <label>Apellido</label>
              <input type="text" class="form-control" name="surname"  required>
            </div>  
        </div>
        
        
            <div class="row form-group">
          <div class="col-lg-6">
            <label>Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>  
             
             <div class="col-lg-6">
            <label>Celular</label>
              <input type="text" class="form-control" name="phone"  required>
            </div>  
        </div>  

         <div class="row form-group">
          <div class="col-lg-6">
            <label>Nivel de acceso</label>
              <select class="form-control" name="permission">
              <option>1</option>
              <option>2</option> 
             <option>3</option> 
             </select>
             </div>  
             <div class="col-lg-6">
            <label>Género</label>
             <select class="form-control" name="gender">
              <option>F</option>
              <option>M</option>      
              </select>
            </div>  
        </div>
         <div class="row form-group">
          <div class="col-lg-6">
            <label>Nombre de usuario</label>
              <input type="text" class="form-control" name="username" >
            </div> 
             <div class="col-lg-6">
            <label>Contraseña</label>
              <input type="password" class="form-control" name="password">
            </div> 
              <div class="col-lg-6">
            <label>Confirmar contraseña</label>
              <input type="password" class="form-control" name="cpassword">
            </div> 
        </div> 
                <div class="row">
             <div class="row">
                <div class="col-md-6">
                  <button type="submit" name="submit" class="btn btn-suc btn-block"><span class="fa fa-plus"></span> Agregar</button>  
                </div>
                     <div class="col-md-6">
                  <button type="reset" class="btn btn-dan btn-block"><span class="fa fa-times"></span> Cancelar</button>  
                </div>
                </div>
            </form>

            </div>
                </div>
       
            </div>
            <div class="line"></div>
            <footer>
                <p class="text-center"> Psicoune &copy;<?php echo date("Y ");?> <i class="fa fa-map-marker " aria-hidden="true"></i> - CALLE FRANCISCO MOSTAJO 204  - YANAHUARA, Arequipa - Perú </p>
                <p class="text-center"> <i class="fa fa-phone" aria-hidden="true">  (054) +51 958 336 625 - 950 319 245 </i> <i class="fa fa-envelope " aria-hidden="true"></i> cursospsicoune@gmail.com </p>
            </footer>

<!--flex derecho-->
  
<!--flex derecho-->
            
        </div>

        <!-- jQuery CDN -->
         <script src="assets/js/jquery-1.10.2.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="assets/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
             $('sams').on('click', function(){
                 $('makota').addClass('animated tada');
             });
         </script>
         <script type="text/javascript">

        $(document).ready(function () {
 
            window.setTimeout(function() {
        $("#sams1").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
        });
            }, 5000);
 
        });
    </script>
    </body>
</html>
