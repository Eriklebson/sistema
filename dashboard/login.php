<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>