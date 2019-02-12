<?php
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
            Crear Administrador
            <small>Datos para crear un administrador</small>
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
                        <h3 class="box-title">Crear Admistrador</h3>

                        <!-- <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div> -->
                    </div>
                    <div class="box-body">
                        <form role="form" name="crear-admin" id="crear-admin" method="post" action="insertar-admin.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <input type="texto" class="form-control" id="usuario"
                                       name="usuario" placeholder="Usuario">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="texto" class="form-control" id="nombre"
                                       name="nombre" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="password"
                                       name="password" placeholder="Contraseña">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="agregar-admin" value="1">
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