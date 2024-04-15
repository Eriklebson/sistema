<?php 
    include '../controllers/auth.php';

    $id_user = $_GET['id_user'];
    $user_edit = $conn->query("select * from users where id=$id_user;")->fetch_object();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Edit User</title>
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
                        <h2>Edit User</h2>
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
                    <form id="editUser">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="id" id="id" placeholder="id" value="<?=$user_edit->id?>" hidden require>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?=$user_edit->name?>" require>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="email" class="form-control" name="email" id="email" value="<?=$user_edit->email?>" placeholder="Email" require>
                                <p class="verify_email text-danger mb-0 px-2" style="display: none;">Email ja cadastrado</p>
                            </div>
                            <div class="col-md-12 p-2">
                                <select class="form-select" name="account_type" id="account_type" aria-label="Default select example">
                                    <option value="1" <?php if($user_edit->type_account == 1){echo 'selected';}?>>Admin</option>
                                    <option value="2" <?php if($user_edit->type_account == 2){echo 'selected';}?>>Standard</option>
                                </select>
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Password" aria-label="Recipient's username" aria-describedby="button-addon2" require>
                                    <button class="btn btn-outline-secondary" id="getPassword" type="button">Generate</button>
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <p class="success text-success" style="display: none;">Editado com sucesso</p>
                                <p class="error text-danger" style="display: none;">Desculpe não foi possivel editar o usuario, por favor entre em contato com o responsavel do sistema</p>
                                <p class="input_null text-danger" style="display: none;">Tem campos vazios</p>
                            </div>
                            <div class="col-md-6 p-2 text-end">
                                <button type="submit" for="editUser" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
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