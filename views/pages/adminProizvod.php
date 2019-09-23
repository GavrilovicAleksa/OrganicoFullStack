<main class="mainSingle">
    <div class="main-contentSingle"> 
        <div class="glavniProzivod" id="adminProizvod">
        <a href='index.php?page=proizvodUnos' class="dodajProizvod">Dodaj Proizvod</a>
        <?php 
            include "models/products/functions.php";

            $proizvodi = getAllProducts();

            foreach($proizvodi as $proizvod):
        ?>
        <p class="proizvodLink">Naziv: <?=$proizvod->naziv ?>, Cena: <?=$proizvod->cena?>       <span class="izmena"> <a href="index.php?page=updateProduct&id=<?=$proizvod->id?>">Izmeni</a> <a class="obrisi" data-id="<?=$proizvod->id?>">Obrisi</a> </span></p>
            <?php endforeach; ?>
            <a href="models/products/exportEXCEL.php" class="dodajProizvod">Export u excel</a>
        </div>
    </div>
    <script src="assets/js/adminProduct.js"></script>
</main>