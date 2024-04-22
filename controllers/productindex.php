<?php
    header('Content-Type: application/json');
    include 'conn.php';

    $pag = 1;

    $limit = 9;

    $start = ($pag * $limit) - $limit;

    $id = $_POST['id'];
    $categorys = $conn->query('select * from type_product order by name ASC');

    $products = $conn->query("select * from products order by id DESC LIMIT $start, $limit;");

    $response = "";

    if($result = $products){
        while($product = $result->fetch_object()){
            $photo = $conn->query("select * from photos where id_product=$product->id and order_= 1;")->fetch_object();
            $response .= "
                    <div class='col-md-4 my-5 mx-3'>
                        <div class='card card-index'>
                            <img src='storage/img/products/$product->id/$photo->direct' class='card-img-top' alt='...'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product->title</h5>
                                <h5 class='card-title'>R$ $product->price</h5>
                                <p class='card-text'>$product->subtitle</p>
                                <a href='product.php?id=$product->id' class='btn btn-primary'>Saiba mais</a>
                            </div>
                        </div>
                    </div>";
        }
    }
    echo json_encode($response);
?>