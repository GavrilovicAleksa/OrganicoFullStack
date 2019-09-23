<?php
    if(isset($_POST['btnSubmit'])){
        require_once "../../config/connection.php";
        require_once "functions.php";

        $naslov = $_POST['naslov'];
        $sadrzaj = $_POST['sadrzaj'];

        try {

            $isProductInserted = newsInsert($naslov,$sadrzaj);
            if($isProductInserted){
            
            echo "Putanja do slike je upisana u bazu!";
            header("Location: ../../index.php?page=adminVesti");
            }
            
        } catch(PDOException $ex){
            echo $ex->getMessage();
        }

    }