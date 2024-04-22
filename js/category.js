$(document).ready(function(){
    bdcategory();
});
$('#search').submit(function(e){
    e.preventDefault();
    const params = new URLSearchParams(window.location.search);
    var id = params.get('id');

    var category = $('#name').val();
    console.log(category);
    $.ajax({
        url: '../controllers/searchCategory.php',
        data: {id: id, category: category},
        method: 'POST',
        dataType: 'json'
    }).done(function(result){
        $(".table-body").html(result)
    });
})

$('#addcategory').submit(function(e){
    e.preventDefault();
    
    var category = $('#category').val();
    if(category.length === 0 || !category.trim()){
        $('.input_null').show();
        $('.error').hide();
        $('.success').hide();
    }
    else{
        $.ajax({
            url: '../controllers/addcategory.php',
            method: 'POST',
            data: {category: category},
            dataType: 'json'
        }).done(function(result){
            if(result){
                $('.success').show();
                $('.error').hide();
                $('#category').val("");
            }
            else{
                $('.error').show();
                $('.success').hide();
            }
        });
    }    
    setTimeout(function(){bdcategory()},100);
});

function bdcategory(){
    const params = new URLSearchParams(window.location.search);
    var id = params.get('id');
    $.ajax({
        url: '../controllers/category.php',
        data: {id: id},
        method: 'POST',
        dataType: 'json'
    }).done(function(result){
        $(".table-body").html(result)
    });
}