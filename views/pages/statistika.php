<main class="mainSingle">
    <div class="main-contentSingle">

        <div class="glavniProzivod">
         <?php 
            $fajl = fopen("data/userCount.txt", "r");
            $vrednost = fread($fajl, filesize("data/userCount.txt"));
            echo "<h2>Broj trenutno ulogovanih korisnika je : ".$vrednost."</h2>";
            fclose($fajl);
            $file = fopen("data/log.txt","r");
            $niz = file("data/log.txt");
            $str = '';
            $brojUkupnih = 0;
            foreach($niz as $deoNiza){
                $vrednost = explode("&",$deoNiza);
                $brojUkupnih = $brojUkupnih + (int)$vrednost[1];
                $str = "<h3> Naziv stranice: ". $vrednost[0]. " broj poseta: ".$vrednost[1]."</h3><br>";
                echo $str;
            }
           // echo $str;
            fclose($file);
         ?>
        </div>

    </div>

</main> 