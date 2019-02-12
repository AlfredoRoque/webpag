<?php include_once 'includes/templetes/header.php'; ?>
  <section class="seccion contenedor">
    <h2>La mejor conferencia de diseño web</h2>
    <p>
      Entre los distintos tipos se encuentra el párrafo científico que se caracteriza por contar con procedimientos especiales en la selección, organización y uso de las unidades morfológicas, léxicas, sintácticas y textuales que permiten transmitir de forma óptima la información.
    </p>
  </section><!--seccion-->

  <section class="programa">
    <div class="contenedo-video">
      <video autoplay muted loop poster="img/bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogg">
      </video>
    </div><!--contenedor-video-->
    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del evento</h2>
        <?php 
         try{
             require_once('includes/funciones/db_conexion.php');
             $sql ="SELECT * FROM `categoria_evento` "; 
             $resultado = $conn->query($sql);
         }catch(\Exception $e){
             echo $e->getMessage();
         }

        ?>
          <nav class="menu-programa">
          <?php  while($cat = $resultado->fetch_assoc()){ ?>
          <?php $categoria = $cat['cat_evento']; ?>  
              <a href="#<?php echo strtolower($categoria); ?>">
              <i class="fa <?php echo $cat['icono']; ?>"></i><?php echo $categoria; ?></a>
          <?php } ?>  
          </nav>
         <?php 
         try{
             require_once('includes/funciones/db_conexion.php');
             $sql ="SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono,
              nombre_invitado, apellido_invitado FROM eventos 
              INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria 
              INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id
              AND eventos.id_cat_evento = 1 ORDER BY evento_id LIMIT 2;
              SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono,
              nombre_invitado, apellido_invitado FROM eventos 
              INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria 
              INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id
              AND eventos.id_cat_evento = 2 ORDER BY evento_id LIMIT 2;
              SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono,
              nombre_invitado, apellido_invitado FROM eventos 
              INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria 
              INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id
              AND eventos.id_cat_evento = 3 ORDER BY evento_id LIMIT 2; "; 
         }catch(\Exception $e){
             echo $e->getMessage();
         }
         ?>
         <?php $conn->multi_query($sql); ?>
         <?php do {
           $resultado = $conn->store_result();
           $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
           <?php $i = 0; ?>
           <?php foreach($row as $evento): ?>
           <?php if($i % 2 == 0) {?>
           <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
           <?php } ?>
            <div class="detalle-evento">
              <h3><?php echo ($evento['nombre_evento']); ?></h3>
              <p><i class="fa fa-clock"></i><?php echo $evento['hora_evento']; ?></p>
              <p><i class="fa fa-calendar"></i><?php echo $evento['fecha_evento']; ?></p>
              <p><i class="fa fa-user"></i><?php echo $evento['nombre_invitado'].' '.$evento['apellido_invitado']; ?></p>
            </div>
         <?php if ($i % 2 == 1): ?>
             <a href="#" class="button float-right">Vert todos</a>
          </div><!--#talleres-->
          <?php endif; ?>
         <?php $i++; ?> 
         <?php endforeach; ?>
         <?php $resultado->free(); ?>
         <?php } while ($conn->more_results() && $conn->next_result()); ?>

        </div><!--programa-evento-->
      </div><!--contenedor-->
    </div><!--contenido-programa-->
  </section><!--programa-->

  <?php include_once 'includes/templetes/invitados_code.php'; ?>

  <div class="contador paralax">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
        <li><p class="numero">0</p>Invitados</li>
        <li><p class="numero">0</p>Talleres</li>
        <li><p class="numero">0</p>Dias</li>
        <li><p class="numero">0</p>Conferencias</li>
      </ul>
    </div>
  </div>

  <section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>Pase por Dia</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los tallers</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Todos los Dias</h3>
            <p class="numero">$50</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los tallers</li>
            </ul>
            <a href="#" class="button">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Pase por dos Dias</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los tallers</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <div id="mapa" class="mapa"></div>

  <section class="seccion">
    <h2>Testimoniales</h2>
      <div class="testimoniales contenedor clearfix">
        <div class="testimonial">    
          <blockquote>    
            <p> Entre los distintos tipos se encuentra el párrafo científico que se caracteriza por contar con procedimientos especiales en la selección, organización y uso de las unidades morfológicas, léxicas, sintácticas y textuales que permiten transmitir de forma óptima la información.</p>    
            <footer class="info-testimonial clearfix">    
              <img src="img/testimonial.jpg">
              <cite>Oswaldo Aponte Escobedo<span>Diseñador en @printer</span></cite>    
            </footer>    
          </blockquote>    
        </div><!--testimonial-->    
        <div class="testimonial">    
          <blockquote>    
            <p> Entre los distintos tipos se encuentra el párrafo científico que se caracteriza por contar con procedimientos especiales en la selección, organización y uso de las unidades morfológicas, léxicas, sintácticas y textuales que permiten transmitir de forma óptima la información.</p>    
            <footer class="info-testimonial clearfix">    
              <img src="img/testimonial.jpg">
              <cite>Oswaldo Aponte Escobedo<span>Diseñador en @printer</span></cite>    
            </footer>    
          </blockquote>    
        </div><!--testimonial-->    
        <div class="testimonial">    
          <blockquote>    
            <p> Entre los distintos tipos se encuentra el párrafo científico que se caracteriza por contar con procedimientos especiales en la selección, organización y uso de las unidades morfológicas, léxicas, sintácticas y textuales que permiten transmitir de forma óptima la información.</p>    
            <footer class="info-testimonial clearfix">    
              <img src="img/testimonial.jpg">
              <cite>Oswaldo Aponte Escobedo<span>Diseñador en @printer</span></cite>    
            </footer>    
          </blockquote>    
        </div><!--testimonial-->
      </div>  
  </section>

  <div class="newsletter paralax">
    <div class="contenido contenedor">
      <p>Registrate al newsletter:</p>
      <h3>Gdlwebcamp</h3>
      <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>
    </div>
  </div><!--newsletter-->

  <section class="seccion clearfix">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva contenedor">
      <ul>
        <li><p id="dias" class="numero"></p> Dias</li>
        <li><p id="horas" class="numero"></p> Horas</li>
        <li><p id="minutos" class="numero"></p> Minutos</li>
        <li><p id="segundos" class="numero"></p> Segundos</li>
      </ul>
    </div>
  </section>

<?php include_once 'includes/templetes/footer.php'; ?>