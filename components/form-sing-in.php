<span class="icon-close">
    <ion-icon name="close"></ion-icon>
</span>
<div class="form-box login" id="login">
    <h2>Login</h2>
    <form action="sing-in.action.php" method="POST">
        <div class="input-box">
            <span class="icon">
                <ion-icon name="mail"></ion-icon>
            </span>
            <input type="e-mail" required name="email">
            <label>Email</label>
        </div>
        <div class="input-box">
            <span class="icon">
                <ion-icon name="lock-closed"></ion-icon>
            </span>
            <input type="password" required name="senha">
            <label>Senha</label>
        </div>
        <button type="submit" class="btn" name="btn-login">Login</button>
        <div class="login-register">
            <p>Não possui uma conta?</p>
            <a href="#" class="register-link">Cadastrar</a>
        </div>
    </form>
</div>