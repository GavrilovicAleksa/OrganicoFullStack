window.onload = function(){
   

    $(document).on('click', '.obrisi', function(e){
        e.preventDefault();


        let id = $(this).data('id');

       

        $.ajax({
            url: 'models/user/deleteUser.php', 
            method: 'GET',
            data: {
                id: id
            },
            dataType: 'json', 
            success: function(data){
                ispisProizvoda(data);
            }, 
            error: function(greska, status, statusText){
                
                console.log(greska);
                alert(greska.parseJSON.poruka);
            }
        })
    });    

}
function ispisProizvoda(arr){
    ispis=`<a href='index.php?page=proizvodUnos' class="dodajProizvod">Dodaj Proizvod</a>`;
    arr.forEach(function(element){
        ispis += `<p class="proizvodLink">Ime i Prezime: ${element.ime}, ${element.prezime} Uloga: ${element.uloga}      <span class="izmena"> <a href="index.php?page=izmeniKorisnika&id=${element.id}">Izmeni</a> <a class="obrisi" data-id="${element.id}">Obrisi</a> </span></p>`;
    });
    ispis+=` <a href="models/products/exportEXCEL.php" class="dodajProizvod">Export u excel</a>`;
    document.getElementById("adminProizvod").innerHTML = ispis;
}