<?php 

if(isset($_POST['submit-form-login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($_POST['email']) || !empty($_POST['password'])){
        $query = "select id_usuario, email_usuario from Usuario where email_usuario = '{$email}' and senha_usuario =  ('{$password}')";
        
        $result = mysqli_query($connection, $query);
        
        $existing_user = mysqli_num_rows($result);
        
        if($existing_user){
            $_SESSION['user_id'] = $existing_user['id_usuario'];

            echo 'user existente';
        }
        
    }

}
?>

<div class="wrapper">
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
                <input type="password" required name="password">
                <label>Senha</label>
            </div>
            <button type="submit" class="btn" name="submit-form-login">Login</button>
            <div class="login-register">
                <p>Não possui uma conta?</p>
                <a href="#" class="register-link">Cadastrar</a>
            </div>
        </form>
    </div>

</div>