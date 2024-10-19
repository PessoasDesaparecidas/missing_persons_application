<div class="form-box register" id="register">
  <h2>Cadastro</h2>
  <form action="sing-up.action.php" method="POST" id="form-sing-up">

    <div class="input-box">
      <span class="icon">
        <ion-icon name="person"></ion-icon>
      </span>
      <input type="text" required name="username">
      <label>Usuário</label>
    </div>
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
    <button type="submit" class="btn" name="submit-form-register">Cadastrar</button>
    <div class="login-register">
      <p>Já possui uma conta?</p>
      <a href="#" class="login-link" name="button-sing-in-user">Login</a>
    </div>
  </form>
</div>