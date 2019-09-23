<?php


header('Content-Type: application/json');

if(isset($_POST['id']) && isset($_POST['naziv'])){
    require_once '../../config/connection.php';

    $id = $_POST['id'];
    $cena = $_POST['cena'];
    $naziv = $_POST['naziv'];
    $opis = $_POST['opis'];
    $sastojci = $_POST['sastojci'];
    $kategorija = $_POST['kategorija'];
    $drzava = $_POST['drzava'];

    $rezultat = $conn->prepare("UPDATE proizvod SET naziv = ?, cena = ?, opis = ?, sastojci = ?, idDrzava = ?, idKategorija = ? WHERE id = ?");

    $rezultat->bindValue(1, $naziv);
    $rezultat->bindValue(2, $cena);
    $rezultat->bindValue(3, $opis);
    $rezultat->bindValue(4, $sastojci);
    $rezultat->bindValue(5, $drzava);
    $rezultat->bindValue(6, $kategorija);
    $rezultat->bindValue(7, $id);

    try {
        $rezultat->execute();
        http_response_code(204); 
    }
    catch(PDOException $ex){
        echo json_encode(['poruka'=> 'Problem sa bazom: ' . $ex->getMessage()]);
        http_response_code(500);
    }
} else {
    http_response_code(400);
}