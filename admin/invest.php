<!-- invest.php -->

<?php require_once('includes/session.php');
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Reportar Problemas</title>

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
                    <h3>REPORTAR PROBLEMAS</h3>
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
                    <li  >
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
                    <li class="active">
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
                                
           
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="line"></div>

                            <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $people_id = mysqli_real_escape_string($mysqli,$_POST['people_id']);
                            $severity = mysqli_real_escape_string($mysqli,$_POST['severity']);
                            $notes = mysqli_real_escape_string($mysqli,$_POST['notes']);
                            $as = rand(1000,9999);     
                            $case_num = date("YmdHis").'.'.$as;
      
                  
                            $sql = "INSERT INTO cases(people_id,severity,case_num,notes)VALUES('$people_id','$severity','$case_num','$notes')";
                            $results = mysqli_query($mysqli,$sql);

                        if($results==1){
                              ?>
                        <div class="alert alert-success strover animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Exitosamente! </strong><?php echo'Informe agregado con éxito';?></div>
                        <?php

                          }else{
                                ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Advertencia! </strong><?php echo'Huy! Algo salió mal';?></div>
            
                        <?php    
                          }      
                
            }
                
                ?>
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading">Informe de Problemas</div>
        <div class="panel-body">
            <form method="post" action="invest.php">
        <div class="row form-group">
          <div class="col-lg-6">
            <label>Seleccione el Id de la persona</label>
             <?php
                       
                    $query1 = "SELECT * FROM `people`";
                    $result1 = mysqli_query($mysqli, $query1);
                    ?>
                    <select class="form-control" name="people_id">
                    <?php while($row1 = mysqli_fetch_array($result1)):;?>
                        <option><?php echo $row1['people_id'];?></option>
                        <?php endwhile;?>
                       
                       </select>
            </div>  
            <div class="col-lg-6">
            <label>Gravedad de caso</label>
                <select class="form-control" name="severity">
                <option>Normal</option>
                <option>Crítico</option>  
                <option>Peligro</option>    
                </select>
            </div>
           </div>
                <div class="row form-group">
          <div class="col-lg-12">
              <textarea class="form-control" id="editor" name="notes"></textarea>
            </div>  
             
           </div>
                
                <div class="row">
                <div class="col-md-6">
                  <button type="submit" name="submit" class="btn btn-suc btn-block"><span class="fa fa-plus"></span> Agregar</button>  
                </div>
                     <div class="col-md-6">
                  <button type="submit" class="btn btn-dan btn-block"><span class="fa fa-times"></span> Cancelar</button>  
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

    <!--flex derecho-->
    <!--flex derecho-->

            
        </div>
        <!-- jQuery CDN -->
         <script src="assets/js/jquery-1.10.2.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="assets/js/bootstrap.min.js"></script>
         <script src="vendors/ckeditor/sammacmedia.js"></script>

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
              ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                console.log( editor );
		} )
                .catch( error => {
                console.error( error );
		} );
    </script>
    </body>
</html>
