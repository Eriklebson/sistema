<?php
$URL_ATUAL= "$_SERVER[SCRIPT_NAME]";
?>
<div class="d-flex flex-column flex-shrink-0 p-3 menu-dashboar" style="width: 100%; min-height: 100vh">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Sistema</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="index.php?id=<?php echo $user->id?>" class="nav-link <?php if($URL_ATUAL == '/sistema/dashboard/index.php'){ echo 'active';} else {echo 'link-dark';}?>" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          <i class="fa-solid fa-house me-2"></i>
          Inicio
        </a>
      </li>
      <li>
        <a href="category.php?id=<?php echo $user->id?>" class="nav-link <?php if($URL_ATUAL == '/sistema/dashboard/category.php'){ echo 'active';} else {echo 'link-dark';}?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          <i class="fa-solid fa-sitemap me-2"></i>
          Categorias
        </a>
      </li>
      <li>
        <a href="products.php?id=<?php echo $user->id?>" class="nav-link <?php if($URL_ATUAL == '/sistema/dashboard/products.php'){ echo 'active';} else {echo 'link-dark';}?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          <i class="fa-solid fa-boxes-stacked me-2"></i>
          Produtos
        </a>
      </li>
      <?php if($user->type_account == 1){?>
      <li>
        <a href="users.php?id=<?php echo $user->id?>" class="nav-link <?php if($URL_ATUAL == '/sistema/dashboard/users.php'){ echo 'active';} else {echo 'link-dark';}?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          <i class="fa-solid fa-users me-2"></i>
          Usuarios
        </a>
      </li>
      <?php }?>
      <li>
        <a href="theme.php?id=<?php echo $user->id?>" class="nav-link <?php if($URL_ATUAL == '/sistema/dashboard/theme.php'){ echo 'active';} else {echo 'link-dark';}?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          <i class="fa-brands fa-themeco me-2"></i>
          Thema site (em breve)
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <?php if($user->photo == null){?>
        <img src="../img/perfil_standart.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
        <?php }
        else{?>
        <img src="../storage/img/perfil/<?=$user->photo?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <?php }?>
        <strong><?php echo $user->name;?></strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="settings.php?id=<?php echo $user->id?>">Configurações</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <form action="../controllers/singout.php?id=<?php echo $user->id?>" method="post">
                <input class="dropdown-item" type="submit" id="singout" value="Sign out">
            </form>
        </li>
      </ul>
    </div>
</div>