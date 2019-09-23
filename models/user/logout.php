<?php
    session_start();
    if(isset($_SESSION['korisnik'])){
        unset($_SESSION['korisnik']);
        header("location: ../../index.php");
        $fajl = fopen("../../data/userCount.txt", "r");
                $vrednost = fread($fajl, filesize("../../data/userCount.txt"));
                $upise = $vrednost - 1;
                $fajl2 = fopen("../../data/userCount.txt", "r");
                fwrite($fajl2, $upise);
                fclose($fajl);
                fclose($fajl2);
    }