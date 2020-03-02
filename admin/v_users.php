<!-- v_users.php -->

<?php require_once('includes/session.php');
      require_once('includes/conn.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Ver Usuarios</title>

         <!-- Bootstrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">
         <link rel="stylesheet" href="vendors/datatables/datatables.min.css">
    </head>
    <body>



        <div class="wrapper">
          
            <nav id="sidebar" class="sammacmedia">
                <div class="sidebar-header">
                    <h3>VER USUARIOS</h3>
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
                    <li>
                        <a href="a_users.php">
                            <i class="fa fa-user"></i>
                            Añadir Usuarios

                        </a>
                    </li>
                    <li  class="active">
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
           
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="line"></div>
                                           
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading">Todos los usuarios</div>
        <div class="panel-body">
                        <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                <thead>
                <tr>
                    <th>No</th>
                  
                    <th> Nombre </th>
                    <th> Apellido </th>
                    <th> Nombre de usuario </th>
                    <th> Email </th>
                    <th> teléfono </th>
                    <th> Nivel de acceso </th>
                    <th> Acción </th>

                    
                    
                    </tr>
                </thead>
                    <?php
                                   $a=1;
                    $query=mysqli_query($mysqli,"select *from `usersrpo` ");
                     while($row=mysqli_fetch_array($query))
                        {
                          
                          ?>
                          <tr>
                              <td><?php echo $a;?></td> 
                            <td><?php echo $row['users'];?></td>
                            <td><?php echo $row['surname'];?></td>
                            <td><?php echo $row['username'];?></td>  
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td><?php echo $row['permission'];?></td>  
                            <td>
                  <a href="v_users.php?edited=1&idx=<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
                              </td>
                          </tr>
                          <?php
                       
                            $a++;
                      }
                       

          
                      if (isset($_GET['idx']) && is_numeric($_GET['idx']))
                      {
                          $id = $_GET['idx'];
                          if ($stmt = $mysqli->prepare("DELETE FROM usersrpo WHERE id = ? LIMIT 1"))
                          {
                              $stmt->bind_param("i",$id);
                              $stmt->execute();
                              $stmt->close();
                               ?>
                    <div class="alert alert-success strover" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Exitosamente! </strong><?php echo'Registro eliminado con éxito, actualice esta página';?></div>
               
                    <?php
                          }
                          else
                          {
                    ?>
                    <div class="alert alert-danger samuel" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Advertencia! </strong><?php echo'Vaya, intenta de nuevo, algo salió mal';?></div>
                    <?php
                          }
                          $mysqli->close();

                      }
                else

                {

                }
                      ?>
              
               
                </table>
            </div>
                </div>
                <div class="line"></div>
               
            <footer>
                <p class="text-center"> Psicoune &copy;<?php echo date("Y ");?> <i class="fa fa-map-marker " aria-hidden="true"></i> - CALLE FRANCISCO MOSTAJO 204  - YANAHUARA, Arequipa - Perú </p>
                <p class="text-center"> <i class="fa fa-phone" aria-hidden="true">  (054) +51 958 336 625 - 950 319 245 </i> <i class="fa fa-envelope " aria-hidden="true"></i> cursospsicoune@gmail.com </p>
            </footer>
            </div>

<!--flex derecho-->            
<!--flex derecho-->
            
        </div>
         <script src="assets/js/jquery-1.10.2.js"></script>
         <script src="assets/js/bootstrap.min.js"></script>
         <script src="vendors/datatables/datatables.min.js"></script>
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
         <script type="text/javascript">
             
             $(document).ready( function () {
                 $('#myTable').DataTable();
             } );
         </script>
    </body>
</html>
