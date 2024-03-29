<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
$id = $_GET['id'];

// Validar que se reciba un id entero
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
            Editar Administrador
            <small>Datos para editar un administrador</small>
        </h1>
    </section>

    <div class="row">
        <div class="col-md-8">

            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Admistrador</h3>
                    </div>
                    <div class="box-body">
                    <?php
                          $sql = "SELECT * FROM admins WHERE id_admin = $id ";
                          $resultado = $conn->query($sql);
                          $admin = $resultado->fetch_assoc();
                    ?>

                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <input type="texto" class="form-control" id="usuario"
                                       name="usuario" placeholder="Usuario" value="<?php echo $admin['usuario']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="texto" class="form-control" id="nombre"
                                       name="nombre" placeholder="Nombre" value="<?php echo $admin['nombre']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="password"
                                       name="password" placeholder="Contraseña">
                                </div>
                            </div>
                            <!-- /.box-body -->

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

 ?>