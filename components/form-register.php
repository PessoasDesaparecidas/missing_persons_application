<?php
if (isset($_POST['submit-form-register'])) {
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $usuario = mysqli_real_escape_string($connection, trim($_POST['nome']));
    $senha = mysqli_real_escape_string($connection, trim($_POST['senha']));
    
    $sql = "select count(*) as total from Usuario where nome_usuario = '$usuario'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['total'] == 1) {
        $_SESSION['usuario_existe'] = true;
    
    }
    
    $sql = "INSERT INTO Usuario (email_usuario, nome_usuario, senha_usuario,esta_banido) VALUES ('$email', '$usuario', '$senha')";
    
    if ($connection->query($sql) === TRUE) {
        $_SESSION['status_cadastro'] = true;
    }
}


?>

<div class="form-box register" id="register">
    <h2>Cadastro</h2>
    <form action="" method="POST">

        <div class="input-box">
            <span class="icon">
                <ion-icon name="person"></ion-icon>
            </span>
            <input type="text" required name="nome">
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
            <input type="password" required name="senha">
            <label>Senha</label>
        </div>
        <button type="submit" class="btn" name="submit-form-register">Cadastrar</button>
        <div class="login-register">
            <p>Já possui uma conta?</p>
            <a href="#" class="login-link">Login</a>
        </div>
    </form>
</div>