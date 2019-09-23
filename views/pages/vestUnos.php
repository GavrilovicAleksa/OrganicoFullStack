<main class="mainSingle">
<?php
    include "models/products/functions.php";
?>
    <div class="main-contentSingle"> 
        <div class="glavniProzivod">
        <form class="forma" method="post" action="models/news/insertNews.php">
                <h3>Naslov</h3>
                <input type="text" class="forma__item reg" name="naslov">
                <h3>Sadrzaj</h3>
                <textarea class="forma__item reg" name="sadrzaj" ></textarea>
                <input type="submit" id="btnReg" class="forma__item" value="Dodaj" name="btnSubmit">
        </form>
        </div>
    </div>
</main>