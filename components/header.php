<?php
include './database/users-repository.php';
$user = find_by_id($connection, get_user_id());
?>
<header id="header">
  <input type="checkbox" name="" id="chek">
  <label for="chek"><i class="fa-solid fa-bars"></i></label>

  <h1 class="logo">
    <?php if ($language == "pt"): ?>
      Busca Solidária
    <?php elseif ($language == "es"): ?>
      Búsqueda Solidaria
    <?php elseif ($language == "en"): ?>
      Solidarity Search

    <?php endif; ?>
  </h1>
  <nav>

    <?php if ($language == "pt"): ?>
      <a href="./index.php?lg=pt">Início</a>
      <a href="./orientacao.php?lg=pt">Orientações</a>
      <a href="./desaparecidos.php?lg=pt">Desaparecidos</a>
      <a href="./index.php#about">Sobre</a>
      <a href="./termos.php?lg=pt">Termos</a>

    <?php elseif ($language == "es"): ?>
      <a href="./index.php?lg=es">Inicio</a>
      <a href="./orientacao.php?lg=es">Orientaciones</a>
      <a href="./desaparecidos.php?lg=es">Desaparecido</a>
      <a href="./index.php#about">Acerca de</a>
      <a href="./termos.php?lg=es">Términos</a>

    <?php elseif ($language == "en"): ?>
      <a href="./index.php?lg=en">Home</a>
      <a href="./orientacao.php?lg=en">Guidelines</a>
      <a href="./desaparecidos.php?lg=en">Missing</a>
      <a href="./index.php#about">About</a>
      <a href="./termos.php?lg=en">Terms</a>

    <?php endif; ?>

  </nav>

  <!--começa drop de perfil-->
  <div class="profile-dropdown     <?php if (!get_user_id()) echo 'invisible' ?> ">
    <div class="profile-dropdown-btn">
      <div class="profile-img" style="background-image: url(./assets/uploads/users/<?php echo $user['user_photo'] ?>);">
      </div>
      <span>
        <?php echo $user["username"] ?>
        <i class="fa-solid fa-angle-down"></i>
      </span>
    </div>

    <ul class="profile-dropdown-list">
      <li class="profile-dropdown-list-item">
        <a href="./perfil.php#edit-perfil">
          <i class="fa-regular fa-user"></i>
          <?php if ($language == "pt"): ?>
            Editar perfil

          <?php elseif ($language == "es"): ?>
            Editar perfil
          <?php elseif ($language == "en"): ?>
            Edit profile

          <?php endif; ?>
        </a>
      </li>

      <li class="profile-dropdown-list-item">
        <a href="./perfil.php#missings">
          <i class="fa-regular fa-circle-question"></i>
          <?php if ($language == "pt"): ?>
            Ver seus desaparecidos
          <?php elseif ($language == "es"): ?>
            ver tu desaparecidos
          <?php elseif ($language == "en"): ?>
            See your missing

          <?php endif; ?>
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

  <div class="progress-container">
    <div class="progress-bar" id="progressBar"></div>
  </div>
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