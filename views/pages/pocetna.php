<main class="main">
    <img src="assets/img/saatki.png" class="product__img">
    <div class="main-content">
    <div class="news">
    <h2>Vesti</h2>
    <div id="vijesti">
        <?php
            include "models/news/functions.php";
            $limit =  isset($_GET['limit'])? $_GET['limit'] : 0;

            $vesti = getNews($limit);
            
            foreach($vesti as $vest):
        ?>
        <div class="paragraph">
        <h3><?=$vest->naslov?></h3>
        <p><?=$vest->sadrzaj?></p>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination" id="paginacija">
    <?php
                        $num_of_news = paginationNum();
                        for($i = 0; $i < $num_of_news; $i++):
                      ?>
                          <a class="strance" data-limit="<?= $i ?>"><?= $i+1 ?></a>
                      <?php endfor; ?>             
    </div>
    </div>
    <div class="popular" id="popular">
    </div>
    </div>
    <script src="assets/js/vesti.js"></script>
</main>