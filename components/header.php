
<!--comeco da nav-->
<header>
    <input type="checkbox" name="" id="chek">
    <label for="chek"><i class="fa-solid fa-bars"></i></label>
    <h1 class="logo">Busca Solidaria</h1>
    <nav>
        <a href="#">Inicio</a>
        <a href="/orientacao.html">Orientações</a>
        <a href="/desaparecidos.html">Desaparecidos</a>
        <a href="#sobre">Sobre</a>
    </nav>
    <?php if (get_user_id()) : ?>
        <a class="btn" href="sing-out.action.php" id="sing-out-action"> logout </a>
    <?php else : ?>
        <a href="#" class="btn" id="button-login">login</a>
    <?php endif ?>

</header>
<!--fim da nav-->