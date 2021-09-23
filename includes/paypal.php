<?php

require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost/webpag');

// cargar el SDK de paypal

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AU9Ljunp1H6XknA1GxydPTMfzgbsfxXLHpbn7BhMzgGPRwUDzG-8qEsTA-el4ApMZZY7vGtfZ-mB9ewy',// ClienteID
        'ECklYLI7MY9tHy6qdRWxxg8Wbsct4ftxxCEcJK1Mckci-utBicA_buLaa1B4TgDSYofzKi9oHe6PRtAK'// Secret
    )
);
