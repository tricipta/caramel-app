<?php

ini_set('display_errors', 1);
//error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('UTC');

require "vendor/autoload.php";
require "app.php";

function startResponse($status, $responseHeaders)
{
    header('HTTP/1.1 ' . $status);
    $headers = array('Status' => $status);
    $headers = array_merge($responseHeaders, $headers);
    foreach($headers as $key => $header) {
        header($key . ': ' . $header);
    }
}

$app = new Application();
$fcgiApp = new Caramel\FCGI\FCGIAdapter($app);
$responses = $fcgiApp->run($_SERVER, 'startResponse');

ob_start();
foreach ($responses as $response) {
    echo $response;
}
$output = ob_get_contents();
ob_end_clean();

echo $output;