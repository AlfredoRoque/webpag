<?php
$id = $_GET['id'];

if(!filter_var($id, FILTER_VALIDATE_INT)):
    die('error');
else :

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
            Editar un Evento
            <small>Datos para editar un evento nuevo</small>
        </h1>
        <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
    </section>

    <div class="row">
        <div class="col-md-8">

            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Evento</h3>
                    </div>
                    <div class="box-body">

                    <?php 
                         $sql = " SELECT * FROM eventos WHERE evento_id = $id ";
                         $resultado = $conn->query($sql);
                         $evento = $resultado->fetch_assoc();

                    ?>
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-evento.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label >Nombre del Evento</label>
                                    <input type="texto" class="form-control" id="titulo_evento" name="titulo_evento"
                                        placeholder="Titulo del evento" value="<?php echo $evento['nombre_evento']; ?>">
                                </div>
                                <div class="form-group">
                                    <label >Categoria</label>
                                    <select name="categoria_evento" class="form-control seleccionar">
                                        <option value="0">- Seleccione -</option>
                                        <?php 
                                          try {
                                              $categoria_actual = $evento['id_cat_evento'];
                                              $sql ="SELECT * FROM categoria_evento";
                                              $resultado = $conn->query($sql);
                                              while ($cat_evento = $resultado->fetch_assoc()) { 
                                                  if($cat_evento['id_categoria'] == $categoria_actual){  ?>
                                                  <option value="<?php echo $cat_evento['id_categoria']; ?>" selected>
                                                  <?php echo $cat_evento['cat_evento']; ?> </option>
                                        <?php    }else { ?>
                                                  <option value="<?php echo $cat_evento['id_categoria']; ?>">
                                                  <?php echo $cat_evento['cat_evento']; ?> </option>
                                                <?php } 
                                                }
                                          } catch (Exception $e) {
                                              echo "error" .$e->getMessage();
                                          }
                                        ?>
                                    </select>

                                </div>
                                <!-- Date -->
                                <div class="form-group">
                                    <label>Fecha evento</label>

                                    <?php $fecha = $evento['fecha_evento']; 
                                          $fecha_formato = date('d/m/Y', strtotime($fecha));
                                    ?>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="fecha"
                                            name="fecha_evento" value="<?php echo $fecha_formato; ?>">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Hora del evento</label>

                                        <?php $hora = $evento['hora_evento'];
                                              $hora_formato = date('H:i a', strtotime($hora));
                                        ?>

                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="hora_evento" 
                                            value="<?php echo $hora_formato; ?>">

                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>

                                <div class="form-group">
                                    <label >Invitado</label>
                                    <select name="invitado" class="form-control seleccionar">
                                        <option value="0">- Seleccione -</option>
                                        <?php 
                                          try {
                                              $invitado_actual = $evento['id_inv'];
                                              $sql ="SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados";
                                              $resultado = $conn->query($sql);
                                              while ($invitados = $resultado->fetch_assoc()) { 
                                                 if($invitados['invitado_id'] == $invitado_actual) {?>
                                                     <option value="<?php echo $invitados['invitado_id']; ?>" selected>
                                                      <?php echo $invitados['nombre_invitado']." ".$invitados['apellido_invitado']; ?> 
                                                      </option>
                                                 <?php } else{ ?>
                                                    <option value="<?php echo $invitados['invitado_id']; ?>">
                                                    <?php echo $invitados['nombre_invitado']." ".$invitados['apellido_invitado']; ?>
                                                    </option>
                                        <?php }}
                                          } catch (Exception $e) {
                                              echo "error" .$e->getMessage();
                                          }
                                        ?>
                                    </select>

                                </div>

                                <div class="box-footer">
                                    <input type="hidden" name="registro" value="actualizar">
                                    <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
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

    endif;
 ?>