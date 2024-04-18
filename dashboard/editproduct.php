<?php 
    include '../controllers/auth.php';
    $categorys = $conn->query('select * from type_product order by name ASC');

    $id_product = $_GET['id_product'];
    $product_edit = $conn->query("select * from products where id=$id_product;")->fetch_object();

    $photos = $conn->query("select * from photos where id_product=$id_product order by order_ ASC;");
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
                    <div class="col-md-3">
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
                                <input type="text" class="form-control" name="id" id="id" placeholder="id" value="<?=$product_edit->id?>" hidden require>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?=$product_edit->title?>" require>
                            </div>
                            <div class="col-md-12 p-2">
                                <input type="email" class="form-control" name="email" id="email" value="<?=$product_edit->subtitle?>" placeholder="Email" require>
                                <p class="verify_email text-danger mb-0 px-2" style="display: none;">Email ja cadastrado</p>
                            </div>
                            <div class="col-md-12 p-2">
                                <select class="form-select" name="category" aria-label="Default select example">
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
                                <textarea name="description" id="description" class="form-control" rows="10" placeholder="Description" required><?=$product_edit->description?></textarea>
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="row justify-content-center">
                                    <?php 
                                        if($result = $photos){
                                            while($photo = $result->fetch_object()){
                                                ?>
                                                <div class="col-md-3 card m-2">
                                                    <img src="../storage/img/products/<?=$id_product?>/<?=$photo->direct?>" alt="" width="100%">
                                                    <div class="card-body">
                                                        <div class="row p-2">
                                                            <div class="col-md-9">
                                                                <label class="card-text">Ordem de visualização</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control" value="<?=$photo->order_?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php    
                                            }
                                        }
                                    ?>
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