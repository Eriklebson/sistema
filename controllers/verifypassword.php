<?php 
    header('Content-Type: application/json');

    include 'conn.php';

    $id = $_POST['id'];
    $old_password = hash('sha256', md5($_POST['old_password']));

    $user = $conn->query("select * from users where id='$id'")->fetch_object();

    if($user->password == $old_password){
        echo json_encode(false);
    }
    else{
        echo json_encode(true);
    }
?>