<footer class="site-footer">
    <div class="contenedor clearfix">
      <div class="footer-informacion">
        <h3>Sobre <span>Webcamp</span></h3>
        <p>Entre los distintos tipos se encuentra el párrafo científico que se caracteriza por contar con procedimientos especiales en la selección, organización y uso de las unidades morfológicas, léxicas, sintácticas y textuales que permiten transmitir de forma óptima la información.</p>
      </div>
      <div class="ultimos-tweets">
        <h3>Ultimos <span>tweets</span></h3>
        <a class="twitter-timeline" data-height="400" data-theme="dark" data-link-color="#fe4918" href="https://twitter.com/Alfredo_Rocke">Tweets by Alfredo_Rocke</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
      <div class="menu">
        <h3>Redes <span>sociales</span></h3>
        <nav class="redes-sociales">
          <a target="_blanck" href="http://www.facebook.com"><i class="fab fa-facebook"></i></a>
          <a target="_blanck" href="http://www.twitter.com"><i class="fab fa-twitter-square"></i></i></a>
          <a target="_blanck" href="http://www.instagram.com"><i class="fab fa-instagram"></i></a>
          <a target="_blanck" href="http://www.youtube.com"><i class="fab fa-youtube"></i></a>
        </nav>
      </div>
    </div>
    <p class="copyright">
      Todos los derechos reservados WEBCAMP 2021.
    </p>

 <!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div style="display:none;">
<div id="mc_embed_signup">
<form action="https://facebook.us19.list-manage.com/subscribe/post?u=fa922831087800772fb91c77e&amp;id=4b8fc8afff" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h2>Suscribete y no te pierdas nada.</h2>
<div class="indicates-required"><span class="asterisk">*</span> Obligatorio</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Correo Electronico <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_fa922831087800772fb91c77e_4b8fc8afff" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
</div>

  </footer>

  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <?php 
      $archivo = basename($_SERVER['PHP_SELF']);
      $pagina = str_replace(".php", "", $archivo);
      if ($pagina == "invitados_code" || $pagina == "index") {
        echo '<script src="js/jquery.colorbox-min.js"></script>';
      }elseif ($pagina == "conferencia") {
        echo '<script src="js/lightbox.js"></script>';
      }elseif ($pagina == "invitados") {
        echo '<script src="js/jquery.colorbox-min.js"></script>';
        echo '<script src="js/lightbox.js"></script>';
      }
  ?>
  <script src="js/main.js"></script>
  <script src="js/cotizador.js"></script>
  <script src="admin/js/icheck.min.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview');
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
  <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us19.list-manage.com","uuid":"fa922831087800772fb91c77e","lid":"4b8fc8afff","uniqueMethods":true}) })</script>
  
<?php
	// // Guarda todo el contenido a un archivo
	// $fp = fopen($archivoCache, 'w');
	// fwrite($fp, ob_get_contents());
	// fclose($fp);
	// // Enviar al navegador
	// ob_end_flush();
?>
</body>

</html>
