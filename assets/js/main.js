window.onload = function(){



    var forma = document.getElementsByClassName("forma__item");
    var korIme = forma[0];
    var sifra = forma[1];
    
    var reKorIme = /^[\w]{3,19}$/;
    var reSifra = /^[A-Za-z]{3,19}$/;

    document.getElementById("btnLogin").addEventListener("click", function(){
        var nizGreske = [];
        if(!reKorIme.test(korIme.value)){
            nizGreske.push("Korisnicko nije u dobrom formatu!");
            korIme.classList.remove("zelena");
            korIme.classList.add("crvena");
        }
        else{
            korIme.classList.remove("crvena");
            korIme.classList.add("zelena");
        }
        if(!reSifra.test(sifra.value)){
            nizGreske.push("Sifra nije u dobrom formatu!");
            sifra.classList.remove("zelena");
            sifra.classList.add("crvena");
            }
        else{
            sifra.classList.remove("crvena");
            sifra.classList.add("zelena");
        }
        if(nizGreske.length > 0){
            var ispis ="";
            nizGreske.forEach(function(element){
                ispis += element+"<br>";
            });
            document.getElementById("rezultat").innerHTML = ispis;
            }
        else{
            document.getElementById("rezultat").innerHTML = "";
            $.ajax({
                data:{
                    korIme : korIme.value,
                    sifra : sifra.value
                },
                dataType:"json",
                method:"GET",
                url:"./models/user/loginuser.php",
                success : function(podaci){
                    korIme.classList.remove("crvena");
                    korIme.classList.add("zelena");
                    sifra.classList.remove("crvena");
                    sifra.classList.add("zelena");
                    document.getElementById("rezultat").innerHTML = podaci.message+" nastavite sa <a class='kupovina-link' href='index.php?page=proizvodi'>kupovinom</a>";
                },
                error:function(error, xhr, status){
                    console.log(error);
                    var obj = error.responseJSON;
                    if(obj.num == 0){
                        document.getElementById("rezultat").innerHTML = obj.message;
                        korIme.classList.remove("zelena");
                        korIme.classList.add("crvena");
                    }
                    else if(obj.num == 1){
                        document.getElementById("rezultat").innerHTML = obj.message;
                        sifra.classList.remove("zelena");
                        sifra.classList.add("crvena");
                    }
                }
            });
        }
    });
    



}

