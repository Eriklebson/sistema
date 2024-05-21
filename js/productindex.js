$(document).ready(function(){
    const params = new URLSearchParams(window.location.search);
    var categoria = params.get('categoria');
    console.log(categoria);
    $.ajax({
        url: 'controllers/productindex.php',
        data: {categoria: categoria},
        method: 'POST',
        dataType: 'json'
    }).done(function(result){
        if(result.length === 0 || !result.trim()){
            $(".product").html("<h3 class='text-center py-5'>Estamos sem esse produto no momento</h3>")
        }
        else{
            $(".product").html(result)
        }
    });
});
$('#search').submit(function(e){
    e.preventDefault();
    const params = new URLSearchParams(window.location.search);
    var categoria = params.get('categoria');

    var title = $('#title').val();

    $.ajax({
        url: 'controllers/searchProductsIndex.php',
        data: {categoria: categoria, title: title},
        method: 'POST',
        dataType: 'json'
    }).done(function(result){
        if(result.length === 0 || !result.trim()){
            $(".product").html("<h3 class='text-center py-5'>Estamos sem esse produto no momento</h3>")
        }
        else{
            $(".product").html(result)
        }
    });
})