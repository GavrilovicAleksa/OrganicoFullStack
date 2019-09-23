<?php
    include "models/products/functions.php";

    $proizvod = getOneProduct($_GET['id']);
?>
    <main class="mainSingle">
    <div class="main-contentSingle"> 
        <div class="glavniProzivod">
        <form class="forma" enctype="multipart/form-data" method="post" action="models/products/insertProduct.php">
                <h3>Naziv</h3>
                <input type="text" class="forma__item reg" name="naziv" value="<?=$proizvod->naziv ?>">
                <h3>Cena</h3>
                <input type="text" class="forma__item reg" name="cena" value="<?=$proizvod->cena ?>">
                <h3>Opis</h3>
                <input type="text" class="forma__item reg" name="opis" value="<?=$proizvod->opis ?>">
                <h3>Sastojci</h3>
                <input type="text" class="forma__item reg" name="sastojci" value="<?=$proizvod->naziv ?>">  
                <h3>Drzava</h3>
                <select class="forma__item reg" name="drzava">
                    <option>izaberite</option>
                    <?php 
                        $drzave = getAllCountries();

                        foreach($drzave as $drzava):
                    ?>
                    <?php 
                        if($drzava->id == $proizvod->drzava):
                    ?>
                    <option selected value="<?=$drzava->id?>"><?=$drzava->naziv?></option>
                        <?php else: ?>
                        <option selected value="<?=$drzava->id?>"><?=$drzava->naziv?></option>
                        <?php endif; ?>
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
                     <?php 
                        if($kategorija->id == $proizvod->kategorija):
                    ?>
                    <?php else: ?>
                    <option selected value="<?=$kategorija->id?>"><?=$kategorija->naziv?></option>
                        <?php endif; ?>
                    <?php 
                        endforeach;
                    ?>
                </select>
                <a class="forma__item reg" id="update" data-id='<?=$_GET['id']?>'>Izmeni</a>
        </form>
        </div>
    </div>
    <script src="assets/js/updateProduct.js" ></script>
</main>
