function tolltips(){
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
}
setTimeout(function(){
    tolltips()
}, 600);
$(document).ready(function(){
    $('#price').mask("#.##0,00", {reverse: true});
    $('#price_in').mask("#.##0,00", {reverse: true});
    $('#price_to').mask("#.##0,00", {reverse: true});
});
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
        console.log(result.auth);
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

$('#editProduct').submit(function(e){
    e.preventDefault();

    var id_product = $('#id_product').val();
    var type = $('#type').val();
    var title = $('#title').val();
    var subtitle = $('#subtitle').val();
    var price = $('#price').val();
    var link = $('#link').val();
    var description = $('#description').val();

    if(title.length === 0 || !title.trim() || subtitle.length === 0 || !subtitle.trim() || description.length === 0 || !description.trim()){
        $('.input_null').show();
    }
    else{
        $.ajax({
            url: '../controllers/editproduct.php',
            method: 'POST',
            data: {id_product: id_product ,type: type, title: title, subtitle: subtitle, price: price, link: link, description: description},
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

$('#old_password').blur(function(){
    var id = $('#id').val();
    var old_password = $(this).val();

    if(old_password.length != 0 || old_password.trim()){
        $.ajax({
            url: '../controllers/verifypassword.php',
            method: 'POST',
            data: {id: id, old_password: old_password},
            dataType: 'json'
        }).done(function(result){
            if(result){
                $('.verify_password').show();
                document.getElementById("new_password").disabled = true;
                document.getElementById("confirm_password").disabled = true;
                document.getElementById("saveEdit").disabled = true;
            }
            else{
                console.log(result)
                $('.verify_password').hide();
                document.getElementById("new_password").disabled = false;
                document.getElementById("confirm_password").disabled = false;
                document.getElementById("saveEdit").disabled = false;
            }
        });
    }
    else{
        $('.verify_password').hide();
        document.getElementById("new_password").disabled = true;
        document.getElementById("confirm_password").disabled = true;
        document.getElementById("saveEdit").disabled = false;
    }
})

$('#confirm_password').blur(function(){
    var new_password = $('#new_password').val();
    var confirm_password = $(this).val();

    if(new_password != confirm_password){
        $('.verify_new_password').show();
        document.getElementById("saveEdit").disabled = true;
    }
    else{
        $('.verify_new_password').hide();
        document.getElementById("saveEdit").disabled = false;
    }
})

$('#show_password').on("change", function(e){
    var isChecked = $(this).prop('checked');
    console.log(isChecked);
    if (isChecked) {
      $("#old_password").attr("type", "text");
      $("#new_password").attr("type", "text");
      $("#confirm_password").attr("type", "text");
      $("#label_show_password").html('<i class="fa-solid fa-eye-slash"></i>');
    }
    else{
      $("#old_password").attr("type", "password");
      $("#new_password").attr("type", "password");
      $("#confirm_password").attr("type", "password");
      $("#label_show_password").html('<i class="fa-solid fa-eye"></i>');
    }
})

$('#photos').sortable({
    update: function(){
        var list = $(this).sortable('toArray');
        $.post("../controllers/orderImagens.php", {imagens:list});
    }
});

function sold_product(id_product){
    $.ajax({
        url: '../controllers/soldProduct.php',
        method: 'POST',
        data: {id_product: id_product},
        dataType: 'json'
    }).done(function(result){
        if(result.vefiry){
            if(result.button == 0){
                $('#button_product').removeClass('btn-warning').addClass("btn-success").html("<i class='fa-solid fa-cubes-stacked'></i>").attr('data-bs-title', 'Colocar a Venda');
                $(".tooltip").remove();
                tolltips();
            }
            else{
                $('#button_product').removeClass('btn-success').addClass("btn-warning").html("<i class='fa-solid fa-cart-flatbed'></i>").attr('data-bs-title', 'Marcar como Vendido');
                $(".tooltip").remove();
                tolltips();
            }
        }
        else{
            console.log("Consulte os suporte tecnico");
        }
    });
}