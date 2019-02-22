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
            Editar Categoria
            <small>Datos para editar una categoria de evento</small>
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
                        <h3 class="box-title">Editar Categoria</h3>

                        <!-- <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div> -->
                    </div>
                    <div class="box-body">
                    
                    <?php 
                        $sql = " SELECT * FROM categoria_evento WHERE id_categoria = $id ";
                        $resultado = $conn->query($sql);
                        $categoria = $resultado->fetch_assoc();

                    ?>

                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="usuario">Categoria:</label>
                                    <input type="texto" class="form-control" id="nombre_categoria"
                                       name="nombre_categoria" placeholder="Nombre de la categoria" 
                                       value="<?php echo $categoria['cat_evento']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Icono:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-address-book"></i>
                                        </div>
                                        <input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa-icon" 
                                        value="<?php echo $categoria['icono']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="registro" value="actualizar">
                                <input type="hidden" name="id_registro" value="<?php echo $id; ?>" >
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