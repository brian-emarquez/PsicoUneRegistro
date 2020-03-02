<!-- dashboard.php -->

<?php require_once('includes/session.php');
       require_once('includes/conn.php');
       require_once('includes/db.php');
       require_once('check.php'); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Menu Principal</title>

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
           <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/stylee.css">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/barra.css">

    </head>    
    <body>
        <div class="wrapper">
            <!-- Metro -->
            <nav id="sidebar" class="sammacmedia">
                <div class="sidebar-header">
                    <h3>MENU PRINCIPAL</h3>
                    <strong>RPO</strong>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
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


                    if($_SESSION['permission']==1){
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
                    <?php } ?>
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
             
                <div clas="col-md-12"></div>
                <!--<img src="assets/image/ssm.jpg" class="img-thumbnail">-->
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
                                <li><a href="v_users.php"><?php require_once('includes/name.php');?></a></li>
                                <li ><a href="logout.php"><i class="fa fa-power-off"> Cerrar sesión</i></a></li> 
           
                            </ul>
                           
                        </div>
                    </div>
                </nav>
                <h5 align="center">Fichas rápidas</h5>   
                <div class="line"></div>
                <div class="row">

                <div class="col-lg-6 col-md-6 ">
                    <div class="panel panel sammac sammacmedia">
                    <a href="v_users.php">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $users;?></div>
                                    
                                    <div>Número total de usuarios</div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="panel panel strover sammacmedia">
                    <a href="v_issue.php">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-link fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cases;?></div>
                                    <div>Número total de casos</div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>

                <div class="col-lg-6 col-md-6" >
                <div class="panel panel strover sammacmedia" style="background-color:#0A63A5" >
                    <a href="a_people.php">
                        <div class="panel-heading" >
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-cogs fa-5x" ></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $people;?></div>
                                    <div>Ajustes del Usuarios</div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>  
            </div>
                           
              
<!-------------------------------------------------------Estadistica-Inicio------------------------------------------------------------->
<?php
    if($_SESSION['permission']==1 or $_SESSION['permission']==2 ){
  ?>  

<div class="line"></div>
   <div class="container" style="width:900px;">
   <a href="chart.php">
   <h5 align="center">Monitor de Eventos - Personas Agregadas </h5>   
   <br/><br/>
   <div id="chart-bar"></div>

    <script>
        Morris.Bar({
        element : 'chart-bar',
        data:[<?php echo $chart_data; ?>],
        xkey:'name',
        ykeys:['edad'], 
        labels:['edad'], //mensage
        hideHover:'auto',
        stacked:true,
        });
    </script>

    
<div class="line" ></div>
    <div class="container" style="width:900px;">
    <h5 align="center">Monitor de Eventos  - Edades</h5>   
    <br/><br/>
    <div id="chart-line"></div>


    <script>
        Morris.Line({
        element : 'chart-line',
        data:[<?php echo $chart_data; ?>],
        xkey:'edad',
        ykeys:['edad'], 
        labels:['edad'], //mensage
        hideHover:'auto',
        stacked:true,
        });
    </script>

<?php }?>
                             
<!----------------------------------------------------------estadistica-Fin-------------------------------------------------------------------->

<!-----------------------------------------------------------Slide-Inicio---------------------------------------------------------------------->

<div class="line" ></div>
        <div class="efect">
            <li >
                <a href="https://www.facebook.com/psicouneorg/">
                    <div class="icon" >  
                         <i class="fa fa-facebook-square" aria-hidden="true"></i>
                         <i class="fa fa-facebook-square" aria-hidden="true"></i>
                     </div> 
                    <div class="name"><span data-text="Facebook" >Facebook </span></div>            
                </a>
            </li>

            <li>
                <a href="https://twitter.com/psicoune?lang=es">
                    <div class="icon">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>>
                    </div>  
                    <div class="name"><span data-text="Twitter">Twitter </span></div>            
                </a>
            </li>

            <li>
                <a href="https://www.instagram.com/psicoune/">
                    <div class="icon">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>  
                    <div class="name"><span data-text="instagram">instagram</span></div>            
                </a>
            </li>

            <li>
                <a href="https://www.psicoune.org/social/whatsapp">
                    <div class="icon">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <i class="fa fa-comments" aria-hidden="true"></i>
                    </div>  
                    <div class="name"><span data-text="Whatsapp">Whatsapp</span></div>            
                </a>
            </li>
            </div>

<!-----------------------------------Slide-Fin-------------------------------------------------->
    
            <div class="line" ></div>
            <footer>
                <p class="text-center"> Psicoune &copy;<?php echo date("Y ");?> <i class="fa fa-map-marker " aria-hidden="true"></i> - CALLE FRANCISCO MOSTAJO 204  - YANAHUARA, Arequipa - Perú </p>
                <p class="text-center"> <i class="fa fa-phone" aria-hidden="true">  (054) +51 958 336 625 - 950 319 245 </i> <i class="fa fa-envelope " aria-hidden="true"></i> cursospsicoune@gmail.com </p>
            </footer>
            <!-- Contador de visitas -->
            <center><a href="http://www.websmultimedia.com/contador-de-visitas-gratis" title="Contador De Visitas Gratis">
            <img style="border: 0px solid; display: inline;" alt="contador de visitas" src="http://www.websmultimedia.com/contador-de-visitas.php?id=276615"></a><br><a href='http://www.websmultimedia.com/contador-de-visitas-gratis'></a><br><a href='http://boxindian.com/'></a></center>
            <!-- Fin Contador de visitas -->
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
    </body>
</html>
