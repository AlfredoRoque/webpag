<?php include_once 'includes/templetes/header.php'; 

use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;
require 'includes/paypal.php';
// ocultar notice
error_reporting(E_ALL ^ E_NOTICE);
?>

<section class="seccion contenedor">
        <h2>Resumen Registro</h2>
                 <?php
                  $id_pago = $_GET['id_pago'];
                  $paymentId = $_GET['paymentId'];
                  // peticion a REST API
                if($paymentId){
                  $pago = Payment::get($paymentId, $apiContext);
                  $execution = new PaymentExecution();
                  $execution->setPayerId($_GET['PayerID']);

                  // Resultado que contiene la informacion de la transaccion
                  $resultado = $pago->execute($execution, $apiContext);

                  $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;

                  if($respuesta == "completed"){

                      echo "<div class='resultado correcto'>";
                      echo "El pago se realizo correctamente </br>";
                      echo "El ID de pago es: {$paymentId}";
                      echo "</div>";

                      require_once('includes/funciones/db_conexion.php');
                      $stmt = $conn->prepare('UPDATE registrados SET pagado = ? WHERE ID_registrado = ? ');
                      $pagado = 1;
                      $stmt->bind_param('ii', $pagado, $id_pago);
                      $stmt->execute();
                      $stmt->close();
                      $conn->close();
                  }
                }else{
                  
                  echo "<div class='resultado error'>";
                  echo "El pago no se realizo";
                  echo "</div>";
              }
               ?>
</section>   


<?php include_once 'includes/templetes/footer.php'; ?>