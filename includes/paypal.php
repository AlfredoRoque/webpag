<?php

require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost/webpag');

// cargar el SDK de paypal

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AZLocmyOY7TRDHi_K0ZCb2oPT-rcphT6hiS39rN-OOqd6Rjss-aJviUllF-0qmC7gvvrSUHM66CG-KbU',// ClienteID
        'EIIWi8lMW4oZ5hHuojU_1c_zVTmK78m2qbkiewsWvpE9cX5xHvijkXr2r82v_796HM2358HYd--Kg4ek'// Secret
    )
);
