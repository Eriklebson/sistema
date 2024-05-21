<?php
    include 'controllers/conn.php';

    $link = $_SERVER['HTTP_HOST'];
    $id_product = $_GET['id'];
    $product = $conn->query("select * from products where id=$id_product;")->fetch_object();

    $photos = $conn->query("select * from photos where id_product=$id_product order by order_ ASC;");

    $preview = array();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sistema</title>
</head>
<body>
    <?php
        include 'layout/header.php';
    ?>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                            if($result = $photos){
                                while($photo = $result->fetch_object()){
                                    ?>
                                    <div class="carousel-item <?php if($photo->order_ == 1){echo "active";}?>">
                                        <img src="storage/img/products/<?=$id_product?>/<?=$photo->direct?>" class="d-block w-100" alt="...">
                                    </div>
                                    <?php  
                                    $preview[] = $photo->direct;
                                }
                            }
                        ?>
                    </div>
                    <div class="carousel-indicators position-static m-0">
                        <div class="row">
                        <?php
                        foreach($preview as $key=>$img){
                            ?>
                            <div class="col-md-3 mx-2">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$key?>" <?php if($key == 0){echo "class='active w-100' aria-current='true'";} else {echo "class='w-100'";}?> aria-label="Slide <?=$key?>"><img src="storage/img/products/<?=$id_product?>/<?=$img?>" class="d-block w-100" alt="..."></button>
                            </div>
                            <?php    
                        }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 px-5">
                <h2><?=$product->title?></h2>
                <h3>Preço R$ <?=number_format($product->price, 2, ',', '.');?></h3>
                <?php if(!empty($product->link)){?>
                <a href="<?=$product->link?>" class="btn btn-primary mt-3 px-5 py-2 fs-3" target="_blank">Comprar</a>
                <?php }?>
                <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fs-4" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Descrição</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-4" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Contato</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active p-3 border-start border-end border-bottom" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"><?php echo nl2br($product->description);?>
                        <div class="row mx-2 my-3">
                            <div class='col-md-1' data-bs-toggle='tooltip' data-bs-title='Compartilhar no WhatsApp'><a href='https://api.whatsapp.com/send?text=<?=$link?>/demonstracao1/product.php?id=<?=$product->id?>' class='btn btn-success' target='_blank'><i class='fa-brands fa-whatsapp'></i></a></div>
                            <div class='col-md-1' data-bs-toggle='tooltip' data-bs-title='Compartilhar no Facebook'><a href='https://www.facebook.com/sharer.php?u=<?=$link?>/demonstracao1/product.php?id=<?=$product->id?>' class='btn btn-primary' target='_blank'><i class='fa-brands fa-facebook'></i></a></div>
                        </div>
                    </div>
                    <div class="tab-pane fade border-start p-3 border-end border-bottom" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <form action="">
                            <input type="text" class="form-control mb-3" placeholder="Nome">
                            <input type="text" class="form-control mb-3" placeholder="Email">
                            <input type="text" class="form-control mb-3" placeholder="Telefone">
                            <input type="text" class="form-control mb-3" placeholder="Produto" value="<?=$product->title?>" readonly>
                            <textarea class="form-control mb-3" name="" id="" cols="30" rows="10" placeholder="Mensagem"></textarea>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'layout/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/productidex.js"></script>
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
</body>
</html>