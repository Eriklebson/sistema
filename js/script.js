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

$("#getPassword").click(function(){
    var chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJLMNOPQRSTUVWXYZ!@#$%^&*()+?><:{}[]";
    var passwordLength = 16;
    var password = "";
    for (var i = 0; i < passwordLength; i++) {
      var randomNumber = Math.floor(Math.random() * chars.length);
      password += chars.substring(randomNumber, randomNumber + 1);
    }
    document.getElementById('password').value = password
});

$('#email').blur(function(){
    var email = $('#email').val();

    $.ajax({
        url: '../controllers/verifyemail.php',
        method: 'POST',
        data: {email: email},
        dataType: 'json'
    }).done(function(result){
        if(result){
            $('.verify_email').show();
        }
        else{
            $('.verify_email').hide();
        }
    });
});

$('#registerUser').submit(function(e){
    e.preventDefault();
    
    var account_type = $('#account_type').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();

    if(name.length === 0 || !name.trim() || email.length === 0 || !email.trim() || password.length === 0 || !password.trim()){
        $('.input_null').show();
    }
    else{
        $.ajax({
            url: '../controllers/register.php',
            method: 'POST',
            data: {account_type: account_type, name: name, email: email, password: password},
            dataType: 'json'
        }).done(function(result){
            if(!result){
                $('.error').show();
            }
            else{
                $('.success').show();
                $('#name').val("");
                $('#email').val("");
                $('#password').val("");
            }
        });
    }    
});
$('#editUser').submit(function(e){
    e.preventDefault();

    var id = $('#id').val();
    var account_type = $('#account_type').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();

    if(name.length === 0 || !name.trim() || email.length === 0 || !email.trim()){
        $('.input_null').show();
    }
    else{
        $.ajax({
            url: '../controllers/editUser.php',
            method: 'POST',
            data: {id: id ,account_type: account_type, name: name, email: email, password: password},
            dataType: 'json'
        }).done(function(result){
            if(!result){
                $('.error').show();
            }
            else{
                $('.success').show();
                $('#password').val("");
            }
        });
    }    
});