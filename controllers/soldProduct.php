<?php
    header('Content-Type: application/json');
    include 'conn.php';

    $id_product = $_POST['id_product'];
    $product_edit = $conn->query("select * from products where id=$id_product;")->fetch_object();
    
    if($product_edit->sold == 0){
        $result = $conn->query("update products set sold=1 where id=$id_product;");
    }
    else{
        $result = $conn->query("update products set sold=0 where id=$id_product;");
    }
    

    if($result){
        echo json_encode(array('vefiry'=>true, 'button'=>$product_edit->sold));
    }
    else{
        echo json_encode(array('vefiry'=>true, 'button'=>$product_edit->sold));
    }
?>