<header>
    <div class="logo">
        <!-- <a><img src="assets/img/"></a>-->
        <p>Busca Solidária</p>
    </div>
    <nav>
        <ul>
            <li><a href="#inicio" id="inicio">Inicio</a></li>
            <li><a href="sobre.html">Sobre</a></li>
            <?php if ($_SESSION['user_id']) : ?>
                <li><a href="missings-dashboard.php">desaparecido</a></li>
                <li><a href="logout.action.php"> logout </a></li>
            <?php else : ?>
                <button class="btnLogin-popup"><a>Login</a></button>
            <?php endif ?>
        </ul>
    </nav>



</header>