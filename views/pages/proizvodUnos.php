<main class="mainSingle">
<?php
    include "models/products/functions.php";
?>
    <div class="main-contentSingle"> 
        <div class="glavniProzivod">
        <form class="forma" enctype="multipart/form-data" method="post" action="models/products/insertProduct.php">
                <h3>Naziv</h3>
                <input type="text" class="forma__item reg" name="naziv">
                <h3>Cena</h3>
                <input type="text" class="forma__item reg" name="cena">
                <h3>Opis</h3>
                <input type="text" class="forma__item reg" name="opis">
                <h3>Sastojci</h3>
                <input type="text" class="forma__item reg" name="sastojci">  
                <h3>Slika</h3>
                <input type="file" name="slika" class="forma__item reg" name="slika">
                <h3>Drzava</h3>
                <select class="forma__item reg" name="drzava">
                    <option>izaberite</option>
                    <?php 
                        $drzave = getAllCountries();

                        foreach($drzave as $drzava):
                    ?>
                    <option value="<?=$drzava->id?>"><?=$drzava->naziv?></option>
                    <?php 
                        endforeach;
                    ?>
                    </select>
                <h3>Kategorija</h3>
                <select class="forma__item reg" name="kategorija">
                    <option>izaberite</option>
                    <?php 
                        $kategorije = getAllCategories();

                        foreach($kategorije as $kategorija):
                    ?>
                    <option value="<?=$kategorija->id?>"><?=$kategorija->naziv?></option>
                    <?php 
                        endforeach;
                    ?>
                </select>
                <input type="submit" id="btnReg" class="forma__item" value="Dodaj" name="btnSubmit">
        </form>
        </div>
    </div>
</main>