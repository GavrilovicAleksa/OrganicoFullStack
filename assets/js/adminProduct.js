window.onload = function(){
   

    $(document).on('click', '.obrisi', function(e){
        e.preventDefault();


        let id = $(this).data('id');

       

        $.ajax({
            url: 'models/products/delete.php', 
            method: 'GET',
            data: {
                id: id
            },
            dataType: 'json', 
            success: function(data){
                ispisProizvoda(data);
            }, 
            error: function(greska, status, statusText){
                
                console.log(greska.parseJSON);
                alert(greska.parseJSON.poruka);
            }
        })
    });    

}
function ispisProizvoda(arr){
    ispis=`<a href='index.php?page=proizvodUnos' class="dodajProizvod">Dodaj Proizvod</a>`;
    arr.forEach(function(element){
        ispis += `<p class="proizvodLink">Naziv: ${element.naziv}, Cena: ${element.cena}       <span href="index.php?page=updateProduct&id=${element.id}> class="izmena"> <a>Izmeni</a> <a class="obrisi" data-id="${element.id}">Obrisi</a> </span></p>`
    });
    ispis+=` <a href="models/products/exportEXCEL.php" class="dodajProizvod">Export u excel</a>`;
    document.getElementById("adminProizvod").innerHTML = ispis;
}