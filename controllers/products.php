<?php
    header('Content-Type: application/json');
    include 'conn.php';

    $id = $_POST['id'];

    $products = $conn->query("select * from products order by id ASC;");

    $response = "";

    if($result = $products){
        while($product = $result->fetch_object()){
            $categorys = $conn->query("select * from type_product where id='$product->type' order by name ASC")->fetch_object();
            $response .= "<tr> 
                        <th scope='row'>$product->id</th>
                        <td>$product->title</td>s
                        <td>R$ $product->price</td>
                        <td>$categorys->name</td>
                        <td class='text-center'>
                            <a href='editproduct.php?id=$id&id_product=$product->id' class='btn btn-primary'><i class='fa-solid fa-pen-to-square'></i></a>
                            <a href='imagens.php?id=$id&id_product=$product->id' class='btn btn-primary'><i class='fa-solid fa-images'></i></a>
                        </td>
                    </tr>";
        }
    }
    echo json_encode($response);
?>