<?php

require_once "config.php";
try {
    
    zabeleziPristup();

    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo $ex->getMessage();
}

function executeQuery($query){
    global $conn;
    return $conn->query($query)->fetchAll();
}

function executeQueryOneRow($query){
    global $conn;
    return $conn->query($query)->fetch();
}

function zabeleziPristup(){
    if(isset($_GET['page'])){
        $file = fopen(BASE_URL . "data/log.txt", "r+");

        $niz = file(BASE_URL . "data/log.txt");
        $string = "";
        foreach($niz as $deoNiza){
            $noviNiz = explode("&",$deoNiza);
            if($noviNiz[0] == $_GET['page']){

                $noviNiz[1] = (int)$noviNiz[1] + 1;
                $noviRed = implode("&", $noviNiz);
                $string .= trim($noviRed) . "\n";
            }
            else{
                $string .= trim($deoNiza)."\n";
            }
        }
        fwrite($file, $string);
        
        fclose($file);
    }
} 