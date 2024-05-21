<?php
    header('Content-Type: application/json');
    include 'conn.php';

    $id = $_POST['id'];

    $products = $conn->query("select * from products order by id ASC;");

    $response = "";

    if($result = $products){
        while($product = $result->fetch_object()){
            $categorys = $conn->query("select * from type_product where id='$product->type' order by name ASC")->fetch_object();
            $price = number_format($product->price, 2, ',', '.');
            if($product->sold == 0){
                $color = "warning";
                $icon = "<i class='fa-solid fa-cart-flatbed'></i>";
                $toltip = "Marcar como vendida";
            }
            else if($product->sold == 1){
                $color = "success";
                $icon = "<i class='fa-solid fa-cubes-stacked'></i>";
                $toltip = "Colocar a Venda";
            }
            $response .= "<tr> 
                        <th scope='row'>$product->id</th>
                        <td>$product->title</td>s
                        <td>R$ $price</td>
                        <td>$categorys->name</td>
                        <td class='text-center'>
                            <a href='editproduct.php?id=$id&id_product=$product->id' class='btn btn-primary' data-bs-toggle='tooltip' data-bs-title='Editar'><i class='fa-solid fa-pen-to-square'></i></a>
                            <a href='imagens.php?id=$id&id_product=$product->id' class='btn btn-primary' class='btn btn-primary' data-bs-toggle='tooltip' data-bs-title='Editar Imagens'><i class='fa-solid fa-images'></i></a>
                            <a href='javascript:sold_product($product->id)' id='button_product' class='btn btn-$color' data-bs-toggle='tooltip' data-bs-title='$toltip'>$icon</a>
                        </td>
                    </tr>";
        }
    }
    echo json_encode($response);
?>