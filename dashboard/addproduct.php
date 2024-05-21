<?php 
    include '../controllers/auth.php';

    $categorys = $conn->query('select * from type_product order by name ASC');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Product</title>
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
                        <h2>Add Product</h2>
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
                    <form action="../controllers/addproduct.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12" hidden>
                                <input type="text" class="form-control" name="id_user" id="id_user" placeholder="id_user" value="<?=$_GET['id']?>" required>
                            </div>
                            <div class="col-md-12 p-2">
                                <label for="formFileMultiple" class="form-label">Imagens</label>
                                <input class="form-control" type="file" id="imagens" name="imagens[]" multiple required>
                            </div>
                            <div class="col-md-12 p-2">
                                <select class="form-select" name="category" aria-label="Default select example">
                                <?php 
                                if($result = $categorys){
                                    while($category = $result->fetch_object()){
                                        ?>
                                        <option value="<?=$category->id?>"><?=$category->name?></option>
                                        <?php    
                                    }
                                }
                                ?>
                                </select>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Subtitle" required>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control" name="link" id="link" placeholder="Link de venda">
                            </div>
                            <div class="col-md-12 p-2">
                                <textarea name="description" id="description" class="form-control" rows="10" placeholder="Description" required></textarea>
                            </div>
                            <div class="col-md-6 p-2">
                                <p class="success text-success" style="display: none;">Cadastrado com sucesso</p>
                                <p class="error text-danger" style="display: none;">Desculpe não foi possivel cadastrar o usuario, por favor entre em contato com o responsavel do sistema</p>
                                <p class="input_null text-danger" style="display: none;">Tem campos vazios</p>
                            </div>
                            <div class="col-md-6 p-2 text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e5340aea14.js" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/jquery.mask.js"></script>
    <script src="../js/products.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>