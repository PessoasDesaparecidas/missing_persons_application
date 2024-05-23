<?php 
if(isset($_POST['submit-form-register'])){
    $name = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['senha'];

    if(!empty($email) || !empty($name) || !empty($password)){
       
        $query = "SELECT * FROM Usuario WHERE email_usuario = '{$email}'";
        $result = mysqli_query($connection, $query);
        $existing_user = mysqli_num_rows($result);
        
        if(!$existing_user){
            $query = "INSERT INTO Usuario (nome_usuario, email_usuario , senha_usuario, esta_banido)
            VALUES('{$name}', '{$email}', '{$password}', False)";
        
            $result = mysqli_query($connection, $query);
            
            if($result){
                echo 'user cadastrado';
            }
        }
        
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