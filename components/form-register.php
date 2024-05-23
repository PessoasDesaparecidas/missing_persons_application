  <div class="form-box register" id="register">
      <h2>Cadastro</h2>
      <form action="cadastro.php" method="POST">
          <?php
            if ($_SESSION['status_cadastro']) :
            ?>
              <p>cadastro efetuado com sucesso. faça login <a href="#form-box login">aqui</a></p>
          <?php
            endif;
            unset($_SESSION['status_cadastro']);
            ?>
          <div class="input-box">
              <span class="icon">
                  <ion-icon name="person"></ion-icon></span>
              <input type="text" required name="nome">
              <label>Usuário</label>
          </div>
          <div class="input-box">
              <span class="icon">
                  <ion-icon name="mail"></ion-icon></span>
              <input type="e-mail" required name="email">
              <label>Email</label>
          </div>
          <div class="input-box">
              <span class="icon">
                  <ion-icon name="lock-closed"></ion-icon></span>
              <input type="password" required name="senha">
              <label>Senha</label>
          </div>
          <button type="submit" class="btn">Cadastrar</button>
          <div class="login-register">
              <p>Já possui uma conta?</p>
              <a href="#" class="login-link">Login</a>
          </div>
      </form>
  </div>