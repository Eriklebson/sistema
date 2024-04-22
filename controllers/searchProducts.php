<?php
    header('Content-Type: application/json');

    include 'conn.php';

    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $categorys = $conn->query('select * from type_product order by name ASC');
    
    $products = $conn->query("select * from products where title like '%$title%' and price like '%$price%' and type like '%$category%' order by id ASC;");

    $response = "";

    if($result = $products){
        while($product = $result->fetch_object()){
            if($result = $categorys){
                while($category = $result->fetch_object()){
                    if($category->id == $product->type){
                        $product_type = $category->name;
                    }
                }
            }
            $response .= "<tr> 
                            <th scope='row'>$product->id</th>
                            <td>$product->title</td>s
                            <td>R$ $product->price</td>
                            <td>$product_type</td>
                            <td class='text-center'>
                                <a href='editproduct.php?id=$id&id_product=$product->id' class='btn btn-primary'><i class='fa-solid fa-pen-to-square'></i></a>
                                <a href='imagens.php?id=$id&id_product=$product->id' class='btn btn-primary'><i class='fa-solid fa-images'></i></a>
                            </td>
                        </tr>";
        }
    }
    echo json_encode($response);
?>