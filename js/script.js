$('#login').submit(function(e){
    e.preventDefault();
    
    var email = $('#email').val();
    var password = $('#password').val();

    $.ajax({
        url: '../controllers/login.php',
        method: 'POST',
        data: {email: email, password: password},
        dataType: 'json'
    }).done(function(result){
        if(!result.auth){
            $('.verify').show();
        }
        else{
            window.location.href = 'index.php?id='+result.id;
        }
    });
});