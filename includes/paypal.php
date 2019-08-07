<?php

require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost/webpag');

// cargar el SDK de paypal

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AQO77Z7zhXWRUeI5lqX_7xjHCoXPN5nDPsBE1ERaM_z1fYcflP8gM2GzvfYD0qsDvzAG-77voiNvsanw',// ClienteID
        'EHzniuEhzQ2PX3PcbjS5fg6fX2s1ilZGBgVOFIT-GOcRjUI9_N83VrT8GjTEpAP24rZzKHNFfgFVKPDw'// Secret
    )
);
