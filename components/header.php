<?php
include './database/users-repository.php';
$user = find_by_id($connection, get_user_id());
?>
<header id="header">
  <input type="checkbox" name="" id="chek">
  <label for="chek"><i class="fa-solid fa-bars"></i></label>
  <h1 class="logo">
    <?php if ($leanguage == "pt"): ?>
    Busca Solidária
    <?php elseif ($leanguage == "es"): ?>
    Búsqueda Solidaria
    <?php elseif ($leanguage == "en"): ?>
    Solidarity Search
    <? endif; ?>
  </h1>
  <nav>

    <?php if ($leanguage == "pt"): ?>
    <a href="./index.php">Início</a>
    <a href="./orientacao.php">Orientações</a>
    <a href="./desaparecidos.php">Desaparecidos</a>
    <a href="#sobre">Sobre</a>
    <?php elseif ($leanguage == "es"): ?>
    <a href="./index.php">Inicio</a>
    <a href="./orientacao.php">Orientaciones</a>
    <a href="./desaparecidos.php">Desaparecido</a>
    <a href="#about">Acerca de</a>
    <?php elseif ($leanguage == "en"): ?>
    <a href="./index.php">Home</a>
    <a href="./orientacao.php">Guidelines</a>
    <a href="./desaparecidos.php">Missing</a>
    <a href="#sobre">About</a>
    <? endif; ?>

  </nav>

  <!--começa drop de perfil-->
  <div class="profile-dropdown     <?php if (!get_user_id()) echo 'invisible' ?> ">
    <div class="profile-dropdown-btn">

      <div class="profile-img">
        <img src="./assets/uploads/users/<?php echo $user["user_photo"] ?>" alt="iamgem do usuario">
      </div>
      <span>
        <?php echo $user["username"] ?>
        <i class="fa-solid fa-angle-down"></i>
      </span>
    </div>

    <ul class="profile-dropdown-list">
      <li class="profile-dropdown-list-item">
        <a href="#">
          <i class="fa-regular fa-user"></i>
          <?php if ($leanguage == "pt"): ?>
          Editar perfil

          <?php elseif ($leanguage == "es"): ?>
          Editar perfil
          <?php elseif ($leanguage == "en"): ?>
          Edit profile
          <? endif; ?>
        </a>
      </li>

      <li class="profile-dropdown-list-item">
        <a href="#">
          <i class="fa-regular fa-circle-question"></i>
          <?php if ($leanguage == "pt"): ?>
          Ver seus desaparecidos
          <?php elseif ($leanguage == "es"): ?>
          ver tu desaparecidos
          <?php elseif ($leanguage == "en"): ?>
          See your missing
          <? endif; ?>
        </a>
      </li>

      <hr />
      <li class="profile-dropdown-list-item">
        <a href="sing-out.action.php" id="sing-out-action">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          Log out
        </a>
      </li>
    </ul>
  </div>
  <a class="btn <?php if (get_user_id()) echo 'invisible' ?>" id="button-login">login</a>
</header>



<!-- formulario -->

<div class="content-form">
  <div class="wrapper">
    <!-- tela de login -->
    <?php
    include './components/form-sing-in.php'
    ?>
    <!--tela cadastro-->
    <?php
    include './components/form-sing-up.php'
    ?>
  </div>
</div>