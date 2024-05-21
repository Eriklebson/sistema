<?php 
    include '../controllers/auth.php';
    $categorys = $conn->query('select * from type_product order by name ASC');

    $id_product = $_GET['id_product'];
    $product_edit = $conn->query("select * from products where id=$id_product;")->fetch_object();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Editar produto <?=$product_edit->title?></title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include 'layout/menu.php';?>
            </div>
            <div class="col-md-9 p-3 overflow-auto" style="max-height: 100vh">
                <div class="row">
                    <div class="col-md-9 px-3">
                        <h2>Editar produto <?=$product_edit->title?></h2>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <a href="javascript:history.back()" data-bs-toggle="tooltip" data-bs-title="Voltar">
                            <div class="back text-end mb-3 mx-3">
                                <i class="fa-solid fa-reply fs-3 px-3 py-2"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card p-4">
                    <form id="editProduct">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="id_product" id="id_product" placeholder="id" value="<?=$product_edit->id?>" hidden require>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?=$product_edit->title?>" require>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control" name="subtitle" id="subtitle" value="<?=$product_edit->subtitle?>" placeholder="Subtitle" require>
                            </div>
                            <div class="col-md-12 p-2">
                                <select class="form-select" name="type" id="type" aria-label="Default select example">
                                <?php 
                                if($result = $categorys){
                                    while($category = $result->fetch_object()){
                                        ?>
                                        <option value="<?=$category->id?>" <?php if($product_edit->type == $category->id){echo 'selected';}?>><?=$category->name?></option>
                                        <?php    
                                    }
                                }
                                ?>
                                </select>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control" name="price" id="price" value="<?=number_format($product_edit->price, 2, ',', '')?>" placeholder="Price" require>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control" name="link" id="link" placeholder="Link de venda" value="<?=$product_edit->link?>">
                            </div>
                            <div class="col-md-12 p-2">
                                <textarea name="description" id="description" class="form-control" rows="10" placeholder="Description" required><?=$product_edit->description?></textarea>
                            </div>
                            <div class="col-md-6 p-2">
                                <p class="success text-success" style="display: none;">Editado com sucesso</p>
                                <p class="error text-danger" style="display: none;">Desculpe não foi possivel editar o Produto, por favor entre em contato com o responsavel do sistema</p>
                                <p class="input_null text-danger" style="display: none;">Tem campos vazios</p>
                            </div>
                            <div class="col-md-6 p-2 text-end">
                                <button type="submit" for="editProduct" class="btn btn-primary">Save</button>
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
    <script src="../js/jquery.mask.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>