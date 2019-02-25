<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';

// barra principal
 include_once 'templates/barra.php';

//  barra lateral izquierda
 include_once 'templates/navegacion.php'; 
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Crear Registros
            <small>Crea un registro manualmente</small>
        </h1>
    </section>

    <div class="row">
        <div class="col-md-8">

            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos del registrado</h3>


                    </div>
                    <div class="box-body">
            <form role="form" name="guardar-registro" id="guardar-registro" method="post"
                            action="modelo-registrado.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nombre_registrado">Nombre:</label>
                                    <input type="texto" class="form-control" id="nombre" name="nombre"
                                        placeholder="Nombre">
                                </div>
                                <label for="apellido">Apellido:</label>
                                <input type="texto" class="form-control" id="apellido" name="apellido"
                                    placeholder="Apellido">
                            </div>
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <div id="paquetes" class="paquetes contenedor">
                            <div class="box-header with-border">
                                <h2 class="box-title">Elige el número de boletos</h2>
                            </div>
                            <ul class="lista-precios clearfix row">
                                <li class="col-md-4">
                                    <div class="tabla-precio text-center">
                                        <h3>Pase por Dia (Viernes)</h3>
                                        <p class="numero">$30</p>
                                        <ul>
                                            <li>Bocadillos Gratis</li>
                                            <li>Todas las conferencias</li>
                                            <li>Todos los tallers</li>
                                        </ul>
                                        <div class="orden">
                                            <label for="pase_dia">Boletos deseados:</label>
                                            <input type="number" class="form-control" min="0" id="pase_dia" size="3"
                                                name="boletos[un_dia][cantidad]" placeholder="0">
                                            <input type="hidden" value="30" name="boletos[un_dia][precio]">
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="tabla-precio text-center">
                                        <h3>Todos los Dias</h3>
                                        <p class="numero">$50</p>
                                        <ul>
                                            <li>Bocadillos Gratis</li>
                                            <li>Todas las conferencias</li>
                                            <li>Todos los tallers</li>
                                        </ul>
                                        <div class="orden">
                                            <label for="pase_completo">Boletos deseados:</label>
                                            <input type="number" class="form-control" min="0" id="pase_completo"
                                                size="3" name="boletos[completo][cantidad]" placeholder="0">
                                            <input type="hidden" value="50" name="boletos[completo][precio]">
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="tabla-precio text-center">
                                        <h3>Pase por dos Dias (Sabado y Domingo)</h3>
                                        <p class="numero">$45</p>
                                        <ul>
                                            <li>Bocadillos Gratis</li>
                                            <li>Todas las conferencias</li>
                                            <li>Todos los tallers</li>
                                        </ul>
                                        <div class="orden">
                                            <label for="pase_dosdias">Boletos deseados:</label>
                                            <input type="number" class="form-control" min="0" id="pase_dosdias" size="3"
                                                name="boletos[2dias][cantidad]" placeholder="0">
                                            <input type="hidden" value="45" name="boletos[2dias][precio]">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--paquetes  -->
                    </div>
                    <div class="form-group">
                        <div class="box-header with-border">
                            <h2 class="box-title">Elige los talleres</h2>
                        </div>
                        <div id="eventos" class="contenedor eventos clearfix">
                            <div class="caja">

                                <?php 
                                       try {
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
                                        //  traduccion de idioma
                                        setlocale(LC_ALL, 'es_ES');
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


                                         <div id="<?php /*remplazar el acento de sábado*/echo str_replace('á', 'a', $dia); ?>"
                                             class="contenido-dia clearfix row">
                                             <h4 style="text-align: center;" class="nombre-dia"><?php echo $dia; ?></h4>
         
                                             <?php foreach($eventos['eventos'] as $tipo => $eventos_dia): ?>
                                             <div class="col-md-4">
                                                 <p><?php echo $tipo; ?></p>
         
                                                 <?php foreach($eventos_dia as $evento): ?>
                                                 <label style="text-align: justifed;">
                                                     <input type="checkbox" name="registro_evento[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
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
                            <div class="box-header with-border">
                                <h2 class="box-title">Pagos y extras</h2>
                            </div>
                            <div class="caja clearfix row">
                                <div class="extras col-md-6">
                                    <div class="orden">
                                        <label for="camisa_evento">Camisa del evento $10 <small>(Promocion 7%
                                                dto.)</small></label>
                                        <input type="number" min="0" id="camisa_evento"
                                            name="pedido_extra[camisas][cantidad]" class="form-control" size="3"
                                            placeholder="0">
                                        <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                                    </div>
                                    <br>
                                    <div class="orden">
                                        <label for="etiquetas">Paquete de 10 etiqueta $2 <small>HTML5, CSS3,
                                                JavaScript,
                                                Chrome</small></label>
                                        <input type="number" min="0" id="etiquetas" class="form-control" size="3"
                                            name="pedido_extra[etiquetas][cantidad]" placeholder="0">
                                        <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                                    </div>
                                    <br>
                                    <div class="orden">
                                        <label for="regalo">Seleccione un regalo:</label>
                                        <br>
                                        <select id="regalo" name="regalo" class="form-control seleccionar" required>
                                            <option value="">- Seleccione un regalo -</option>
                                            <option value="2">Etiquetas</option>
                                            <option value="1">Pulseras</option>
                                            <option value="3">Plumas</option>
                                        </select>
                                    </div>
                                    <br>
                                    <input type="button" id="calcular" class="btn btn-success" value="Calcular">
                                </div>
                                <!--.extras-->
                                <br><br><br>
                                <div class="total col-md-6">
                                    <p>Resumen:</p>
                                    <div id="lista-productos">

                                    </div>
                                    <p>Total:</p>
                                    <div id="suma-total">

                                    </div>
                                    <input type="hidden" name="total_pedido" id="total_pedido">
                                </div>
                                <!--.total-->

                            </div>
                            <!--.caja-->
                        </div>
                        <!--#resumen-->
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <input type="hidden" name="registro" value="nuevo">
                    <button type="submit" class="btn btn-primary" id="btnRegistro">Enviar</button>
                </div>
            </form>      
        </div>
    </div>
    <!-- /.box -->

   </section>

</div>
</div>
</div>
<!-- /.content-wrapper -->

<?php

include_once 'templates/footer.php';

 ?>