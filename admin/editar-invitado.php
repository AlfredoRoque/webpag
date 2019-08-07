<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
// Validar que se reciba un id entero
$id = $_GET['id'];
if(!filter_var($id, FILTER_VALIDATE_INT)){
    die('ERROR');
}
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
            Editar Invitados
            <small>Modifica datos de un invitado</small>
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
                        <h3 class="box-title">Edita invitado</h3>
                    </div>
                    <div class="box-body">
                        <?php 
                             $sql = " SELECT * FROM invitados WHERE invitado_id = $id ";
                             $resultado = $conn->query($sql);
                             $invitado = $resultado->fetch_assoc();
                             

                        ?>

                    <!-- enctype se utiliza para subir archivos-->
                        <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post"
                            action="modelo-invitados.php" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nombre_invitado">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre_invitado"
                                        name="nombre_invitado" placeholder="Nombre del invitado" 
                                        value="<?php echo $invitado['nombre_invitado']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="apellido_invitado">Apellido:</label>
                                    <input type="text" class="form-control" id="apellido_invitado"
                                        name="apellido_invitado" placeholder="Apellido del invitado" 
                                        value="<?php echo $invitado['apellido_invitado']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="biografia_invitado">Biografia:</label>
                                    <textarea class="form-control" name="biografia_invitado" id="biografia_invitado" 
                                    cols="8" placeholder="Biografia" style="height:200px;"><?php echo $invitado['descripcion']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="testimonial_invitado">Testimonial:</label>
                                    <textarea class="form-control" style="height:200px;" name="testimonial_invitado" id="testimonial_invitado" cols="8" placeholder="Testimonial"> <?php echo $invitado['testimonial']; ?> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="twiter_invitado">Twiter:</label>
                                    <input type="text" class="form-control" name="twiter_invitado" id="twiter_invitado" cols="8" placeholder="Twiter" value="<?php echo $invitado['twiter']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="imagen_actual">Imagen actual</label>
                                    <br>
                                    <img src="../img/invitados/<?php echo $invitado['url_imagen']; ?>" width="200">
                                </div>
                                <div class="form-group">
                                    <label for="imagen_invitado">Imagen</label>
                                    <input type="file" id="imagen_invitado" name="archivo_imagen">
                                    <p class="help-block">Agrege una foto del invitado.</p>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="registro" value="actualizar">
                                <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                                <button type="submit" class="btn btn-primary" id="crear_registro">Enviar</button>
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