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
    <title>Setting</title>
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
                        <h2>Setting</h2>
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
                    <form action="../controllers/selfEdit.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 text-center">
                            <?php if($user->photo == null){?>
                                <img src="../img/perfil_standart.jpg" alt="" width="300" height="300" class="rounded-circle me-2 mb-3">
                                <?php }
                                else{?>
                                <img src="../storage/img/perfil/<?=$user->photo?>" alt="" width="300" height="300" class="rounded-circle me-2 mb-3">
                                <?php }?>
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="input-group">
                                    <input type="file" class="form-control" name="photo" id="photo">
                                    <label class="input-group-text" for="inputGroupFile02">Photo</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="id" id="id" placeholder="id" value="<?=$user->id?>" hidden>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control" name="name" placeholder="Name" value="<?=$user->name?>">
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="input-group">
                                    <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" aria-label="Recipient's username" aria-describedby="button-addon2" disabled>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" aria-label="Recipient's username" aria-describedby="button-addon2" disabled>
                                    <input type="checkbox" class="btn-check" id="show_password" autocomplete="off">
                                    <label class="btn btn-outline-secondary" id="label_show_password" for="show_password"><i class="fa-solid fa-eye"></i></label>
                                </div>
                            </div>
                            <div class="col-md-12 px-2">
                                <p class="px-3 text-danger verify_password" style="display: none;">Senha invalida</p>
                                <p class="px-3 text-danger text-end verify_new_password" style="display: none;">Confirmação de senha deve ser igual a nova senha</p>
                            </div>
                            <div class="col-md-6 p-2">
                                <p class="success text-success" style="display: none;">Cadastrado com sucesso</p>
                                <p class="error text-danger" style="display: none;">Desculpe não foi possivel cadastrar o usuario, por favor entre em contato com o responsavel do sistema</p>
                                <p class="input_null text-danger" style="display: none;">Tem campos vazios</p>
                            </div>
                            <div class="col-md-6 p-2 text-end">
                                <button type="submit" id="saveEdit" class="btn btn-primary">Save</button>
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