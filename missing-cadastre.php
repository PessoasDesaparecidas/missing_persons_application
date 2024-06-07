<?php
session_start();
include './database/database-connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de desaparecidos</title>
    <link rel="icon" href="./assets/images/favicon.png">
    <link rel="stylesheet" href="./assets/styles/missing-cadastre.css">
    <link rel="stylesheet" href="./assets/styles/globals.css">

</head>

<body>

    <!-- navbar -->
    <?php
    include './components/header.php';
    ?>

    <!-- content  -->
    <main>
        <h1>
            Cadastro de pessoas desaparecidos
        </h1>

        <form action="missing-cadastre-action.php" method="POST" class="form-register-missing" enctype="multipart/form-data">

            <img src="./assets/images/missing-image-example-form.jpg" alt="" id="missing-image" style="
            width: 100px;
            height: 100px;
            border-radius: 100%;
            object-fit: cover;">

            <div class="form-control">
                <label for="nome_desaparecido">nome :</label>
                <input type="text" name="nome_desaparecido" id="nome_desaparecido" required>
            </div>

            <div class="form-control">
                <label for="exampleFormControlInput1" class="form-label">Foto</label>
                <input type="file" class="form-control" id="exampleFormControlInput1" name="imagem" accept="image/*">
            </div>



            <div class="form-control">
                <label for="contato_desaparecido">contato:</label>
                <input type="tel" name="contato_desaparecido" id="contato_desaparecido" required>
            </div>

            <div class="form-control">
                <label for="observacao_desaparecido">observação:</label>
                <textarea name="observacao_desaparecido" id="observacao_desaparecido"></textarea>
            </div>

            <div class="form-control">
                <label for="data_desaparecimento">data desaparecimento</label>
                <input type="date" name="data_desaparecimento" id="data_desaparecimento" required>
            </div>

            <div class="form-control">
                <label for="data_nascimento">data nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
            </div>

            <div class="form-control">
                <label for="local_desaparecimento">região</label>
                <select name="local_desaparecimento" id="local_desaparecimento">
                    <option value="zona-norte">
                        Zona Norte de São Paulo.
                    </option>
                    <option value="zona-sul">
                        Zona Sul de São Paulo.
                    </option>
                    <option value="zona-leste">
                        Zona Leste de São Paulo.
                    </option>
                    <option value="zona-oeste">
                        Zona Oeste de São Paulo.
                    </option>
                    <option value="zona-central">
                        Zona Central de São Paulo.
                    </option>
                </select>
            </div>

            <button type="submit" name="btn-cdastre-missing">
                cadastrar
            </button>
        </form>
    </main>

    <!-- rodapé -->
    <?php
    include './components/footer.php'
    ?>
    <!-- javascript -->
    <script src=" ./assets/javascript/handle-form-user.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./assets/javascript/handler-image-missing-in-form-register.js" defer></script>
</body>

</html>