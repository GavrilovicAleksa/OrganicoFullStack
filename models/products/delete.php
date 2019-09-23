<?php

header('Content-Type: application/json');

if(isset($_GET['id'])){
    include "functions.php";
    require_once '../../config/connection.php';

    $id = $_GET['id'];
    $rezultat = $conn->prepare("DELETE FROM proizvod WHERE id = ?");
    $rezultat->bindValue(1, $id);

    try {
        $rezultat->execute();
        http_response_code(200); // 204 - Success and No content (Nothing to return)
        $products = getAllProducts();
        echo json_encode($products);
    }
    catch(PDOException $ex){
        echo json_encode(['poruka'=> 'Problem sa bazom: ' . $ex->getMessage()]);
        http_response_code(500);
    }
} else {
    http_response_code(400); // 400 - Bad request
}