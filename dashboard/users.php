<?php 
    include '../controllers/auth.php';

    $users = $conn->query("select * from users");
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
                <div class="row">
                    <div class="col-md-6 px-3">
                        <h2>Users</h2>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="adduser.php?id=<?php echo $user->id?>">
                            <div class="back text-end mb-3 mx-3">
                                <i class="fa-solid fa-user-plus fs-3 px-3 py-2"></i>
                            </div>
                        </a>
                        <a href="javascript:history.back()">
                            <div class="back text-end mb-3 mx-3">
                                <i class="fa-solid fa-reply fs-3 px-3 py-2"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card px-4 py-2 mb-3">
                    <h3>Seach:</h3>
                    <div class="row">
                        <form action="">
                            <div class="input-group my-2">
                                <input type="text" class="form-control" placeholder="Name" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <input type="text" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if($users->num_rows > 0){
                                    while($row = $users->fetch_assoc()){
                                        if($row['id'] != 1){
                                        ?>
                                        <tr>
                                            <th scope="row"><?=$row['id']?></th>
                                            <td><?=$row['name']?></td>
                                            <td><?=$row['email']?></td>
                                            <td><?=$row['type_account']?></td>
                                        </tr>
                                        <?php 
                                        }
                                        else{
                                            ?><td colspan="4" class="text-center">Não tem usuarios registrados ainda</td><?php
                                        }
                                    }
                                }
                                else{
                                    ?><td colspan="4" class="text-center">Não tem usuarios registrados ainda</td><?php
                                }
                            ?>
                        </tbody>
                    </table>
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