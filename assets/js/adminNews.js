window.onload = function(){
   

    $(document).on('click', '.obrisi', function(e){
        e.preventDefault();


        let id = $(this).data('id');

       

        $.ajax({
            url: 'models/news/delete.php', 
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
    ispis=`<a href='index.php?page=proizvodUnos' class="dodajProizvod">Dodaj Vest</a>`;
    arr.forEach(function(element){
        ispis += `<p class="proizvodLink">Naziv: ${element.naslov}    <span class="izmena"> <a class="obrisi" data-id="${element.id}">Obrisi</a> </span></p>`
    });
    document.getElementById("adminProizvod").innerHTML = ispis;
}