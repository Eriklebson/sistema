<?php
    header('Content-Type: application/json');

    include 'conn.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $account_type = $_POST['account_type'];
    $password = hash('sha256', md5($_POST['password']));

    $result = $conn->query("insert into users (type_account, name, email, password) values ($account_type, '$name', '$email', '$password');");

    if($result){
        echo json_encode(true);
    }
    else{
        echo json_encode(false);
    }
?>