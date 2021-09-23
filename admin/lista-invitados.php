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
        Lista de Invitados
        <small>Todos los Invitados</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Gestiona a los invitados.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Foto</th>
                  <th>Testimonial</th>
                  <th>Twiter</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                   <?php
                        try {
                            $sql = "SELECT * FROM invitados ";
                            $resultado = $conn->query($sql);
                        } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                        }
                        while($invitado = $resultado->fetch_assoc()) { ?>
                                 <tr>
                                     <td><?php echo $invitado['nombre_invitado']." ".$invitado['apellido_invitado']; ?></td>
                                     <td><?php echo $invitado['descripcion']; ?></td>
                                     <td><img src="../img/invitados/<?php echo $invitado['url_imagen']; ?>" width="150"></td>
                                     <td><?php echo $invitado['testimonial']; ?></td>
                                     <td><?php echo $invitado['twiter']; ?></td>
                                     <td>
                                        <a href="editar-invitado.php?id=<?php echo $invitado['invitado_id']; ?>" class="btn bg-orange btn-flat margin">
                                           <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $invitado['invitado_id']; ?>" data-tipo="invitados" class="btn bg-maroon margin borrar-registro">
                                           <i class="fa fa-trash"></i>
                                        </a>
                                     </td>
                                 </tr>
                       <?php }  ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>foto</th>
                  <th>Acciones</th>
                  <th>Testimonial</th>
                  <th>Twiter</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php

include_once 'templates/footer.php';

 ?>