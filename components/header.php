<?php
include './database/users-repository.php';
$user = find_by_id($connection, get_user_id());
?>
<header id="header">
  <input type="checkbox" name="" id="chek">
  <label for="chek"><i class="fa-solid fa-bars"></i></label>
  <h1 class="logo">Busca Solidaria</h1>
  <nav>
    <a href="#">Início</a>
    <a href="/orientacao.html">Orientações</a>
    <a href="/desaparecidos.html">Desaparecidos</a>
    <a href="#sobre">Sobre</a>
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
          Editar perfil
        </a>
      </li>

      <li class="profile-dropdown-list-item">
        <a href="#">
          <i class="fa-regular fa-circle-question"></i>
          Ver seus desaparecidos
        </a>
      </li>

      <li class="profile-dropdown-list-item">
        <a href="#">
          <i class="fa-solid fa-sliders"></i>
          Configurações
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