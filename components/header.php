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
    <?php if (get_user_id()) : ?>
        <a class="btn" href="sing-out.action.php" id="sing-out-action"> logout </a>
    <?php else : ?>
        <a class="btn" id="button-login">login</a>
    <?php endif ?>
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