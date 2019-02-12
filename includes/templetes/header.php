<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
  <?php 
      $archivo = basename($_SERVER['PHP_SELF']);
      $pagina = str_replace(".php", "", $archivo);
      if ($pagina == "invitados_code" || $pagina == "index") {
        echo '<link rel="stylesheet" href="css/colorbox.css">';
      }elseif ($pagina == "conferencia") {
        echo '<link rel="stylesheet" href="css/lightbox.css">';
      }elseif ($pagina == "invitados") {
        echo '<script src="js/jquery.colorbox-min.js"></script>';
        echo '<script src="js/lightbox.js"></script>';
      }
  ?>
  <link rel="stylesheet" href="css/main.css">
</head>

<body class="<?php echo $pagina; ?>">
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="http://www.twitter.com"><i class="fab fa-twitter-square"></i></i></a>
          <a href="http://www.facebook.com"><i class="fab fa-facebook"></i></a>
          <a href="http://www.instagram.com"><i class="fab fa-instagram"></i></a>
          <a href="http://www.youtube.com"><i class="fab fa-youtube"></i></a>
        </nav>
        <div class="informacion-evento">
          <div class="clearfix">
             <p class="fecha"><i class="far fa-calendar-alt"></i> 10-12 Dic</p>
             <p class="ciudad"><i class="fas fa-map-marked-alt"></i> Toluca, MX</p>
          </div>
          <h1 class="nombre-sitio">Proyecto</h1>
          <p class="slogan">Una gran conferenia<span> programacion</span></p>
        </div>
      </div><!--informacion del evento-->
        
    </div><!--hero-->
  </header>
  <!--barra de navegacion principal-->
  <div class="barra">
    <div class="contenedor clearfix">
      <div class="logo">
        <a href="index.php">
        <img src="img/logo.svg" alt="logo Proyecto">
        </a>
      </div>
      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="navegacion-principal clearfix">
        <a href="conferencia.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitado</a>
        <a href="registro.php">Reservaciones</a>
      </nav>
    </div><!--contenedor-->
  </div><!--barra-->