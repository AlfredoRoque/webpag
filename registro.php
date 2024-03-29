<?php include_once 'includes/templetes/header.php'; ?>

<section class="seccion contenedor">
    <h2>Registro de Usuarios</h2>
    <form id="registro" class="registro" action="pagar.php" method="post">
        <div id="datos_usuario" class="registro caja clearfix">
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre">
            </div>
            <div class="campo">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido">
            </div>
            <div class="campo">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Tu Email">
            </div>
            <div id="error"></div>
        </div>
        <!--formulario  -->

        <div id="paquetes" class="paquetes contenedor">
            <h3>Elige el numero de boletos</h3>
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por Dia (Viernes)</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los tallers</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_dia">Boletos deseados:</label>
                            <input type="number" min="0" id="pase_dia" size="3" name="boletos[un_dia][cantidad]"
                                placeholder="0">
                            <input type="hidden" value="30" name="boletos[un_dia][precio]">
                        </div>
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
                        <div class="orden">
                            <label for="pase_completo">Boletos deseados:</label>
                            <input type="number" min="0" id="pase_completo" size="3" name="boletos[completo][cantidad]"
                                placeholder="0">
                            <input type="hidden" value="50" name="boletos[completo][precio]">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por dos Dias (Sabado y Domingo)</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los tallers</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_dosdias">Boletos deseados:</label>
                            <input type="number" min="0" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]"
                                placeholder="0">
                            <input type="hidden" value="45" name="boletos[2dias][precio]">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!--paquetes  -->

        <div id="eventos" class="contenedor eventos clearfix">
            <h3>Elige tus talleres</h3>
            <div class="caja">

                <?php 
         try {
           require_once('includes/funciones/db_conexion.php');
           $sql = " SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado";
           $sql .= " FROM eventos ";
           $sql .= " JOIN categoria_evento ";
           $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
           $sql .= " JOIN invitados ";
           $sql .= " ON eventos.id_inv = invitados.invitado_id ";
           $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento ";
            
           $resultado = $conn->query($sql);



         } catch (Exception $e) {
           echo $e->getMessage();
         }

         $eventos_dias = array();
         while($eventos = $resultado->fetch_assoc()){
           $fecha = $eventos['fecha_evento'];
        //    // unix
        //    setlocale(LC_ALL, 'es_ES.UTF-8');
          //  traduccion de idioma
        //   setlocale(LC_ALL, 'spanish');
          // obtener el dia a partie de la fecha
          $dia_semana = strftime("%A", strtotime($fecha));

          $categoria = $eventos['cat_evento'];
          // arreglo con toda la informacion
          $dia = array(
            'nombre_evento' => $eventos['nombre_evento'],
            'hora' => $eventos['hora_evento'],
            'id' => $eventos['evento_id'],
            'nombre_invitado' => $eventos['nombre_invitado'],
            'apellido_invitado' => $eventos['apellido_invitado']
          );
          // formato a los datos obtenidos en un arreglo mutidimensional
          $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
         }

        //  echo "<pre>";
        //   var_dump($eventos_dias);
        //  echo "</pre>";

               ?>
                <?php foreach ($eventos_dias as $dia => $eventos) {?>


                <div id="<?php /*remplazar el acento de sábado*/echo $dia; ?>"
                    class="contenido-dia clearfix">
                    <h4><?php 
                            
                            $buscar= array("Friday", "Saturday", "Sunday");
                            $poner= array("Viernes", "Sábado", "Domingo");
                            echo str_replace($buscar,$poner,$dia);

                            ?></h4>
                    <?php foreach($eventos['eventos'] as $tipo => $eventos_dia): ?>
                    <div>
                        <p><?php echo $tipo; ?></p>

                        <?php foreach($eventos_dia as $evento): ?>
                        <label style="text-align: justifed;">
                            <input class="minimal" type="checkbox" name="registro[]" id="<?php echo $evento['id']; ?>"
                                value="<?php echo $evento['id']; ?>">
                            <time><?php echo $evento['hora']." "; ?></time>
                            <span class="evento"><?php echo $evento['nombre_evento']."<br>"; ?></span>
                            <span
                                class="autor"><?php echo "Ponente: ".$evento['nombre_invitado']." ".$evento['apellido_invitado']; ?></span>
                        </label>
                        <?php endforeach; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!--contenido dia-->
                <?php } ?>
            </div>
            <!--.caja-->
        </div>
        <!--#eventos-->
        <div id="resumen" class="resumen contenedor">
            <h3>Pago y Extras</h3>
            <div class="caja clearfix">
                <div class="extras">
                    <div class="orden">
                        <label for="camisa_evento">Camisa del evento $10 <small>(Promocion 7% dto.)</small></label>
                        <input type="number" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3"
                            placeholder="0">
                        <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                    </div>
                    <div class="orden">
                        <label for="etiquetas">Paquete de 10 etiqueta $2 <small>HTML5, CSS3, JavaScript,
                                Chrome</small></label>
                        <input type="number" min="0" id="etiquetas" size="3" name="pedido_extra[etiquetas][cantidad]"
                            placeholder="0">
                        <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                    </div>
                    <div class="orden">
                        <label for="regalo">Seleccione un regalo:</label>
                        <select id="regalo" name="regalo" required>
                            <option value="">- Seleccione un regalo -</option>
                            <option value="2">Etiquetas</option>
                            <option value="1">Pulseras</option>
                            <option value="3">Plumas</option>
                        </select>
                    </div>
                    <input type="button" id="calcular" class="button" value="Calcular">
                </div>
                <!--.extras-->
                <div class="total">
                    <p>Resumen:</p>
                    <div id="lista-productos">

                    </div>
                    <p>Total:</p>
                    <div id="suma-total">

                    </div>
                    <input type="hidden" name="total_pedido" id="total_pedido">
                    <input id="btnRegistro" type="submit" name="submit" class="button" value="Pagar">
                </div>
                <!--.total-->
            </div>
            <!--.caja-->
        </div>
        <!--#resumen-->
    </form>
</section>
<?php include_once 'includes/templetes/footer.php'; ?>