<?php
    session_start();
    if(isset($_POST['idKorisnik'])){
        require_once '../../config/connection.php';
        $rezultat = $conn->prepare("SELECT * FROM korpa_artikal WHERE idProizvod = :idProizvod AND idKorisnik = :idKorisnik");
        $rezultat->bindParam(":idKorisnik", $_POST['idKorisnik']);
        $rezultat->bindParam(":idProizvod", $_POST['idProizvod']);
        try{
        $rezultat->execute();
        if($rezultat->rowCount() == 1){
            $artikal = $rezultat->fetch();
            $kolicina = $artikal->kolicina;
            $kolicina =$kolicina + 1;
            $rezultat2 = $conn->prepare("UPDATE korpa_artikal SET kolicina = :kolicina WHERE idProizvod = :idProizvod AND idKorisnik = :idKorisnik");
            $rezultat2->bindParam(":kolicina", $kolicina);
            $rezultat2->bindParam(":idKorisnik", $_POST['idKorisnik']);
            $rezultat2->bindParam(":idProizvod", $_POST['idProizvod']);
            $rezultat2->execute();
            http_response_code(200);
            echo json_encode("Proizvod dodat u korpu!");
        }
        else{
            $rezultat3 = $conn->prepare("INSERT INTO korpa_artikal VALUES(null, :idKorisnik, :idProizvod, 1)");
            $rezultat3->bindParam(":idKorisnik", $_POST['idKorisnik']);
            $rezultat3->bindParam(":idProizvod", $_POST['idProizvod']);
            $rezultat3->execute();
            http_response_code(200);
            echo json_encode("Proizvod dodat u korpu!");
        }
        }
        catch(PDOexception $e){
            http_response_code(500);
            echo json_encode($e);
        }
    }
    