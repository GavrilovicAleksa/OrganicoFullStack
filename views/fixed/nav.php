<div id="content">
<nav id="menu">
    <ul class="side-nav" id="side-nav">
    <?php 
    $meni = executeQuery("SELECT * FROM meni");
    foreach($meni as $deoMenija):
    ?>
    <li class="side-nav__item">
        <a href="<?php echo "index.php?page=".$deoMenija->link ?>" class="side-nav__link" id="<?php echo $deoMenija->naziv ?>">
            <svg class="side-nav__icon">
                <use xlink:href="./assets/img/sprite.svg#icon-<?php echo $deoMenija->ikona ?>"></use>
            </svg>
            <span><?php echo $deoMenija->naziv ?></span>
        </a>
    </li>

    <?php endforeach; ?>
    </ul>
    <a href="dokumentacija.pdf" class="side-nav__link-doc">DOKUMENTACIJA</a>
</nav>