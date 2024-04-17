<?php
    include 'conn.php';

    $photos = $_FILES['imagens'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $conn->query("insert into product (title, subtitle, price, description) values ('$title', '$subtitle', '$price', '$description');");

    $id_product = $conn->insert_id;
    mkdir("../storage/img/products/$id_product/");
    $arr = [];
    for($i = 0; $i < count($photos['name']); $i++){
        $name = md5(date('d-m-Y h:i:s').$photos['name'][$i]).'.'.explode('.', $photos['name'][$i])[1];
        $direct = "../storage/img/products/".$id_product."/".$name;
        if(move_uploaded_file($photos['tmp_name'][$i], $direct)){
            $conn->query("insert into photos (name, order_) values ('$name', '$i');");
            array_push($arr, $conn->insert_id);
        }
        else{
            echo "Imagens não salvas";
        }
    }
    $photos = implode(", ", $arr);

    $conn->query("update product set photos='$photos' where id='$id_product'");

    echo "Cadastrado com Sucesso";
?>