window.onload = function(){
    var sort = document.getElementById("categories");

    sortiranje("cenaRastuce",1);
    brojStranica("cenaRastuce");

    sort.addEventListener("change",function(){

        var vrednost = sort.options[sort.selectedIndex].value;
        //console.log(vrednost);

        switch(vrednost){
            case "1" :
                sortiranje("cenaRastuce", 1);
                brojStranica("cenaRastuce");
                break;
            case "2" :
                sortiranje("cenaOpadajuce", 1);
                brojStranica("cenaOpadajuce");
                break;
            case "3":
                sortiranje("nazivRastuce", 1);
                brojStranica("nazivRastuce");
                break;
            case "4":
                sortiranje("nazivOpadajuce", 1);
                brojStranica("nazivOpadajuce");
                break;
        }
    });

    var kategorije = document.getElementsByClassName("categories__item");

    for(var i = 0;i < kategorije.length;i++){
        kategorije[i].addEventListener("click", function(){
            var vrednost = this.dataset.id;
            var broj = this.dataset.broj;
            filterKat(broj, vrednost);
            dohvatiBrojStranica(vrednost);

        });
    }
}

function sortiranje(str, num){
    $.ajax({
        data:{
            str : str,
            num : num
        },
        dataType:"json",
        method:"GET",
        url:"./models/products/sort.php",
        success : function(podaci){
            ispisProizvoda(podaci);
        },
        error:function(error, xhr, status){
            console.log(error.responseText);
        }
    });
}
function brojStranica(str){
    $.ajax({
        data:{
            pos : 1
        },
        method:"GET",
        url:"./models/products/brojStranica.php",
        success : function(podaci){
            ispisLinkova(podaci, str);
        },
        error:function(error, xhr, status){
            console.log(error);
        }
    });
}

function ispisLinkova(num, str){
    var broj = Math.ceil(num/9);
    //console.log(broj);
    var ispis = "";
    var link = 1;
    var brojic = 10;
    for(var i = 0; i < broj;i++){
        if(i == 0){
            ispis+=`<a  data-vrsta='sort' data-vrednost=${str} data-broj='1' class="strance">${link++}</a>`;
        }
        else{
            ispis+=`<a  data-vrsta='sort' data-vrednost=${str} data-broj='${brojic}' class="strance">${link++}</a>`;
            brojic = brojic+10;
        }
    }
    document.getElementById("paginacija").innerHTML = ispis;

    var stranice = document.getElementsByClassName("strance");

    for(var i = 0;i < stranice.length;i++){
        stranice[i].addEventListener("click", function(){
            var vrsta = this.dataset.vrsta;
            var broj = this.dataset.broj;
            var vrednost = this.dataset.vrednost;
            switch(vrsta){
                case "sort":
                    sortiranje(vrednost, broj);
            }

        })
    }
}
function ispisProizvoda(arr){
    var ispis= "";
    arr.forEach(element => {
        ispis+= `<div class="product-card proizvod">
        <a href="index.php?page=singleProduct&id=${element.id}">
          <div class="product-image">
             <img src="${element.mala}" alt='${element.naziv}'>
          </div>
          <div class="product-info">
            <h3>${element.naziv}</h3><h6>${element.cena}</h6>
          </div>
        </a>
        </div>`;
    });
    document.getElementById("proizvodi").innerHTML = ispis;
}
function ispisLinkovaFilter(num1, num2){
    var broj = Math.ceil(num1/9);
    //console.log(broj);
    var ispis = "";
    var link = 1;
    var brojic = 10;
    for(var i = 0; i < broj;i++){
        if(i == 0){
            ispis+=`<a data-kat='${num2}' data-broj='1' class="strance">${link++}</a>`;
        }
        else{
            ispis+=`<a data-kat='${num2}' data-broj='${brojic}' class="strance">${link++}</a>`;
            brojic = brojic+10;
        }
    }
    document.getElementById("paginacija").innerHTML = ispis;
    var stranice = document.getElementsByClassName("strance");

    for(var i = 0;i < stranice.length;i++){
        stranice[i].addEventListener("click", function(){
            var kategorija = this.dataset.kat;
            var broj2 = this.dataset.broj;
            filterKat(broj2,kategorija);
        });
    }

}

function filterKat(broj,vrednost){
    $.ajax({
        data:{
            id : vrednost,
            broj : broj
        },
        dataType:"JSON",
        method:"GET",
        url:"./models/products/categoryFilter.php",
        success : function(podaci){
            console.log(podaci);
            ispisProizvoda(podaci);
        },
        error:function(error, xhr, status){
            console.log(error);
        }
    });
}

function dohvatiBrojStranica(num){
    $.ajax({
        data:{
            id : num
        },
        dataType:"JSON",
        method:"GET",
        url:"./models/products/brojStranicaKat.php",
        success : function(podaci){
            ispisLinkovaFilter(podaci, num);
        },
        error:function(error, xhr, status){
            console.log(error);
        }
    });
}

