
<main class="main">
                    <div class="main-content main-proizvodi">
                        <div class="glavniProzivodi">
                            <div id="proizvodi">
                                
                            </div>
                            <div class="pagination" id="paginacija">
                              <a class="strance">1</a>
                              <a class="strance">2</a>
                            </div>
                        </div>
                        <div class="categories">
                            <select id="categories">
                              <option class="categories__option" value="0" hidden="true">Izaberite</option>
                              <option class="categories__option" value="1" data-tip="cenaRastuce">Ceni Rastuće</option>
                              <option class="categories__option" value="2" data-tip="cenaOpadajuce">Ceni Opadajuce</option>
                              <option class="categories__option" value="3" data-tip="nazivRastuce">Nazivu Rastuce</option>
                              <option class="categories__option" value="4" data-tip="nazivOpadajuce">Nazivu Opadajuce</option>
                            </select>
                            <div>
                              <ul class="categories__list">
                                <h2 class="categories__title">Kategorije:</h2>
                                  <?php
                                    
                                    $kategorije = executeQuery("SELECT * FROM kategorija");
                                    foreach($kategorije as $kategorija):
                                  ?>
                                  <li data-id="<?=$kategorija->id ?>"  data-broj="1" class="categories__item" ><?=$kategorija->naziv ?></li>
                                    <?php endforeach; ?>
                              </ul>
                            </div>
                        </div>      
                    </div>
                    <script type="module" src="assets/js/products.js" type="text/javascript"></script>
</main>