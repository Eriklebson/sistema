$(document).ready(function(){
    const params = new URLSearchParams(window.location.search);
    var id = params.get('id');
    $.ajax({
        url: '../controllers/users.php',
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

    var name = $('#name').val();
    var email = $('#email').val();

    $.ajax({
        url: '../controllers/searchUser.php',
        data: {id: id, name: name, email: email},
        method: 'POST',
        dataType: 'json'
    }).done(function(result){
        $(".table-body").html(result)
        tolltips();
    });
})