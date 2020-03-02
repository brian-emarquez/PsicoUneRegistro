<div class="modal fade" id="samstrover<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Informacion de la persona</h4></center>
                </div>
             <?php
					$pro=mysqli_query($mysqli,"select * from people where id='".$row['id']."'");
					$prow=mysqli_fetch_array($pro);
                    $tmp = $prow['tmp'];
				?>
				<div class="row">
                     <p class="text-center">Persona Id: <?php echo $prow['people_id'];?></p>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <a href="#"  class="img-thumbnail">
                           <?php require('propic.php');?> 
                        </a>
                        </div>
                     <div class="col-md-4"></div>
                </div>
                <form >
                <div class="modal-body">
	 
                    
                    <div class="row">

                    <div class="col-md-4">
                    <label>Nombres</label> 
                    <input name="name" type="text" class="form-control" value="<?php echo $prow['name'];?>" readonly>    
                    </div>
                    <div class="col-md-4">
                    <label>Apellidos</label> 
                    <input name="surname" type="text" class="form-control" value="<?php echo $prow['surname'];?>" readonly>        
                    </div> 
                    <div class="col-md-4">
                    <label>Email</label> 
                    <input name="email" type="text" class="form-control" value="<?php echo $prow['email'];?>" readonly>    
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-md-4">
                    <label>Celular</label> 
                    <input name="phone" type="text" class="form-control" value="<?php echo $prow['phone'];?>" readonly>        
                    </div> 
                    <div class="col-md-4">
                    <label>Genero</label> 
                    <input name="gender" type="text" class="form-control" value="<?php echo $prow['gender'];?>" readonly>        
                    </div>
                    <div class="col-md-4">
                    <label>Fecha de Ingreso</label> 
                    <input name="province" type="text" class="form-control" value="<?php echo $prow['joined'];?>" readonly>    
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-4">
                    <label>DNI</label> 
                    <input name="phone" type="text" class="form-control" value="<?php echo $prow['dni'];?>" readonly>        
                    </div> 
                    <div class="col-md-4">
                    <label>Edad</label> 
                    <input name="gender" type="text" class="form-control" value="<?php echo $prow['edad'];?>" readonly>        
                    </div>
                    <div class="col-md-4">
                    <label>Pais</label> 
                    <input name="province" type="text" class="form-control" value="<?php echo $prow['pais'];?>" readonly>    
                    </div>
                    </div> 

                    <div class="row">
                    <div class="col-md-6">
                    <label>Ciudad</label> 
                    <input name="phone" type="text" class="form-control" value="<?php echo $prow['ciudad'];?>" readonly>        
                    </div> 
                    <div class="col-md-6">
                    <label>Cursos</label> 
                    <input name="gender" type="text" class="form-control" value="<?php echo $prow['cursos'];?>" readonly>        
                    </div>
                    </div> 
                    <br>
                    <center><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button></center>
        
                 <div class="line"></div>
				</div>
 
				 </form>
            </div>
        </div>
    </div>
