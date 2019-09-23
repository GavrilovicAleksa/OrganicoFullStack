<?php 
    if(isset($_GET['marker'])){
        include "../../config/connection.php";
        $rezultat = executeQuery("SELECT * FROM grad");
        echo json_encode($rezultat);
        http_response_code(200);
    }