<?php 
header('Content-Type: application/json');

include 'conn.php';

$email = $_POST['email'];

$user = $conn->query("select * from users where email='$email'")->fetch_object();

if(empty($user->id)){
    echo json_encode(false);
}
else{
    echo json_encode(true);
}
?>