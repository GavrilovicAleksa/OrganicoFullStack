<?php
    header('Content-Type: application/json');
if(isset($_POST['korIme']) && isset($_POST['sifra'])){
        include "../../config/connection.php";
        include "functions.php";

         $reKorIme = '/^[\w]{3,19}$/';
         $reSifra = '/^[\w]{3,19}$/';
         $reIme = '/^[A-Z]{1}[a-z]{3,12}$/';
         $rePrezime = '/^[A-Z]{1}[a-z]{3,15}$/';
         $reEmail = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
         $reUlica = '/^[\w\s]{4,25}$/';

        $korIme = $_POST['korIme'];
        $sifra = md5(trim($_POST['sifra']));
        $email = $_POST['email'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $grad = $_POST['gradVrednost'];
        $ulica = $_POST['ulica'];

        $nizGreske = [];

        if(userExists($korIme) == 1){
            $nizGreske[] = "Uneli ste postojece korisnicko ime.";
        } 
        if(emailExists($email)==1){
            $nizGreske[] = "Uneli ste postojeci email.";
        }
        if(!preg_match($reKorIme, $korIme)){
            $nizGreske[] = "Korisnicko ime je u losem formatu!";
        }
        if(!preg_match($reIme, $ime)){
            $nizGreske[] = "Ime je u losem formatu!";
        }
        if(!preg_match($rePrezime, $prezime)){
            $nizGreske[] = "Prezime je u losem formatu!";
        }
        if(!preg_match($reEmail, $email)){
            $nizGreske[] = "Email je u losem formatu!";
        }
        if($grad < 1){
            $nizGreske[] = "Morate izabrati grad!";
        }
        if(!preg_match($reUlica, $ulica)){
            $nizGreske[] = "Ulica je u losem formatu!";
        }
        if(count($nizGreske) > 0){
            echo json_encode($nizGreske);
            http_response_code(500);
        }
        else{
            $rezultat = $conn->prepare("INSERT INTO korisnik VALUES (NULL, ?, ? , ? , ? , ?, ?, ?, ?)");
            try{
                $rezultat->execute( [ $korIme, $email, $sifra, $ime, $prezime, $ulica, $grad, 456] );
                http_response_code(201);
                echo json_encode(["uspeh"=> "Uspesna registracija!"]);
               
            }
            catch(PDOException $ex){
                echo json_encode(['poruka'=> 'Problem sa bazom: ' . $ex->getMessage()]);
                http_response_code(500);
            }
        }
}

