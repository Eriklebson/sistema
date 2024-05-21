<?php
    // Remover ou trocar o diretorio do link de compartilhamento assim que for postar o sistema
    header('Content-Type: application/json');
    include 'conn.php';

    $categoria = $_POST['categoria'];
    $title = $_POST['title'];

    $categorys = $conn->query('select * from type_product order by name ASC');

    if($categoria == null){
        $products = $conn->query("select * from products where sold=0 and title like '%$title%' order by id ASC;");
    }
    else{
        $products = $conn->query("select * from products where sold=0 and title like '%$title%' and type='$categoria' order by id ASC;");
    }

    $response = "";

    if($result = $products){
        while($product = $result->fetch_object()){
            $photo = $conn->query("select * from photos where id_product=$product->id and order_= 1;")->fetch_object();
            $price = number_format($product->price, 2, ',', '.');
            $response .= "
                    <div class='col-md-4 my-5'>
                        <div class='mx-2'>
                            <div class='card card-index'>
                                <img src='storage/img/products/$product->id/$photo->direct' class='card-img-top' alt='$product->title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product->title</h5>
                                    <p class='card-text'>$product->subtitle</p>
                                    <h5 class='card-title'>R$ $price</h5>
                                    <div class='row px-2'>
                                        <div class='col-md-5'><a href='product.php?id=$product->id' class='btn btn-primary'>Saiba mais</a></div>
                                        <div class='col-md-2' data-bs-toggle='tooltip' data-bs-title='Compartilhar no WhatsApp'><a href='https://api.whatsapp.com/send?text=$link/demonstracao1/product.php?id=$product->id' class='btn btn-success' target='_blank'><i class='fa-brands fa-whatsapp'></i></a></div>
                                        <div class='col-md-2' data-bs-toggle='tooltip' data-bs-title='Compartilhar no Facebook'><a href='https://www.facebook.com/sharer.php?u=$link/demonstracao1/product.php?id=$product->id' class='btn btn-primary' target='_blank'><i class='fa-brands fa-facebook'></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
        }
    }
    echo json_encode($response);
?>