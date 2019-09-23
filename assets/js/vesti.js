$(document).ready(function(){
    $("body").on("click", ".strance", function(){

        let limit = $(this).data("limit");

        $.ajax({
            url: "models/news/getPagination.php",
            method: "GET",
            data: {
                limit: limit
            },
            success: function(data){
                ispisVesti(data.news);
                ispisPaginacije(data.numNews);
            },
            error: function(error){
                console.log(error);
            }
        })
        
    });
});

function ispisVesti(arr){
    var html = "";
    arr.forEach(function(element){
        html+=`<div class="paragraph">
        <h3>${element.naslov}</h3>
        <p>${element.sadrzaj}</p>
        </div>`;
    });
    
    $("#vijesti").html(html);
}
function ispisPaginacije(arr){
    let html = "";
    for(let i = 0; i < arr; i++){
        html += `
        <a class="strance" data-limit="${ i }">
                    ${ i + 1 }
                </a>
        `;
    }
    $("#popular").html(html);
}