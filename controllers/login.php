<?php
    header('Content-Type: application/json');
    include 'conn.php';

    $email = $_POST['email'];
    $password = hash('sha256', md5($_POST['password']));
    $login_key = md5(date('d/m/Y H:i:s').$password);

    $user = $conn->query("select * from users where email='$email'")->fetch_object();
    
    if(empty($user->id)){
        echo json_encode(array('auth'=>false));
    }
    else{
        if($user->password == $password){
            setcookie("login_key", $login_key, 0, '/');
            $conn->query("update users set login_key='$login_key' where id='$user->id'");
            echo json_encode(array('auth'=>true, 'id'=>$user->id));
        }
        else{
            echo json_encode(array('auth'=>false));
        }
    }
?>