<header>
    <div class="container-fluid" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('img/banner.jpg');">
        <div class="container text-white">
            <nav>
                <div class="row">
                    <div class="py-3 col-md-12 text-end">
                        <a class="px-2" href="tel:+5500000000000">(00) 0000-0000</a>
                        <a class="px-2" href="mailto:sistema@email.com">sistema@email.com</a>
                    </div>
                    <div class="col-md-6">
                        <h2>Sistema</h2>
                    </div>
                    <div class="col-md-6 text-end">
                        <a class="px-2" href="index.php">Home</a>
                        <a class="px-2" href="about.php">About</a>
                        <a class="px-2" href="contact.php">Contact</a>
                        <?php if(!isset($_COOKIE['login_key'])){?>
                            <a class="px-2" href="dashboard/login.php">Login</a>
                        <?php }else{
                            $login_key = $_COOKIE['login_key'];
                            $user = $conn->query("select * from users where login_key='$login_key'")->fetch_object();
                            if(isset($user)){?>
                                <a class="px-2" href="dashboard/index.php?id=<?=$user->id?>">DashBoard</a>
                                <?php }
                                else{
                                    ?><a class="px-2" href="dashboard/login.php">Login</a><?php
                                }
                            ?>

                        <?php }?>
                    </div>
                </div>
            </nav>
            <div class="text-center py-5">
                <h3 class="fs-1">Lorem</h3>
                <p class="fs-3">Ipsum Dolor</p>
            </div>
        </div>
    </div>
</header>