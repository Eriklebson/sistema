<?php 
    include '../controllers/auth.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Home</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include 'layout/menu.php';?>
            </div>
            <div class="col-md-9 p-3 overflow-auto" style="max-height: 100vh">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="products.php?id=<?php echo $user->id?>">
                                <div class="card text-center p-5 m-3 item d-flex justify-content-center">
                                <i class="fa-solid fa-boxes-stacked fs-0"></i>
                                    <p class="fs-2 mt-2">Products</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="users.php?id=<?php echo $user->id?>">
                                <div class="card text-center p-5 m-3 item d-flex justify-content-center">
                                    <i class="fa-solid fa-users fs-0"></i>
                                    <p class="fs-2 mt-2">Users</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="theme.php?id=<?php echo $user->id?>">
                                <div class="card text-center p-5 m-3 item d-flex justify-content-center">
                                    <i class="fa-brands fa-themeisle fs-0"></i>
                                    <p class="fs-2 mt-2">Thema Site</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="settings.php?id=<?php echo $user->id?>">
                                <div class="card text-center p-5 m-3 item d-flex justify-content-center">
                                    <i class="fa-solid fa-gears fs-0"></i>
                                    <p class="fs-2 mt-2">Settings Account</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap.esm.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>