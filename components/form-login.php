<?php
if(isset($_POST['btn-login'])){
    
$email = mysqli_real_escape_string($connection, $_POST['email']);
$senha = mysqli_real_escape_string($connection, $_POST['senha']);

$query = "SELECT id_usuario, email_usuario FROM Usuario WHERE email_usuario = '{$email}' AND senha_usuario = '{$senha}'";

$result = mysqli_query($connection, $query);

$row = mysqli_num_rows($result);
if ($row == 1) {
    $user = $result->fetch_assoc();
    $_SESSION['id_user'] = $user['id_user'];  
    $_SESSION['errors'] =''; 
} else {
    $_SESSION['errors'] = 'Usuario invalido';
    $_SESSION['id_user'] = '';
}
}
?>


<span class="icon-close">
    <ion-icon name="close"></ion-icon>
</span>
<div class="form-box login" id="login">
    <h2>Login</h2>
    <form action="" method="POST">
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