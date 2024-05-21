$(document).ready(function(){
    const params = new URLSearchParams(window.location.search);
    var id = params.get('id');
    $.ajax({
        url: '../controllers/products.php',
        data: {id: id},
        method: 'POST',
        dataType: 'json'
    }).done(function(result){
        $(".table-body").html(result)
        tolltips();
    });
});
$('#search').submit(function(e){
    e.preventDefault();
    const params = new URLSearchParams(window.location.search);
    var id = params.get('id');

    var title = $('#title').val();
    var price = $('#price').val();
    var category = $('#category').val();

    $.ajax({
        url: '../controllers/searchProducts.php',
        data: {id: id, title: title, price: price, category: category},
        method: 'POST',
        dataType: 'json'
    }).done(function(result){
        console.log(result);
        $(".table-body").html(result)
        tolltips();
    });
})