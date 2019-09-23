<?php 
    session_start();
    header('Content-Type: application/json');
    if(isset($_GET['korIme']) && isset($_GET['sifra'])){
        include "../../config/connection.php";
        include "functions.php";

        $korIme = $_GET['korIme'];
        $sifra = md5(trim($_GET['sifra']));

        if(userExists($korIme) == 0){
            echo json_encode(['message'=> "Uneli ste nepostojece korisnicko ime.", 'num' => 0]);
            http_response_code(500);
            $korisnik = specificUserName($korIme);
            $msg = "Postovani ".$korisnik->ime." Da li ste vi pokusali da se ulogujete na vas email? Molimo kontaktirajte naseg administratora ako imate problema sa logovanjem";

                $msg = wordwrap($msg,70);


                mail($korisnik->email,"Pokusaj pristupa nalogu",$msg);
        }   
        else{
            $res = $conn->prepare("SELECT * FROM korisnik WHERE korisnickoIme = :korIme AND sifra = :sifra");
            $res->bindParam(":korIme", $korIme);
            $res->bindParam(":sifra", $sifra);
            $res->execute();
            $brojRedova = $res->rowCount();
            if($brojRedova == 0){
                echo json_encode(['message'=> "Uneli ste pogresnu sifru.", 'num' => 1]);
                http_response_code(500);
                
            }
            else if($brojRedova == 1){
                echo json_encode(['message'=> "Uspesno logovanje!"]);
                http_response_code(200);
                $_SESSION['korisnik'] = $res->fetch();
                $fajl = fopen("../../data/userCount.txt", "r");
                $vrednost = fread($fajl, filesize("../../data/userCount.txt"));
                $upise = $vrednost + 1;
                $fajl2 = fopen("../../data/userCount.txt", "r");
                fwrite($fajl2, $upise);
                fclose($fajl);
                fclose($fajl2);
            }
        }
    }
    else{
        header("location: ../../index.php");
    }
