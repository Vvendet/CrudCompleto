<?php

use App\App;
use App\Lib\Erro;

session_start();

error_reporting(E_ALL & ~E_NOTICE);

require_once("vendor/autoload.php");

try {
    $app = new App();
    $app->run();
}catch (\Exception $e){
    $oError = new Erro($e);
    $oError->render();
}