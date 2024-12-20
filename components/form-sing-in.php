<span class="icon-close">
  <ion-icon name="close"></ion-icon>
</span>
<div class="form-box login" id="login">
  <h2>Login</h2>
  <form action="sing-in.action.php" method="POST" id="form-sing-in">
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
      <input type="password" required name="password">
      <label>password</label>
    </div>
    <button type="submit" class="btn" name="btn-login">Login</button>

    <?php if ($language == "pt"): ?>
      <div class="login-register">
        <p>Não possui uma conta?</p>
        <a class="register-link" id="register-link">Cadastrar</a>
      </div>
    <?php elseif ($language == "es"): ?>
      <div class="login-register">
        <p>¿No tienes una cuenta?</p>
        <a class="register-link" id="register-link">Registrarse</a>
      </div>
    <?php elseif ($language == "en"): ?>
      <div class="login-register">
        <p>Don't have an account?</p>
        <a class="register-link" id="register-link">Register</a>
      </div>

    <?php endif; ?>
  </form>
</div>