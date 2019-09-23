<main class="mainSingle">
<?php
    include "models/user/functions.php";

    $korisnik = specificUser($_GET['id']);
?>
    <div class="main-contentSingle"> 
        <div class="glavniProzivod">
        <form class="forma" method="post" action="models/user/update.php">
                <input type="hidden" name="id" value="<?=$_GET['id'] ?>">
                <h3>Korisnicko Ime</h3>
                <input type="text" class="forma__item reg" name="korisnicko" value="<?=$korisnik->korisnickoIme ?>">
                <h3>Ime</h3>
                <input type="text" class="forma__item reg" name="ime"  value="<?=$korisnik->ime ?>">
                <h3>Prezime</h3>
                <input type="text" class="forma__item reg" name="prezime" value="<?=$korisnik->prezime ?>">
                <h3>Email</h3>
                <input type="text" class="forma__item reg" name="email" value="<?=$korisnik->email ?>">
                <h3>Sifra</h3>
                <input type="text" class="forma__item reg" name="sifra" value="<?=$korisnik->sifra ?>">  
                <h3>Grad</h3>
                <select class="forma__item reg" name="grad">
                    <option value="0">Izaberite grad...</option>
                    <?php $gradovi = executeQuery("SELECT * FROM grad");
                            foreach($gradovi as $grad):
                    ?>
                     <?php
                        if($grad->id == $korisnik->idGrad):
                    ?>
                    <option value="<?=$grad->id?>" selected><?= $grad->naziv ?></option>
                    <?php 
                        else:
                    ?> 
                    <option value="<?=$grad->id?>" ><?= $grad->naziv ?></option>
                        <?php endif; ?>
                            <?php endforeach; ?>
                </select>
                <h3>Ulica</h3>
                <input name="ulica" type="text" class="forma__item reg" value="<?=$korisnik->ulica ?>">
                <h3>Uloga</h3>
                <select class="forma__item reg" name="uloga">
                    <option value="0">Izaberite ulogu...</option>
                    <?php $uloge = executeQuery("SELECT * FROM uloga");
                            foreach($uloge as $uloga):
                    ?>
                    <?php
                        if($uloga->id == $korisnik->idUloga):
                    ?>
                    <option value="<?=$uloga->id?>" selected><?= $uloga->uloga ?></option>
                    <?php 
                        else:
                    ?> 
                    <option value="<?=$uloga->id?>" ><?= $uloga->uloga ?></option>
                        <?php endif; ?>
                            <?php endforeach; ?>
                </select>
                
                <input class="forma__item reg" type="submit" value="Izmeni" name="btnUpdate">
        </form>
        <div id="rezultat"></div>
        </div>
    </div>
</main>