<?php 
    include '../controllers/auth.php';
    if($user->type_account != 1){
        header("Location: ../dashboard/index.php?id=$user->id");
    }

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="javascript:history.back()" data-bs-toggle="tooltip" data-bs-title="Voltar">
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
                                    <button class="btn btn-outline-secondary" id="getPassword" type="button">Gerar</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>