<?php
    header('Content-Type: application/json');
    include 'conn.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $account_type = $_POST['account_type'];
    $password = hash('sha256', md5($_POST['password']));

    
    if(!empty(str_replace(" ", "", trim($_POST['password'])))){
        $result = $conn->query("update users set name='$name', email='$email', type_account='$account_type', password='$password' where id='$id';");
    }
    else{
        $result = $conn->query("update users set name='$name', email='$email', type_account='$account_type' where id='$id';");
    }

    if($result){
        echo json_encode(true);
    }
    else{
        echo json_encode(false);
    }
?>