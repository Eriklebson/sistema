<?php
    include 'conn.php';

    $id_user = $_POST['id_user'];
    $photos = $_FILES['imagens'];
    $type = $_POST['category'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if($conn->query("insert into products (type, title, subtitle, price, description) values ('$type','$title', '$subtitle', '$price', '$description');")){
        echo "Produto cadastrado com sucesso </br>";
    }
    else{
        echo "Não foi possivel cadastrar o Produto </br>";
    }
    

    $id_product = $conn->insert_id;
    mkdir("../storage/img/products/$id_product/");

    for($i = 0; $i < count($photos['name']); $i++){
        $name = md5(date('d-m-Y h:i:s').$photos['name'][$i]).'.'.explode('.', $photos['name'][$i])[1];
        $direct = "../storage/img/products/".$id_product."/".$name;
        $largura =  getimagesize($photos['tmp_name'][$i])[0];
        $altura =  getimagesize($photos['tmp_name'][$i])[1];
        echo $largura, "\n\r";
        echo $altura, "\n\r";
        if($largura > 2000 || $altura > 2000){
            $image_redimencionada = imagecreatetruecolor(floor($largura/3), floor($altura/3));
            imagecopyresampled($image_redimencionada, imagecreatefromjpeg($photos['tmp_name'][$i]), 0,0,0,0, floor($largura/3), floor($altura/3), $largura, $altura);
            imagejpeg($image_redimencionada, $direct);
            $conn->query("insert into photos (direct, order_, id_product) values ('$name', $i+1, '$id_product');");
            header('Location: ../dashboard/products.php?id='.$id_user.'&msg=true');
        }
        else{
            if(move_uploaded_file($photos['tmp_name'][$i], $direct)){
                $conn->query("insert into photos (direct, order_, id_product) values ('$name', $i+1, '$id_product');");
                header('Location: ../dashboard/products.php?id='.$id_user.'&msg=true');
            }
            else{
                header('Location: ../dashboard/products.php?id='.$id_user.'&msg=false');
            }
        }
        
    }  
?>