      <?php 
         try{
             require_once('includes/funciones/db_conexion.php');
             $sql ="SELECT * FROM `invitados` "; 
             $resultado = $conn->query($sql);
         }catch(\Exception $e){
             echo $e->getMessage();
         }

      ?>
            <section class="invitados contenedor seccion">
               <h2>Nuestros invitados</h2>
               <ul class="lista-invitados clearfix">
                <?php  
                  $calendario = array();
                  while($invitados = $resultado->fetch_assoc()){ ?>

           
                 <li>
                   <div class="invitado">
                   <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id']; ?>">
                     <img src="img/invitados/<?php echo $invitados['url_imagen'] ?>" alt="imagen invitado">
                     <p><?php echo $invitados['nombre_invitado'].' '.$invitados['apellido_invitado'];?></p>
                   </a>
                   </div>
                 </li>  
                 <div style="display:none;">
                       <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id']; ?>">
                            <h2><?php echo $invitados['nombre_invitado'].' '.$invitados['apellido_invitado'];?></h2>
                            <img src="img/invitados/<?php echo $invitados['url_imagen'] ?>" alt="imagen invitado">
                            <p><?php echo $invitados['descripcion']; ?></p>
                       </div>
                 </div>
                <?php } ?>
                <ul>
            </section>
                 <?php $conn->close(); ?>