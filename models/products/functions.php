<?php

function getAllProducts(){
    return executeQuery("SELECT * From proizvod");
}
function getOneProduct($id){
    global $conn;
    try {
        $select = $conn->prepare("SELECT p.id AS proizvodId, p.naziv as naziv, p.opis, p.sastojci, p.cena,s.velika,d.naziv AS drzava FROM proizvod p INNER JOIN slika s ON p.idSlika = s.id INNER JOIN drzava d ON p.idDrzava = d.id WHERE p.id = ?");
        $select->execute([$id]);

        $proizvod = $select->fetch();
        
        return $proizvod;
    } catch(PDOException $ex){
        return $ex;
    }
}
define("UPIT","SELECT p.naziv,p.cena,s.mala,p.id FROM proizvod p INNER JOIN slika s ON p.idSlika = s.id");
function cenaRastuce($num){
    global $conn;
    $rezultat = $conn->prepare(UPIT." ORDER BY p.cena LIMIT :num,9");
    $rezultat->bindParam(":num", $num, PDO::PARAM_INT);
    $rezultat->execute();
    return $rezultat->fetchAll();
}
function cenaOpadajuce($num){
    global $conn;
    $rezultat = $conn->prepare(UPIT." ORDER BY p.cena DESC LIMIT :num,9");
    $rezultat->bindParam(":num", $num, PDO::PARAM_INT);
    $rezultat->execute();
    return $rezultat->fetchAll();
}
function nazivRastuce($num){
    global $conn;
    $rezultat = $conn->prepare(UPIT." ORDER BY p.naziv LIMIT :num,9");
    $rezultat->bindParam(":num", $num, PDO::PARAM_INT);
    $rezultat->execute();
    return $rezultat->fetchAll();
}
function nazivOpadajuce($num){
    global $conn;
    $rezultat = $conn->prepare(UPIT." ORDER BY p.naziv DESC LIMIT :num,9");
    $rezultat->bindParam(":num", $num, PDO::PARAM_INT);
    $rezultat->execute();
    return $rezultat->fetchAll();
}

function proizvodFilter($id,$broj){
    $broj = (int) $broj - 1;
    global $conn;
    $rezultat = $conn->prepare("SELECT p.naziv, p.id as id, p.cena, s.mala FROM proizvod p INNER JOIN slika s ON p.idSlika = s.id WHERE p.idKategorija = :id LIMIT ".$broj.",9");
    try{
        $rezultat->bindparam(":id",$id);
       // $rezultat->bindparam(":broj",$broj);
        $rezultat->execute();
        return $rezultat->fetchAll();
    }
    catch(PDOException $e){
        return $e;
    }
}

function getAllCategories(){
    return executeQuery("SELECT * FROM kategorija");
}
function getAllCountries(){
    return executeQuery("SELECT * FROM drzava");
}

function insert($putanjaOriginalnaSlika, $putanjaNovaSlika){
    global $conn;
    $insert = $conn->prepare("INSERT INTO slika VALUES('', ?, ?)");
    $isInserted = $insert->execute([$putanjaOriginalnaSlika, $putanjaNovaSlika]);
    return $conn->lastInsertId();
}
function productInsert($nazivNovi, $cena, $opis, $sastojci, $kategorija, $drzava, $slika){
    global $conn;
    $insert = $conn->prepare("INSERT INTO proizvod VALUES('', ?, ?, ?, ?, ?, ?, ?)");
    $isInserted = $insert->execute([$nazivNovi, $cena, $opis, $sastojci, $drzava, $slika, $kategorija]);
    return $isInserted;
}
