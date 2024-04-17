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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add User</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include 'layout/menu.php';?>
            </div>
            <div class="col-md-9 p-3 overflow-auto" style="max-height: 100vh">
                <div class="row">
                    <div class="col-md-6 px-3">
                        <h2>Add User</h2>
                    </div>
                    <div class="col-md-6">
                        <a href="javascript:history.back()">
                            <div class="back text-end mb-3 mx-3">
                                <i class="fa-solid fa-reply fs-3 px-3 py-2"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card p-4">
                    <form id="registerUser">
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                <p class="verify_email text-danger mb-0 px-2" style="display: none;">Email ja cadastrado</p>
                            </div>
                            <div class="col-md-12 p-2">
                                <select class="form-select" name="account_type" id="account_type" aria-label="Default select example">
                                    <option value="1">Admin</option>
                                    <option value="2">Standard</option>
                                </select>
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Password" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                    <button class="btn btn-outline-secondary" id="getPassword" type="button">Generate</button>
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <p class="success text-success" style="display: none;">Cadastrado com sucesso</p>
                                <p class="error text-danger" style="display: none;">Desculpe não foi possivel cadastrar o usuario, por favor entre em contato com o responsavel do sistema</p>
                                <p class="input_null text-danger" style="display: none;">Tem campos vazios</p>
                            </div>
                            <div class="col-md-6 p-2 text-end">
                                <button type="submit" for="registerUser" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>