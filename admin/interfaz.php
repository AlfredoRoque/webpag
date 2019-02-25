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
            Home
            <small>Información sobre el evento</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <h2 class="pagw-header">Estadisticas de Registrados</h2>
        <div class="row">
            <div class="box-body chart-responsive">
              <div class="chart" id="grafica-registros" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
            <?php 
                  
                  $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados";
                  $resultado = $conn->query($sql);
                  $registrados = $resultado->fetch_assoc();

             ?>
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>

                        <p>Total Registrados</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-users"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
            <?php 
                  
                  $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 1";
                  $resultado = $conn->query($sql);
                  $registrados = $resultado->fetch_assoc();

             ?>
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>

                        <p>Pagado</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-check-square"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
            <?php 
                  
                  $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 0";
                  $resultado = $conn->query($sql);
                  $registrados = $resultado->fetch_assoc();

             ?>
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>

                        <p>Sin pagar</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-user-times"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
            <?php 
                  
                  $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE pagado = 1";
                  $resultado = $conn->query($sql);
                  $registrados = $resultado->fetch_assoc();

             ?>
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $registrados['ganancias']; ?></h3>

                        <p>Ganancias Totales</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-dollar"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- ./col -->

        <h2 class="pagw-header">Regalos</h2>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
            <?php 
                  
                  $sql = "SELECT COUNT(regalo) AS pulseras FROM registrados WHERE regalo = 1 and pagado = 1";
                  $resultado = $conn->query($sql);
                  $registrados = $resultado->fetch_assoc();

             ?>
                <!-- small box -->
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3><?php echo $registrados['pulseras']; ?></h3>

                        <p>Pulseras Totales</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 col-xs-6">
            <?php 
                  
                  $sql = "SELECT COUNT(regalo) AS etiquetas FROM registrados WHERE regalo = 2 and pagado = 1";
                  $resultado = $conn->query($sql);
                  $registrados = $resultado->fetch_assoc();

             ?>
                <!-- small box -->
                <div class="small-box bg-lime">
                    <div class="inner">
                        <h3><?php echo $registrados['etiquetas']; ?></h3>

                        <p>Etiquetas Totales</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
            <?php 
                  
                  $sql = "SELECT COUNT(regalo) AS plumas FROM registrados WHERE regalo = 3 and pagado = 1";
                  $resultado = $conn->query($sql);
                  $registrados = $resultado->fetch_assoc();

             ?>
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3><?php echo $registrados['plumas']; ?></h3>

                        <p>Plumas Totales</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include_once 'templates/footer.php';

 ?>