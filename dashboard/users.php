<?php 
    include '../controllers/auth.php';

    if($user->type_account != 1){
        header("Location: ../dashboard/index.php?id=$user->id");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
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
                        <h2>Users</h2>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="adduser.php?id=<?php echo $user->id?>" data-bs-toggle="tooltip" data-bs-title="Adicionar Usuario">
                            <div class="back text-end mb-3 mx-3">
                                <i class="fa-solid fa-user-plus fs-3 px-3 py-2"></i>
                            </div>
                        </a>
                        <a href="javascript:history.back()" data-bs-toggle="tooltip" data-bs-title="Voltar">
                            <div class="back text-end mb-3 mx-3">
                                <i class="fa-solid fa-reply fs-3 px-3 py-2"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card px-4 py-2 mb-3">
                    <h3>Procurar:</h3>
                    <div class="row">
                        <form id="search">
                            <div class="input-group my-2">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <input type="text" id="email" name="email" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" for="search" id="button-addon2">Procurar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card p-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nivel</th>
                            <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/users.js"></script>
</body>
</html>