<?php
  //   // Creando un archivo cahe para la vista del front-end
  //   // Definir un nombre para cachear
  //   $archivo = basename($_SERVER['PHP_SELF']);
  //   $pagina = str_replace(".php", "", $archivo);
  //   // Definir archivo para cachear (puede ser .php también)
	// $archivoCache = 'cache/'.$pagina.'.php';
	// // Cuanto tiempo deberá estar este archivo almacenado
	// $tiempo = 36000;
	// // Checar que el archivo exista, el tiempo sea el adecuado y muestralo
	// if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
  //  	include($archivoCache);
  //   	exit;
	// }
	// // Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
	// ob_start();
?>
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
      if ($pagina == "invitados" || $pagina == "index") {
        echo '<link rel="stylesheet" href="css/colorbox.css">';
      }elseif ($pagina == "conferencia") {
        echo '<link rel="stylesheet" href="css/lightbox.css">';
      }
  ?>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="admin/css/all.css">
</head>

<body class="<?php echo $pagina; ?>">
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a target="_blanck" href="http://www.twitter.com"><i class="fab fa-twitter-square"></i></i></a>
          <a target="_blanck" href="http://www.facebook.com"><i class="fab fa-facebook"></i></a>
          <a target="_blanck" href="http://www.instagram.com"><i class="fab fa-instagram"></i></a>
          <a target="_blanck" href="http://www.youtube.com"><i class="fab fa-youtube"></i></a>
        </nav>
        <div class="informacion-evento">
          <div class="clearfix">
             <p class="fecha"><i class="far fa-calendar-alt"></i> 10-12 Dic</p>
             <p class="ciudad"><i class="fas fa-map-marked-alt"></i> Toluca, MX</p>
          </div>
          <h1 class="nombre-sitio">WEB CAMP</h1>
          <p class="slogan">Una gran conferencia de<span> programación</span></p>
        </div>
      </div><!--informacion del evento-->
        
    </div><!--hero-->
  </header>
  <!--barra de navegacion principal-->
  <div class="barra">
    <div class="contenedor clearfix">
      <div class="logo">
        <a href="index.php">
        <img src="img/logor.svg" alt="logo Proyecto">
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
        <a target="_blank" class="navegacion-principal clearfix" href="admin/login.php">Administrar</a>
      </nav>
    </div><!--contenedor-->
  </div><!--barra-->