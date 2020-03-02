<!-- maps.php -->

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
        <script type="text/javascript" src="../js/googlemaps.js"></script>
        <link rel="stylesheet" href="assets/css/modal-geo-m.css">

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
                    <li>
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
                        <li class="active">
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

<!--------------------------------------------------------------Init modal-------------------------------------------------------------------->
    <div class="panel panel-default sammacmedia">
        <div class="panel-heading"> Geolocalizacion
    </div>
            
    <style>
        #fondo{
            background-color: #D7D2D2;
        }

        #menu{
            background-color: #A09D9C;
        }

        #menu ul{
            list-style: none;
            margin: 0;
            padding: 20px 30px;
        }

        #menu li{
            display: inline;
            margin: 0;
        }

        #menu li a{
            color: white;
            padding: 20px 30px;
            text-decoration: none;
        }

        #menu li a:hover{
            background-color: cornflowerblue;
            color: white;
        }

        @media screen and (max-width: 747px){
            #menu ul{
                padding: 0;
            }
            #menu ul li{
                margin-right: -3px;
                display: inline-block;
                text-align: center;
                width: 33%;
            }

            #menu li a{
                display: list-item;
            }
        }

        @media screen and (max-width: 480px){
            #menu ul li{
                width: 100%;
            }
        }
    </style>
</head>
	
<div id="fondo">
    <div id="menu">
        <ul>
            <li><a href="#" id="arequipa">Arequipa</a></li>
            <li><a href="#" id="tacna">Tacna</a></li>
            <li><a href="#" id="juliaca">Juliaca</a></li>
            <li><a href="#" id="huancayo">Huancayo</a></li>

        </ul>
    </div>

    
    <div>
    <div id="miModal" class="modal">
		<div class="flex" id="flex">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h3>Arequipa </h3>
					<span class="close" id="close">&times;</span>
				</div>
				<div class="modal-body">
					<p> Dirección: Francisco Mostajo 204, Yanahuara 04013, Teléfono: (054) 626963,  Yanahuara, psicoune.org</p>
                    <div id="container_aq">
                        <style>
                        #container_aq{
                            background: url(../images/modal/psicoune_aq.jpg);
                            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
                            width: 300px;
                            height: 300px;
                            margin: 0 auto;
                            transition: all 1s;
                        }
                        #container_aq:hover{
                            border-radius: 44% 56% 87% 13% / 68% 86% 14% 32% ;
                        }
                        </style>
                    </div>
                </div>
				<div class="footer">
                    <center><h5><a href="https://www.facebook.com/psicouneorg/" >Sede Arequipa</a></h5></center>
                </div>                
            </div> 
		</div>
    </div>
  
    <div id="miModal2" class="modal2">
		<div class="flex2" id="flex2">
			<div class="contenido-modal2">
				<div class="modal-header2 flex2">
					<h3>Tacna</h3>
					<span class="close2" id="close2">&times;</span>
				</div>
				<div class="modal-body2">
					<p>  Dirección: Pje Vigil , 178 Segundo Piso, Teléfono: 993768338 - 958336625,  Tacna, psicoune.org </p> 
                    <div id="container_ta">
                        <style>
                        #container_ta{
                            background: url(../images/modal/psicoune_ta.jpg);
                            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
                            width: 300px;
                            height: 300px;
                            margin: 0 auto;
                            transition: all 1s;
                        }
                        #container_ta:hover{
                            border-radius: 44% 56% 87% 13% / 68% 86% 14% 32% ;
                        }
                        </style>
                    </div>
                </div>
				<div class="footer2">
                <center><h5><a href="https://www.facebook.com/TACNA-Psicoune-559979351127412" >Sede Arequipa</a></h5></center>
                </div>                
            </div> 
		</div>
    </div>

    <div id="miModal3" class="modal3">
		<div class="flex3" id="flex3">
			<div class="contenido-modal3">
				<div class="modal-header3 flex3" >
					<h3>Juliaca</h3>
					<span class="close3" id="close3">&times;</span>
				</div>
				<div class="modal-body3">
					<p> Dirección: Jr. Jorge Chávez N° 277, Juliaca, psicoune.org</p> 
                    <div id="container_ju">
                        <style>
                        #container_ju{
                            background: url(../images/modal/psicoune_ju.jpg);
                            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
                            width: 300px;
                            height: 300px;
                            margin: 0 auto;
                            transition: all 1s;
                        }
                        #container_ju:hover{
                            border-radius: 44% 56% 87% 13% / 68% 86% 14% 32% ;
                        }
                        </style>
                    </div>
                </div>
				<div class="footer3">
                <center><h5><a href="https://www.facebook.com/Juliaca-Psicoune-606263009819295" >Sede Arequipa</a></h5></center>
                </div>                
            </div> 
		</div>
    </div>

    <div id="miModal4" class="modal4">
		<div class="flex4" id="flex4">
			<div class="contenido-modal4">
				<div class="modal-header3 flex4" >
					<h3>Huancayo</h3>
					<span class="close4" id="close4">&times;</span>
				</div>
				<div class="modal-body4">
					<p> Dirección: Psj. Santa Rosa 276, Huancayo, psicoune.org</p> 
                    <div id="container_hu">
                        <style>
                        #container_hu{
                            background: url(../images/modal/psicoune_hu.jpg);
                            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
                            width: 300px;
                            height: 300px;
                            margin: 0 auto;
                            transition: all 1s;
                        }
                        #container_hu:hover{
                            border-radius: 44% 56% 87% 13% / 68% 86% 14% 32% ;
                        }
                        </style>
                    </div>
                </div>
				<div class="footer4">
                <center><h5><a href="https://www.facebook.com/Huancayo-Psicoune-811082085957055/?__tn__=%2Cd%2CP-R&eid=ARA-u6E6N26UMAmZ_Mg-IpTclAerzUEWS2h71sjmIqGkSLL00g1x9n-Xev_8P5fD8Sa0cu78yFyT4jDW" >Sede Arequipa</a></h5></center>
                </div>                
            </div> 
		</div>
    </div>
    
    <script src="../js/modal-geo-m.js"></script>
    </div>
  
  <!-------------------------------------------------------------fin modal-------------------------------------------------------------------->
  <!--------------------------------------------------------------Init Map-------------------------------------------------------------------->
  
    <style type="text/css">
		.container {
			height: 400px;
		}
		#map {
			width: 100%;
			height: 100%;
			border: 1px solid red;
		}
		#data, #allData {
			display: none;
		}
	</style>


	<div class="container">
		<center><h5>Sedes Psicoune</h5></center>
		<?php 
			require 'ubicacion.php';
			$edu = new ubicacion;
			$coll = $edu->getCollegesBlankLatLng();
			$coll = json_encode($coll, true);
			echo '<div id="data">' . $coll . '</div>';

			$allData = $edu->getAllColleges();
			$allData = json_encode($allData, true);
			echo '<div id="allData">' . $allData . '</div>';			
		 ?>
		<div id="map"></div>
	</div>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-dFHYjTqEVLndbN2gdvXsx09jfJHmNc8&callback=loadMap">
</script>
<br>



  <!------------------------------------------------------------Fin Map----------------------------------------------------------------->

            
            <div class="line"></div>
            
            </div>
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
