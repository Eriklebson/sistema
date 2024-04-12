<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Contact</title>
</head>
<body>
    <?php
        include 'layout/header.php';
    ?>
    <div class="container py-5">
        <h3>Contact</h3>
        <div class="row">
            <div class="col-md-6">
                <h3>lorem ipsum</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga, nam? Voluptas dolorem a amet mollitia minima alias eaque, enim doloremque libero eius praesentium illum, repudiandae aperiam modi deserunt veniam assumenda?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur delectus nemo iste, illo adipisci eius magnam explicabo praesentium numquam. Earum enim sint voluptas itaque rem iure error obcaecati voluptates in?</p>
            </div>
            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="text-center mb-3">Lorem ipsum</h3>
                    <form action="">
                        <input class="form-control mb-3" type="text" placeholder="Name">
                        <input class="form-control mb-3" type="text" placeholder="Email">
                        <input class="form-control mb-3" type="text" placeholder="Phone">
                        <textarea class="form-control mb-3" name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
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