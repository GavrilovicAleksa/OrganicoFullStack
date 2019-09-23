<?php 
    if(isset($_GET['pos'])){
        include "../../config/connection.php";

        include "functions.php";

        $rezultat = getAllProducts();

        echo sizeof($rezultat);
    }