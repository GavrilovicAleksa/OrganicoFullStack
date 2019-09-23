<?php
if(isset($_GET['str'])){
    include "../../config/connection.php";
    include "functions.php";
    $vrednost = $_GET['str'];
    $broj = $_GET['num'] -1;

    $rezultat;

    switch($vrednost){
        case "cenaRastuce" :
            $rezultat = cenaRastuce($broj);
            break;
        case "cenaOpadajuce" :
            $rezultat = cenaOpadajuce($broj);
            break;
        case "nazivRastuce":
            $rezultat = nazivRastuce($broj);
            break;
        case "nazivOpadajuce":
            $rezultat = cenaRastuce($broj);
            break;
    }
    echo json_encode($rezultat);
}
