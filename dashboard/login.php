<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Login</title>
</head>
<body>
    <section>
        <div class="container-fluid">
            <div class="container p-5 text-center">
                <div class="card p-5">
                    <h3>Login</h3>
                    <form id="login">
                        <input type="text" name="email" id="email" class="form-control mb-3" placeholder="Email">
                        <input type="Password" name="password" id="password" class="form-control mb-3" placeholder="Password">
                        <div class="verify text-danger" style="display: none;">Credenciais invalidas</div>
                        <div class="text-end"><input type="submit" form="login" class="btn btn-primary" value="Entrar"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>