<?php

header("Content-Type: application/json");

if(isset($_GET['limit'])){
    require_once "../../config/connection.php";
    include "functions.php";

    $limit = $_GET['limit'];
    $news = getNews($limit);
    $numNews = paginationNum();

    echo json_encode([
        "news" => $news,
        "numNews" => $numNews
    ]);
} else {
    echo json_encode(["message"=> "Limit not passed."]);
    http_response_code(400);
}