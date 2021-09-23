<?php include_once 'includes/templetes/header.php'; ?>


  <section class="seccion clearfix contenedor">
      <h2>Calendario de eventos</h2>
      
      <?php 
         try{
             require_once('includes/funciones/db_conexion.php');
             $sql ="SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono,
              nombre_invitado, apellido_invitado FROM eventos 
              INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria 
              INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id ORDER BY evento_id"; 
             $resultado = $conn->query($sql);
         }catch(\Exception $e){
             echo $e->getMessage();
         }

      ?>
      <div class="calendario">
        <?php 
          $calendario = array();
          while($eventos = $resultado->fetch_assoc()){ 
              
                $fecha = $eventos['fecha_evento'];

                $evento = array(
                    'titulo' => $eventos['nombre_evento'],
                    'fecha' => $eventos['fecha_evento'],
                    'hora' => $eventos['hora_evento'],
                    'categoria' => $eventos['cat_evento'],
                    'icono' => $eventos['icono'],
                    'invitado' => $eventos['nombre_invitado'] . ' ' . $eventos['apellido_invitado']
                );

                $calendario[$fecha][]=$evento;

              ?>
            
        <?php  }    //fin del while    ?>

        <?php 
        //   imprimir los eventos
             foreach($calendario as $dia => $lista_eventos){?>
                 <h3>
                    <i class="fa fa-calendar"></i>
                    <?php 
                        // unix
                        setlocale(LC_TIME, 'es_ES.UTF-8');
                        // windows
                        // setlocale(LC_ALL, 'spanish');

                        $buscar= array("Friday", "Saturday", "Sunday","December");
                        $poner= array("Viernes", "Sábado", "Domingo","Diciembre");
                        echo str_replace($buscar,$poner,strftime("%A, %d de %B del %Y",strtotime($dia)));?>
                 </h3>
                 <?php foreach($lista_eventos as $evento) {?>
                     <div class="dia">
                     <p class="titulo"><?php echo $evento['titulo']; ?></p>
                     <p class="hora">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <?php echo $evento['fecha'].' '.$evento['hora']; ?>
                     </p>
                     <p>
                        <i class="fa <?php echo $evento['icono'] ?>" aria-hidden="true"></i>
                        <?php echo $evento['categoria'] ?>
                     </p>
                     <p>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo $evento['invitado']; ?></p>
                     
                     </div>
                 <?php } ?>
             
             <?php } ?>
      </div>
      <?php $conn->close(); ?>

  </section>

  <?php include_once 'includes/templetes/footer.php'; ?>