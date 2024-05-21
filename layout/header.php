<header>
    <div class="container-fluid" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('img/banner.jpg'); height: 500px;background-position: center;">
        <div class="container text-white">
            <nav>
                <div class="row">
                    <div class="py-3 col-md-12 text-end">
                        <a class="px-2" href="https://api.whatsapp.com/send?phone=5511987488327" target="_blank"><i class="fa-brands fa-whatsapp me-2"></i>(11) 9 8748-8327</a>
                        <a class="px-2" href="mailto:sistema@email.com"><i class="fa-solid fa-envelope me-2"></i>cloudboo@cloudboo.com</a>
                    </div>
                    <div class="col-md-6" >
                        <div class="p-3 text-center rounded-circle" style="background-color: rgb(249, 250, 251); width: 100px; margin-top: -50px;">
                            <img src="img/logo.png" width="60px" alt="" class="">
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <a class="px-2" href="index.php">Home</a>
                        <a class="px-2" href="about.php">Empresa</a>
                        <a class="px-2" href="contact.php">Contatos</a>
                        <?php if(!isset($_COOKIE['login_key'])){?>
                            <a class="px-2" href="dashboard/login.php">Login</a>
                        <?php }else{
                            $login_key = $_COOKIE['login_key'];
                            $user = $conn->query("select * from users where login_key='$login_key'")->fetch_object();
                            if(isset($user)){?>
                                <a class="px-2" href="dashboard/index.php?id=<?=$user->id?>">Painel de Controle</a>
                                <?php }
                                else{
                                    ?><a class="px-2" href="dashboard/login.php">Entrar</a><?php
                                }
                            ?>

                        <?php }?>
                    </div>
                </div>
            </nav>
            <div class="text-center py-5">
                <h3 class="fs-1 pt-5"></h3>
                <p class="fs-3 pb-5"></p>
            </div>
        </div>
    </div>
</header>