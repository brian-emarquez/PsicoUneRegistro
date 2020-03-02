<!-- a_people.php -->

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
                    <h3>AGREGAR PERSONA</h3>
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
                    <li  class="active">
                        <a href="a_people.php">
                            <i class="fa fa-plus"></i>
                           Agregar Persona

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
                    <li>
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
         
                
               <nav class="navbar navbar-default sammacmedia">
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
                                </i></a></li>
           
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="line"></div>
                                            <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $name = mysqli_real_escape_string($mysqli,$_POST['fname']);
                            $surname = mysqli_real_escape_string($mysqli,$_POST['surname']);
                            $email = mysqli_real_escape_string($mysqli,$_POST['email']);
                            $phon = mysqli_real_escape_string($mysqli,$_POST['phone']); 
                            $gender = mysqli_real_escape_string($mysqli,$_POST['gender']);  
                            $dni = mysqli_real_escape_string($mysqli,$_POST['dni']);
                            $edad = mysqli_real_escape_string($mysqli,$_POST['edad']);
                            $cursos = mysqli_real_escape_string($mysqli,$_POST['cursos']);
                            $pais = mysqli_real_escape_string($mysqli,$_POST['pais']);
                            $ciudad = mysqli_real_escape_string($mysqli,$_POST['ciudad']);                                                       
                            $joined = date(" d M Y ");
                            $employee_id = rand(9999999,1000000);    
                            $tmp = rand(1,9999);
                            $phone = '54'.$phon;   
                            $file = $_FILES['file'];
                            $fileName =$file['name'];
                            $fileTmpName = $file['tmp_name'];
                            $fileSize = $file['size'];
                            $fileError = $file['error'];
                            $fileType = $file['type'];
                            $fileExt = explode('.', $fileName);
                            $fileActualExt = strtolower(end($fileExt));
                            $allowed = array('jpg','jpeg','png');
                            $year = date("Y");
    

                            $sql_n = "SELECT * FROM people WHERE phone ='$phone'";
                            $res_n = mysqli_query($mysqli, $sql_n);    
                            $sql_e = "SELECT * FROM people WHERE email ='$email'";
                            $res_e = mysqli_query($mysqli, $sql_e);
                            if(mysqli_num_rows($res_e) > 0){
                            ?>
                             <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Error! </strong><?php echo'Lo siento el correo electrónico ya está asignado a alguien';?></div>
                        <?php    
                       }elseif(mysqli_num_rows($res_n) > 0){
                        ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Error! </strong><?php echo'Lo siento, el celular ya está asignado a alguien';?></div>
                        <?php    
                        }
                    else{      
                  
                $sql = "INSERT INTO people(name,surname,email,joined,gender,phone,tmp,people_id,dni,edad,cursos,pais,ciudad,year)VALUES('$name','$surname','$email','$joined','$gender','$phone','$tmp','$employee_id','$dni','$edad','$cursos','$pais','$ciudad','$year')";
                $results = mysqli_query($mysqli,$sql);
                if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                if($fileSize < 1000000){
                $fileNameNew = "user".$tmp.".".$fileActualExt;
                $fileDestination ='assets/image/uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sqli = "INSERT INTO picture(name,tmp)VALUES('$fileNameNew','$tmp')";
                mysqli_query($mysqli,$sqli);
                //header('Location:acc.php');
                    }
                        }
                            }
                        
                        
                        if($results==1){
                              ?>
                        <div class="alert alert-success strover animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Exitosamente! </strong><?php echo'Registro agregado correctamente';?></div>
                        <?php

                          }else{
                                ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Error! </strong><?php echo'OOPS Algo salio mal';?></div>
            
                        <?php    
                          }      
                 }
            }
                
                ?>
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading"> Agregar nueva persona
       </div>

        <div class="panel-body">
        <form method="post" action="a_people.php" enctype="multipart/form-data">
         <div class="row form-group">
          <div class="col-lg-6">
            <label>Nombres</label>
              <input type="text" class="form-control" name="fname" required>
            </div>  
             <div class="col-lg-6">
            <label>Apellidos</label>
              <input type="text" class="form-control" name="surname" required>
            </div>  
        </div>

        <div class="row form-group">
          <div class="col-lg-6">
            <label>Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>  
             <div class="col-lg-6">
            <label>Celular</label>
              <input type="text" class="form-control" name="phone" required>
            </div>  
        </div>   

         <div class="row form-group">
          <div class="col-lg-6">
            <label>Imagen</label>
             <input type="file" class="form-control" name="file" required>
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
            <label>DNI</label>
            <input type="text" class="form-control" name="dni" required>
            </div> 
            <div class="col-lg-6">
            <label>Edad</label>
            <input type="text" class="form-control" name="edad" required>
            </div> 
        </div>

        <div class="row form-group">
            <div class="col-lg-6">
            <label>Cursos</label>
            <input type="text" class="form-control" name="cursos" required>
            </div> 
            <div class="col-lg-6">
            <label>Pais</label>
            <input type="text" class="form-control" name="pais" required>
            </div> 
        </div>

        <div class="row form-group">
            <div class="col-lg-6">
            <label>Ciudad</label>
            <input type="text" class="form-control" name="ciudad" required>
            </div> 
          
        </div>
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
                <div class="line"></div>
                 <footer>
                <p class="text-center"> Psicoune &copy;<?php echo date("Y ");?> <i class="fa fa-map-marker " aria-hidden="true"></i> - CALLE FRANCISCO MOSTAJO 204  - YANAHUARA, Arequipa - Perú </p>
                <p class="text-center"> <i class="fa fa-phone" aria-hidden="true">  (054) +51 958 336 625 - 950 319 245 </i> <i class="fa fa-envelope " aria-hidden="true"></i> cursospsicoune@gmail.com </p>
                </footer>
            </div>
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
