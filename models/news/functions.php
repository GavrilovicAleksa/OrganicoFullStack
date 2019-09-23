<?php 

function getAllNews(){
    return executeQuery("SELECT * FROM vest");
}

DEFINE("NEWS_NUM", 5);

function getNews($limit = 0){
    global $conn;
    try{
        $select = $conn->prepare("SELECT * FROM vest LIMIT :limit, :news_count");

        $limit = ((int) $limit) * NEWS_NUM;

        $select->bindParam(":limit", $limit, PDO::PARAM_INT); 

        $news_count = NEWS_NUM;
        $select->bindParam(":news_count", $news_count, PDO::PARAM_INT);

        $select->execute(); 

        $news = $select->fetchAll();

        return $news;
    }
    catch(PDOException $ex){
        return null;
    }
}
function countNews(){
    return executeQueryOneRow("SELECT COUNT(*) AS num_of_news FROM vest");
}
function paginationNum(){

    $result = countNews();

    $numOfNews = $result->num_of_news;

    return ceil($numOfNews / NEWS_NUM);
}

function newsInsert($naslov,$sadrzaj){
    global $conn;
    $insert = $conn->prepare("INSERT INTO vest VALUES('', ?, ?)");
    $isInserted = $insert->execute([$naslov,$sadrzaj]);
    return $isInserted;
}