<?php
    include 'conn.php';

    $photos = $_FILES['imagens'];
    $type = $_POST['category'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    print_r($type);

    if($conn->query("insert into products (type, title, subtitle, price, description) values ('$type','$title', '$subtitle', '$price', '$description');")){
        echo "Produto cadastrado com sucesso";
    }
    else{
        echo "Não foi possivel cadastrar o Produto";
    }
    

    $id_product = $conn->insert_id;
    mkdir("../storage/img/products/$id_product/");
    $arr = [];
    for($i = 0; $i < count($photos['name']); $i++){
        $name = md5(date('d-m-Y h:i:s').$photos['name'][$i]).'.'.explode('.', $photos['name'][$i])[1];
        $direct = "../storage/img/products/".$id_product."/".$name;
        if(move_uploaded_file($photos['tmp_name'][$i], $direct)){
            $conn->query("insert into photos (direct, order_, id_product) values ('$name', $i+1, '$id_product');");
            array_push($arr, $conn->insert_id);
        }
        else{
            echo "Imagens não salvas";
        }
    }  
?>