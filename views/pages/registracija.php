<main class="main">
    <img src="assets/img/saatki.png" class="product__img">
    <div id="container-login">
            <form class="forma">
                <h3>Korisnicko Ime</h3>
                <input type="text" class="forma__item reg"> 
                <h3>Ime</h3>
                <input type="text" class="forma__item reg"> 
                <h3>Prezime</h3>
                <input type="text" class="forma__item reg"> 
                <h3>Email</h3>
                <input type="text" class="forma__item reg"> 
                <h3>Sifra</h3>
                <input id="sifra"type="password" class="forma__item reg" id="sifra" name="sifra">
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
                <a id="btnReg" class="forma__item">Registracija</a>
                
            </form>
            <div id="rezultat"></div>
        </div>
        <script type="module" src="assets/js/reg.js" type="text/javascript"></script>
</main>