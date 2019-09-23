<?php

define("BASE_URL", $_SERVER['DOCUMENT_ROOT'].'/SajtPraktikumPHP/');

define("SERVER", env("SERVER"));
define("DATABASE", env("DATABASE"));
define("USERNAME", env("USERNAME"));
define("PASSWORD", env("PASSWORD"));

//echo BASE_URL;

function env($parametar){
    $file = file(BASE_URL . "config/.env");

    $vrednost = "";

    foreach($file as $red){
        $podaci = explode("=", trim($red));
        if($parametar == $podaci[0]){
            $vrednost = $podaci[1];
        }
    }
    return $vrednost;

}