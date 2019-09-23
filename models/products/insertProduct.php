<?php
    if(isset($_POST['btnSubmit'])){
        require_once "../../config/connection.php";
        require_once "functions.php";

        $nazivNovi = $_POST['naziv'];
        $cena = $_POST['cena'];
        $opis = $_POST['opis'];
        $sastojci = $_POST['sastojci'];
        $kategorija = $_POST['kategorija'];
        $drzava = $_POST['drzava'];

        $fajl_naziv = $_FILES['slika']['name'];
        $fajl_tmpLokacija = $_FILES['slika']['tmp_name'];
        $fajl_tip = $_FILES['slika']['type'];
        $fajl_velicina = $_FILES['slika']['size'];

        $greske = [];

        $dozvoljeni_tipovi = ['image/jpg', 'image/jpeg', 'image/png'];

      

        if(count($greske) == 0){
        
    
            list($sirina, $visina) = getimagesize($fajl_tmpLokacija);
            
            $postojecaSlika = null;
            switch($fajl_tip){
                case 'image/jpeg':
                    $postojecaSlika = imagecreatefromjpeg($fajl_tmpLokacija);
                    break;
                case 'image/png':
                    $postojecaSlika = imagecreatefrompng($fajl_tmpLokacija);
                    break;
            }

            $novaSirina = 105;
            $novaVisina = ($novaSirina/$sirina) * $visina;
    
            $novaSlika = imagecreatetruecolor($novaSirina, $novaVisina);

            imagecopyresampled($novaSlika, $postojecaSlika, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);


            $naziv = time().$fajl_naziv;
            $putanjaNovaSlika = 'assets/images/products/nova_'.$naziv;

            switch($fajl_tip){
                case 'image/jpeg':
                    imagejpeg($novaSlika, '../../'.$putanjaNovaSlika, 75);
                    break;
                case 'image/png':
                    imagepng($novaSlika, '../../'.$putanjaNovaSlika);
                    break;
            }
    
            $putanjaOriginalnaSlika = 'assets/images/products/'.$naziv;
    
            if(move_uploaded_file($fajl_tmpLokacija, '../../'.$putanjaOriginalnaSlika)){
                echo "Slika je upload-ovana na server!";
    
                try {
                    $slika = insert($putanjaOriginalnaSlika, $putanjaNovaSlika);
                    $isProductInserted = productInsert($nazivNovi, $cena, $opis, $sastojci, $kategorija, $drzava, $slika);
                    if($isProductInserted){
                    
                    echo "Putanja do slike je upisana u bazu!";
                    header("Location: ../../index.php?".$isInserted);
                    }
                    
                } catch(PDOException $ex){
                    echo $ex->getMessage();
                }
            }
    }
    }