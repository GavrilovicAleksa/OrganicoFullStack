<main class="mainSingle">
    <div class="main-contentSingle"> 
        <div class="glavniProzivod" id="adminProizvod">
        <a href='index.php?page=korisnikUnos' class="dodajProizvod">Dodaj Korsnika</a>
        <?php 


            $korisnici = executeQuery("SELECT k.*, u.id AS ulogaId, uloga from korisnik k INNER JOIN uloga u ON k.idUloga = u.id");

            foreach($korisnici as $korisnik):
        ?>
        <p class="proizvodLink">Ime i Prezime: <?=$korisnik->ime?>, <?=$korisnik->prezime?> Uloga: <?=$korisnik->uloga?>      <span class="izmena"> <a href="index.php?page=izmeniKorisnika&id=<?=$korisnik->id?>">Izmeni</a> <a class="obrisi" data-id="<?=$korisnik->id?>">Obrisi</a> </span></p>
            <?php endforeach; ?>
            <a href="models/user/exportEXCEL.php" class="dodajProizvod">Export u excel</a>
        </div>
    </div>
    <script src="assets/js/adminUser.js"></script>
</main>