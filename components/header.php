<header>
    <div class="logo">
        <!-- <a><img src="assets/img/"></a>-->
        <p>Busca Solidária</p>
    </div>
    <nav>
        <ul>
            <li><a href="#inicio" id="inicio">Inicio</a></li>
            <li><a href="sobre.html">Sobre</a></li>
            <li><a href="cadastrodesp.php">Formulário</a></li>
            <?php if ($_SESSION['id_user']): ?>
            <li><a href="logout.php"> logout </a></li>
            <?php else:?>
            <button class="btnLogin-popup"><a>Login</a></button>
            <?php endif?>
        </ul>
    </nav>



</header>