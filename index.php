<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Sistema</title>
</head>
<body>
    <?php
        include 'layout/header.php';
    ?>
    <div class="container py-5">
        <div class="text-center">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore quaerat ab, odio, quam facilis accusamus veritatis, ipsam aliquid saepe voluptatum! Eum, soluta fugit! Laboriosam officia beatae architecto id ratione!</p>
        </div>
        <div class="row">
            <?php 
                for($i = 1; $i <= 12; $i++){
            ?>
            <div class="col-md-4 my-5">
                <div class="card" style="width: 18rem;">
                    <img src="img/b1da36362690140b82f2615336181d34f58abf5a5fadf78cb182f5aafb43242e.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    <?php
        include 'layout/footer.php';
    ?>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
</body>
</html>