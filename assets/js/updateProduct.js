window.onload = function(){
    document.getElementById("update").addEventListener("click",function(){
        var elementi = document.getElementsByClassName("forma__item");
        var id = this.dataset.id;
        var naziv = elementi[0].value;
        var cena = elementi[1].value;
        var opis = elementi[2].value;
        var sastojci = elementi[3].value;
        var drzava = elementi[4].options[elementi[4].selectedIndex].value;
        var kategorija = elementi[5].options[elementi[5].selectedIndex].value;
        console.log(id);
        $.ajax({
            url: 'models/products/update.php', 
            method: 'POST',
            data: {
                id: id,
                naziv: naziv,
                cena: cena,
                opis: opis,
                sastojci: sastojci,
                drzava: drzava,
                kategorija: kategorija
            },
            dataType: 'json', 
            success: function(data){
                alert("USPESNA IZMENA!!!!!");
            }, 
            error: function(greska, status, statusText){
              console.log(greska);
            }
        });

    });    

    

}