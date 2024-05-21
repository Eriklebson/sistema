<?php
include 'controllers/conn.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Contact</title>
</head>
<body>
    <?php
        include 'layout/header.php';
    ?>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Entre em Contato</h3>
                <p>Estamos aqui para ajudar! Não hesite em nos contatar para qualquer dúvida ou consulta. Estamos disponíveis por telefone, WhatsApp, e-mail ou em nosso endereço comercial.</p>
                <h3 class="mt-5">Informações de Contato:</h3>
                <p>Telefone: (11) 9 8748-8327</p>
                <p>WhatsApp: (11) 9 8748-8327</p>
                <p>E-mail: cloudboo@cloudboo.com</p>
                <p>Endereço: Avenida Atlântica, 406 - Socorro/Interlagos,Zona Sul de São Paulo CEP: 04768-000 - Dentro do Posto Shell</p>
                <h4>Horário de Atendimento:</h4>
                <p>Segunda a Sexta: 09:00 as 18:00</p>
                <p>Sábado: 09:00 as 13:00</p>
                <p>Domingo: Fechado</p>
                <p></p>
            </div>
            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="text-center mb-3">Lorem ipsum</h3>
                    <form action="">
                        <input class="form-control mb-3" type="text" placeholder="Nome">
                        <input class="form-control mb-3" type="text" placeholder="Email">
                        <input class="form-control mb-3" type="text" placeholder="Telefone">
                        <textarea class="form-control mb-3" name="" id="" cols="30" rows="10" placeholder="Mensagem"></textarea>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'layout/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
</body>
</html>