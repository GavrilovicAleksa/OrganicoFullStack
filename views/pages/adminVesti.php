<main class="mainSingle">
    <div class="main-contentSingle"> 
        <div class="glavniProzivod" id="adminProizvod">
        <a href='index.php?page=vestUnos' class="dodajProizvod">Dodaj Vest</a>
        <?php 
            include "models/news/functions.php";

            $vesti = getAllNews();

            foreach($vesti as $vest):
        ?>
        <p class="proizvodLink">Naziv: <?=$vest->naslov ?>    <span class="izmena"> <a class="obrisi" data-id="<?=$vest->id?>">Obrisi</a> </span></p>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="assets/js/adminNews.js"></script>
</main>