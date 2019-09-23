<?php
    if(!isset($_GET['id'])){
        header("Location: index.php");
    }
    include "models/products/functions.php";
    $proizvod = getOneProduct($_GET['id']);
?>
<main class="mainSingle">
    <div class="main-contentSingle main-proizvodi"> 

        <div class="glavniProzivod">
            <h1><?=$proizvod->naziv?></h1><h1 class="cena"><?=$proizvod->cena?><h1>
            <div class="slikaOmot">
            <img src="<?=$proizvod->velika ?>"class="slicka">
            </div>
            <div class="infoProizvod">
            <ul class="opisProizvod">
                <li>Zemlja porekla:<?=$proizvod->drzava?></li>
                <li>Opis: <?=$proizvod->opis?></li>
                <li>Sastojci: <?=$proizvod->sastojci ?></li>
                <li id="rezultat"></li>
                <?php 
                    if(isset($_SESSION['korisnik'])):
                ?>
                <a id="Korpa" class="korpaBtn" data-id="<?=$proizvod->proizvodId?>" data-naziv="<?=$proizvod->naziv?>" data-korisnik="<?=$_SESSION['korisnik']->id ?>">Dodajte u korpu</a>
                <?php 
                    else:
                ?>
                <a class="korpaBtn" href="index.php?page=login">Morate biti Ulogovani!</a>
                    <?php endif; ?>
            </ul>
            </div>
       </div>    
       <div>
    </div>
    <script type="module" src="assets/js/singleProduct.js" type="text/javascript"></script>
</main>