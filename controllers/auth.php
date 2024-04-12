<?php
include 'conn.php';

if(!isset($_COOKIE['login_key'])){
    header("Location: ../dashboard/login.php");
}
else{
    if(!isset($_GET['id'])){
        header("Location: ../dashboard/login.php");
    }
    else{
        $id = $_GET['id'];
        $user = $conn->query("select * from users where id='$id'")->fetch_object();
        if($_COOKIE['login_key'] != $user->login_key){
            header("Location: ../dashboard/login.php");
        }
    }
}
?>