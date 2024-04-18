<?php
    header('Content-Type: application/json');
    include 'conn.php';

    $category = $_POST['category'];

    $verifycategory = $conn->query("select * from type_product where name='$category'")->fetch_object();

    if(!empty($verifycategory->id)){
        echo json_encode(false);
    }
    else{
        if($conn->query("insert into type_product (name) values ('$category');")){
            echo json_encode(true);
        }
        else{
            echo json_encode(false);
        }
    }    
?>