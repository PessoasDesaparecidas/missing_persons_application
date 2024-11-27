<div class="form-box register" id="register">
  <h2>
    <?php if ($language == "pt"): ?>
      Cadastro
    <?php elseif ($language == "es"): ?>
      Registro
    <?php elseif ($language == "en"): ?>
      Register


    <?php endif; ?>
  </h2>
  <form action="sing-up.action.php" method="POST" id="form-sing-up" enctype="multipart/form-data">

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
    <div class="input-photo">
      <input type="file" accept="image/*" id="imagem" name="imagem" required>
    </div>

    <div class="input-terms-of-use">
      <input type="checkbox" name="terms-of-use" id="terms-of-use" value="terms-of-use" required>


      <?php if ($language == "pt"): ?>
        <span>li e aceito os <a href="./assets/files/terms-of-use.pdf" target="_blank">termos</a> de
          uso</span>

      <?php elseif ($language == "es"): ?>
        <span>He leído y acepto los <a href="./assets/files/terms-of-use.pdf" target="_blank">términos</a> de
          uso</span>

      <?php elseif ($language == "en"): ?>
        <span>I have read and accept the <a href="./assets/files/terms-of-use.pdf" target="_blank">terms</a> of
          use</span>


      <?php endif; ?>
    </div>

    <button type="submit" class="btn" name="submit-form-register">
      <?php if ($language == "pt"): ?>
        Cadastrar
      <?php elseif ($language == "es"): ?>
        Registro
      <?php elseif ($language == "en"): ?>
        Register
      <?php endif; ?>


    </button>
    <div class="login-register">
      <p>
        <?php if ($language == "pt"): ?>
          Já possui uma conta?
        <?php elseif ($language == "es"): ?>
          ¿Ya tienes una cuenta?
        <?php elseif ($language == "en"): ?>
          Already have an account?


        <?php endif; ?>
      </p>
      <a class="login-link" name="button-sing-in-user">Login</a>
    </div>
  </form>
</div>