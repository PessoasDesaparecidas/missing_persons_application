<?php


include './database/database-connection.php';
include './database/missings-repository.php';
include './utils/get-user-id.php';
include './utils/select-language.php';


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/styles/header.css" />
    <link rel="stylesheet" href="./assets/styles/desapa.css" />
    <link rel="stylesheet" href="./assets/styles/orient.css" />
    <link rel="stylesheet" href="./assets/styles/perfil.css" />
    <link rel="icon" href="./assets/images/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Perfil </title>
</head>

<body>
    <!-- nav bar -->

    <div class="prof">
        <?php include './components/header.php'; ?>
        <div class="container-profile">
            <h4 class="title-profile"> <span><i class="fa-solid fa-gear"></i></span> Configurações de Perfil</h4>
            <div class="profile-settings">
                <div class="sidebar">
                    <div class="profile-photo">
                        <img
                            src="./assets/uploads/users/<?php echo $user["user_photo"] ?>"
                            alt="Foto de Perfil" />
                        <h2>
                            <?php echo $user["username"] ?>
                        </h2>
                    </div>
                    <ul>
                        <li class="tab-link active" data-tab="editar-perfil">
                            <i class="fa-solid fa-pen"></i> Editar Perfil
                        </li>
                        <li class="tab-link" data-tab="meus-desap"> <i class="fa-solid fa-person"></i> Meus Desaparecidos</li>
                    </ul>
                </div>
                <div class="contentp">
                    <div class="tab active" id="editar-perfil">
                        <form method="post" action="./user-update.action.php" enctype="multipart/form-data">
                            <label for="username">Usuário:</label>
                            <input type="text" placeholder="Nome do usuário" value="<?php echo $user["username"] ?>" name="username" id="username" />


                            <label>Email:</label>
                            <input type="email" placeholder="Seu email" value=<?php echo $user["user_email"] ?> name="user_email" id="user_email" disabled />

                            <label for="password">Senha:</label>
                            <input type="password" placeholder="*******" name="password" id="password" />

                            <label class="picture" for="imagem">Foto</label>
                            <input type="file" accept="image/*" class="picture_input" id="imagem" name="imagem">


                            <button class="button save">Salvar Alterações</button>
                        </form>
                    </div>
                    <div class="tab" id="meus-desap">
                        <h4 style="font-size: 20px; margin-bottom: 10px">
                            Meus Desaparecidos
                        </h4>
                        <div class="row">
                            <?php
                            $missings = fetch_missings_by_user_id($connection, get_user_id(), 0);
                            if ($missings->num_rows > 0):
                            ?>
                                <?php while ($missing = $missings->fetch_assoc()): ?>
                                    <div class="cardp">
                                        <img
                                            src="./assets/uploads/missings/<?php echo $missing["missing_person_photo"] ?>"
                                            alt="Desaparecido <?php echo $missing["missing_person_name"] ?>" />
                                        <div class="card-body">
                                            <p><strong>
                                                    Nome:
                                                </strong> <?php echo $missing["missing_person_name"] ?></p>
                                            <p><strong>
                                                    Visto por último em:
                                                </strong> <?php echo $missing["missing_location"] ?></p>

                                            <p><strong>
                                                    Data do desaparecimento:
                                                </strong>
                                                <?php
                                                $date = new DateTime($missing["missing_date"]);
                                                $formatted_date = $date->format('d/m/Y');
                                                echo  $formatted_date ?>
                                            </p>
                                            <div class="buttons">
                                                <a href="./missing-update.php?missing-id=<?php echo $missing['missing_person_id'] ?>" class="button">Editar</a>
                                                <a href="./missing-delete.action.php?missing-id=<?php echo $missing["missing_person_id"] ?>" class="button">Deletar</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <div class="not-missing">

                                    <h2>Você não possui desaparecidos cadastrados</h2>
                                    <a href="./missing-cadastre.php" class="btn">cadastrar desaparecidos</a>
                                </div>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.querySelectorAll(".tab-link").forEach((link) => {
            link.addEventListener("click", function() {
                document
                    .querySelectorAll(".tab-link")
                    .forEach((item) => item.classList.remove("active"));
                document
                    .querySelectorAll(".tab")
                    .forEach((item) => item.classList.remove("active"));

                this.classList.add("active");
                const tabId = this.getAttribute("data-tab");
                document.getElementById(tabId).classList.add("active");
            });
        });
    </script>

    <?php
    include './components/libras.php';
    ?>

    <?php
    include './components/sonner.php';
    ?>

    <script>
        // Função para detectar a âncora na URL
        function checkAnchorOnLoad() {
            const hash = window.location.hash; // Obtém o fragmento da URL
            if (hash) {
                switch (hash) {
                    case "#perfil-edit":
                        document.querySelector("#meus-desap").classList.remove("active")
                        document.querySelector("#editar-perfil").classList.add("active");
                        document.querySelectorAll(".tab-link")[0].classList.add("active")
                        document.querySelectorAll(".tab-link")[1].classList.remove("active")
                        break
                    case "#missings":
                        document.querySelector("#meus-desap").classList.add("active");
                        document.querySelector("#editar-perfil").classList.remove("active")
                        document.querySelectorAll(".tab-link")[0].classList.remove("active")
                        document.querySelectorAll(".tab-link")[1].classList.add("active")
                        break
                }
            } else {
                console.log('Nenhuma âncora foi utilizada.');
            }
        }

        // Chama a função ao carregar a página
        checkAnchorOnLoad();
    </script>
    <script src="./assets/javascript/header.js"></script>
    <!-- lib de icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>