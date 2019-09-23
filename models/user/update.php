<?php


header('Content-Type: application/json');

if(isset($_POST['id']) && isset($_POST['ime'])){
    require_once '../../config/connection.php';
    $id = $_POST['id'];
    $korisnicko = $_POST['korisnicko'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $grad = $_POST['grad'];
    $ulica = $_POST['ulica'];
    $uloga = $_POST['uloga'];

    $rezultat = $conn->prepare("UPDATE korisnik SET korisnickoIme = ?, ime = ?, prezime = ?, idGrad = ?, ulica = ?, idUloga = ? WHERE id = ?");

    $rezultat->bindValue(1, $korisnicko);
    $rezultat->bindValue(2, $ime);
    $rezultat->bindValue(3, $prezime);
    $rezultat->bindValue(4, $grad);
    $rezultat->bindValue(5, $ulica);
    $rezultat->bindValue(6, $uloga);
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