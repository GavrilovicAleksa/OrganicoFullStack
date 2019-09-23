window.onload = function(){
    var forma = document.getElementsByClassName("forma__item");
    var korIme = forma[0];
    var ime = forma[1];
    var Prezime = forma[2];
    var Email = forma[3];
    var sifra = forma[4];
    var Grad = forma[5];
    var Ulica = forma[6];

    

    var reKorIme = /^[\w]{3,19}$/;
    var reSifra = /^[\w]{3,19}$/;
    var reIme = /^[A-Z]{1}[a-z]{3,12}$/;
    var rePrezime = /^[A-Z]{1}[a-z]{3,15}$/;
    var reEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var reUlica = /^[\w\s]{4,25}$/;


    document.getElementById("btnReg").addEventListener("click", function(){
       var gradVrednost = Grad.options[Grad.selectedIndex].value;
        var nizGreske = [];
        if(!reKorIme.test(korIme.value)){
            nizGreske.push("Korisnicko Ime nije u dobrom formatu!");
            korIme.classList.remove("zelena");
            korIme.classList.add("crvena");
        }
        else{
            korIme.classList.remove("crvena");
            korIme.classList.add("zelena");
        }
        if(!reSifra.test(sifra.value)){
            nizGreske.push("Ime nije u dobrom formatu!");
            sifra.classList.remove("zelena");
            sifra.classList.add("crvena");
            }
        else{
            sifra.classList.remove("crvena");
            sifra.classList.add("zelena");
        }
        if(!reIme.test(ime.value)){
            nizGreske.push("Ime nije u dobrom formatu!");
            ime.classList.remove("zelena");
            ime.classList.add("crvena");
        }
        else{
            ime.classList.remove("crvena");
            ime.classList.add("zelena");
        }
        if(!rePrezime.test(Prezime.value)){
            nizGreske.push("Prezime nije u dobrom formatu!");
            Prezime.classList.remove("zelena");
            Prezime.classList.add("crvena");
            }
        else{
            Prezime.classList.remove("crvena");
            Prezime.classList.add("zelena");
        }if(!reEmail.test(Email.value)){
            nizGreske.push("Email nije u dobrom formatu!");
            Email.classList.remove("zelena");
            Email.classList.add("crvena");
        }
        else{
            Email.classList.remove("crvena");
            Email.classList.add("zelena");
        }
        if(!reUlica.test(Ulica.value)){
            nizGreske.push("Ulica nije u dobrom formatu!");
            Ulica.classList.remove("zelena");
            Ulica.classList.add("crvena");
            }
        else{
            Ulica.classList.remove("crvena");
            Ulica.classList.add("zelena");
        }
        if(gradVrednost == 0){
            nizGreske.push("Izaberite Grad!");
            Grad.classList.remove("zelena");
            Grad.classList.add("crvena");
            }
        else{
            Grad.classList.remove("crvena");
            Grad.classList.add("zelena");
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
                    sifra : sifra.value,
                    gradVrednost : gradVrednost,
                    ime : ime.value,
                    prezime : Prezime.value,
                    email : Email.value,
                    ulica : Ulica.value
                },
                dataType:"json",
                method:"POST",
                url:"./models/user/registration.php",
                success : function(podaci){
                    korIme.classList.remove("crvena");
                    korIme.classList.add("zelena");
                    sifra.classList.remove("crvena");
                    sifra.classList.add("zelena");
                    document.getElementById("rezultat").innerHTML = "Uspesna registracija <a href='index.php?page=login' class='kupovina-link'>Ulogujte se!</a>";
                },
                error:function(error, xhr, status){
                    console.log(error);
                    var arr = error.responseJSON;
                    var ispis = '';
                    arr.forEach(function(element){
                        ispis+= element + "<br>";
                    });
                    document.getElementById("rezultat").innerHTML = ispis;
                    
                }
            });
        }

    });
}