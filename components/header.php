<header>
  <div class="logo">
    <!-- <a><img src="assets/img/"></a>-->
    <p>
      <a href="./index.php">
        Busca Solidária
      </a>
    </p>
  </div>
  <nav>
    <ul>
      <li><a href="./index.php" id="inicio">Inicio</a></li>
      <li><a href="./aboult.php">Sobre</a></li>
      <?php if (get_user_id()) : ?>
      <li><a href="missings-dashboard.php?page=1">desaparecido</a></li>
      <li><a href="sing-out.action.php"> logout </a></li>
      <?php else : ?>
      <button class="btnLogin-popup"><a>Login</a></button>
      <?php endif ?>
    </ul>
  </nav>



</header>