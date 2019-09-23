<?php
    if(isset($_GET['id'])){
        include 'functions.php';
        include '../../config/connection.php';

        $rezultat = $conn->prepare("SELECT * FROM proizvod where idKategorija = :kat");
        $rezultat->bindparam(":kat", $_GET['id']);
        $rezultat->execute();

        echo $rezultat->rowCount();
    }