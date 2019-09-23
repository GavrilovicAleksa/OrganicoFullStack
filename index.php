<?php 
   
    $_SESSION['korpa'] = array();
    include "config/connection.php";
    include "views/fixed/head.php"; 
    include "views/fixed/header.php"; 
    include "views/fixed/nav.php"; 
                
    if(isset($_GET['page'])){
        switch($_GET['page']){
            case "pocetna":
                include "views/pages/pocetna.php";
                break;
            case "onama":
                include "views/pages/onama.php";
                break;
            case "kontakt":
                include "views/pages/kontakt.php";
                break;
            case "login" :
                include "views/pages/login.php";
                break;
            case "registracija" :
                include "views/pages/registracija.php";
                break;    
            case "proizvodi" :
                include "views/pages/proizvodi.php";
                break;
            case "adminProizvod" :
                include "views/pages/adminProizvod.php";
                break;
            case "adminVesti" :
                include "views/pages/adminVesti.php";
                break; 
            case "adminKorisnici" :
                include "views/pages/adminKorisnici.php";
                break;        
            case "proizvodUnos" :
                include "views/pages/proizvodUnos.php";
                break;
            case "vestUnos" :
                include "views/pages/vestUnos.php";
                break; 
            case "korisnikUnos" :
                include "views/pages/korisnikUnos.php";
                break;         
            case "updateProduct" :
                include "views/pages/updateProduct.php";
                break; 
            case "izmeniKorisnika" :
                include "views/pages/izmeniKorisnika.php";
                break; 
            case "statistika" :
                include "views/pages/statistika.php";
                break; 
            case "kolica" :
                include "views/pages/kolica.php";
                break;               
            case "singleProduct":
                if(isset($_GET['id'])){
                    include 'views/pages/singleProduct.php';
                }    
                break;
            default :
                include "views/pages/pocetna.php";
                break;  
        }
    }
    else{
        include "views/pages/pocetna.php";
    }
                
include "views/fixed/footer.php"; 