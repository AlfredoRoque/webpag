<?php 

if(!isset($_POST['submit'])){
    exit('Hubo un error');
}
// Metodos de paypal que se van a utilizar
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require 'includes/paypal.php';

if(isset($_POST['submit'])): 
    $nombre =$_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $fecha = date('Y-m-d H:i:s');  
    //  Pedidios
    $boletos = $_POST['boletos'];
    $numero_boletos = $boletos;
    $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
    $precioCamisa = $_POST['pedido_extra']['camisas']['precio'];
    $pedidoExtra = $_POST['pedido_extra'];
    $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
    $precioEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];
    include_once 'includes/funciones/funciones.php';
    $pedido = productos_json($boletos,$camisas,$etiquetas);
    // eventos
    $eventos = $_POST['registro'];
    $registro = eventos_json($eventos);

    
/*
    exit;


*/
    try{
      require_once('includes/funciones/db_conexion.php');
      $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
      $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
      $stmt->execute();
      $ID_registro = $stmt->insert_id;
      $stmt->close();
      $conn->close();
      header('Location: validar_registro.php?exitoso=1');
    }catch(Exception $e){
      $error = $e->getMessage();
    } 
endif;

// obtener los datos de la compra


// metodo de pago del comprador
$compra = new Payer();
$compra->setPaymentMethod('paypal');


// datos de cada articulo que se comprara
$articulo = new Item();
$articulo->setName($producto)
         ->setCurrency('MXN')
         ->setQuantity(1)
         ->setPrice($precio);

$i = 0;
$arreglo_pedido = array();
foreach ($numero_boletos as $key => $value) {
    if((int) $value['cantidad'] > 0){
        ${"articulo$i"} = new Item();
        $arreglo_pedido[] = ${"articulo$i"};
        ${"articulo$i"}->setName('Pase: ' . $key)
                       ->setCurrency('MXN')
                       ->setQuantity((int) $value['cantidad'])
                       ->setPrice((int) $value['precio']);
        $i++;
    }
}

foreach ($pedidoExtra as $key => $value) {
    if((int) $value['cantidad'] > 0){
        if($key == 'camisas'){
            $precio = (float) $value['precio'] * .93;
        }else{
            $precio = (int) $value['precio'];
        }
        ${"articulo$i"} = new Item();
        $arreglo_pedido[] = ${"articulo$i"};
        ${"articulo$i"}->setName('Pase: ' . $key)
                       ->setCurrency('MXN')
                       ->setQuantity((int) $value['cantidad'])
                       ->setPrice($precio);
        $i++;
    }
}

// Guardar en una lista todos los articulos que se compraran
$listaArticulos = new ItemList();
$listaArticulos->setItems($arreglo_pedido);


// monto a pagar
$cantidad = new Amount();
$cantidad->setCurrency('MXN')
         ->setTotal($total);

// Transaccion
$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
            ->setItemList($listaArticulos)
            ->setDescription('Pago')
            ->setInvoiceNumber($ID_registro);

// Redireccionar a la pagina
$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?&id_pago={$ID_registro}")
              ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?&id_pago={$ID_registro}");

// 
$pago = new Payment();
$pago->setIntent("sale")
     ->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion));

try {
    $pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
    echo "<pre>";
    print_r(json_decode($pce->getData()));
    exit;
    echo "</echo>";
}

$aprobado = $pago->getApprovalLink();

header("Location: {$aprobado}");