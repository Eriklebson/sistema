<?php
    include 'controllers/conn.php';
    $categorys = $conn->query('select * from type_product order by name ASC');
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="menu pt-5 px-5 me-4">
                    <div class="moldura text-center mb-3">
                        <h4>Procurar</h4>
                    </div>
                    <form id="search">
                        <input type="text" name="title" id="title" class="form-control mb-2" placeholder="Nome">
                        <div class="text-end">
                            <button class="btn btn-outline-primary" type="submit" for="search" id="button-addon2">Procurar</button>
                        </div>
                    </form>
                    <div class="moldura text-center my-3">
                        <h4>Produtos</h4>
                    </div>
                    <ul>
                        <li><a href="index.php">Todos</a></li>
                        <?php 
                        if($result = $categorys){
                            while($category = $result->fetch_object()){
                                ?>
                                <li><a href="?categoria=<?=$category->id?>"><?=$category->name?></a></li>
                                <?php    
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 py-5">
                <div class="text-center">
                    <h3>Produtos</h3>
                </div>
                <div class="container product row w-100 justify-content-center"></div>
            </div>
        </div>
    </div>
    <?php
        include 'layout/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/productindex.js"></script>
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
</body>
</html>