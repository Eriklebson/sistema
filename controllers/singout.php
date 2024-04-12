<?php 
    header('Content-Type: application/json');

    include 'conn.php';

    $id = $_GET['id'];
    $conn->query("update users set login_key=null where id='$id'");

    setcookie('login_key', null, -1, '/');

    header("Location: ../dashboard/login.php");
?>