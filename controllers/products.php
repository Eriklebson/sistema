<?php
    header('Content-Type: application/json');
    include 'conn.php';

    $id = $_POST['id'];

    $products = $conn->query("select * from products order by id ASC;");

    $response = "";

    if($result = $products){
        while($product = $result->fetch_object()){
            $response .= "<tr> 
                        <th scope='row'>$product->id</th>
                        <td>$product->title</td>s
                        <td>$product->price</td>
                        <td>
                            <a href='editproduct.php?id=$id&id_product=$product->id' class='btn btn-primary'><i class='fa-solid fa-pen-to-square'></i></a>
                        </td>
                    </tr>";
        }
    }
    echo json_encode($response);
?>