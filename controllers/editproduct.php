<?php
    header('Content-Type: application/json');
    include 'conn.php';

    $id_product = $_POST['id_product'];
    $type = $_POST['type'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $price = str_replace(',','.', str_replace('.', '', $_POST['price']));
    $link = $_POST['link'];
    $description = $_POST['description'];

    if(empty($link)){
        $link = null;
    }
    
    $result = $conn->query("update products set type='$type', title='$title', subtitle='$subtitle', price='$price', link='$link', description='$description' where id='$id_product';");

    if($result){
        echo json_encode(true);
    }
    else{
        echo json_encode(false);
    }
?>