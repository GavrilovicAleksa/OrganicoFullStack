<body>
    <div id="container">
    <?php
        if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->idUloga == 234):
    ?>
    <div id="adminPanel">
        <a href="index.php?page=adminProizvod">Upravljanje Proizvodima</a>
        <a href="index.php?page=adminVesti">Upravljanje Vestima</a>
        <a href="index.php?page=adminKorisnici">Upravljanje Korisnicima</a>
        <a href="index.php?page=statistika">Statistika Pristupa</a>
    </div>
        <?php endif; ?>
<header id="header">
                <img src="assets/img/logo.png" alt="logo" class="logo">
                
                <?php
                    if(isset($_SESSION['korisnik']))
                    echo "<h3>Pozdrav ".$_SESSION['korisnik']->ime."!</h3>";
                ?>
                <div class="cart">
                    <a href="index.php?page=kolica">
                    <svg class="cart__icon">
                            <use xlink:href="assets/img/sprite.svg#icon-shopping-cart"></use>
                    </svg>
                    <span id="cart__number" class="cart__number">0</span>
                    </a>   
                    <?php if(!isset($_SESSION['korisnik'])): ?>
                    <a href="index.php?page=login" class="login">Prijava</a>
                    <?php else: ?>
                    <a href="models/user/logout.php" class="login">Odjava</a>
                    <?php endif; ?>
                </div>
</header>