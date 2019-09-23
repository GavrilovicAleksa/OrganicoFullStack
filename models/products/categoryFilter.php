<?php 
if(isset($_GET['id'])){
        include 'functions.php';
        include '../../config/connection.php';
        header('Content-Type: application/json');
        $kategorije = proizvodFilter($_GET['id'],$_GET['broj']);

        echo json_encode($kategorije);

    }