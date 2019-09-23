<main class="mainSingle">
<?php
    include "models/products/functions.php";
?>
    <div class="main-contentSingle"> 
        <div class="glavniProzivod">
        <form class="forma" enctype="multipart/form-data" method="post" action="models/products/insertProduct.php">
                <h3>Korisnicko Ime</h3>
                <input type="text" class="forma__item reg" name="naziv">
                <h3>Ime</h3>
                <input type="text" class="forma__item reg" name="naziv">
                <h3>Prezime</h3>
                <input type="text" class="forma__item reg" name="cena">
                <h3>Email</h3>
                <input type="text" class="forma__item reg" name="opis">
                <h3>Sifra</h3>
                <input type="password" class="forma__item reg" name="sastojci">  
                <h3>Grad</h3>
                <select class="forma__item reg">
                    <option value="0">Izaberite grad...</option>
                    <?php $gradovi = executeQuery("SELECT * FROM grad");
                            foreach($gradovi as $grad):
                    ?>
                    <option value="<?=$grad->id?>"><?= $grad->naziv ?></option>
                            <?php endforeach; ?>
                </select>
                <h3>Ulica</h3>
                <input type="text" class="forma__item reg">
                <h3>Uloga</h3>
                <select class="forma__item reg">
                    <option value="0">Izaberite ulogu...</option>
                    <?php $uloge = executeQuery("SELECT * FROM uloga");
                            foreach($uloge as $uloga):
                    ?>
                    <option value="<?=$uloga->id?>"><?= $uloga->uloga ?></option>
                            <?php endforeach; ?>
                </select>
                
                <a id="btnReg" class="forma__item">Dodaj</a>
        </form>
        <div id="rezultat"></div>
        </div>
    </div>
    <script type="module" src="assets/js/reg.js" type="text/javascript"></script>
</main>