window.onload = function(){
    var korpa = document.getElementById("Korpa");
    korpa.addEventListener("click",function(){
        console.log("Aleksa");
        var idProizvod = this.dataset.id;
        var idKorisnik = this.dataset.korisnik;
        $.ajax({
            data:{
                idProizvod : idProizvod,
                idKorisnik : idKorisnik
            },
            dataType:"json",
            method:"POST",
            url:"./models/products/insertCart.php",
            success : function(podaci){
                document.getElementById('rezultat').innerHTML = podaci;
            },
            error:function(error, xhr, status){
                console.log(error);
            }
        });

    });
}