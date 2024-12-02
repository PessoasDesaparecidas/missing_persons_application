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
    <style>
        .select-language-group {
            position: fixed;
            right: 10px;
            top: 40%;
            z-index: 1000;
            background-color: black;
            font-size: 1rem;
            color: white;
            width: auto;
            height: auto;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <!-- nav bar -->

    <div class="prof">
        <?php include './components/header.php'; ?>
        <?php include './components/select-language.php'; ?>

        <div class="container-profile">
            <h4 class="title-profile"> <span><i class="fa-solid fa-gear"></i></span>
                <?php if ($language == "pt"): ?>
                    Configurações de Perfil
                <?php elseif ($language == "es"): ?>
                    Configuración de perfil
                <?php elseif ($language == "en"): ?>
                    Profile Settings
                <?php endif; ?>
            </h4>
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
                            <i class="fa-solid fa-pen"></i>
                            <?php if ($language == "pt"): ?>
                                Editar Perfil
                            <?php elseif ($language == "es"): ?>
                                editar Perfil
                            <?php elseif ($language == "en"): ?>
                                Edit profile
                            <?php endif; ?>

                        </li>
                        <li class="tab-link" data-tab="meus-desap"> <i class="fa-solid fa-person"></i>
                            <?php if ($language == "pt"): ?>
                                Meus Desaparecidos
                            <?php elseif ($language == "es"): ?>
                                Mi desaparición
                            <?php elseif ($language == "en"): ?>
                                My missing
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
                <div class="contentp">
                    <div class="tab active" id="editar-perfil">
                        <form method="post" action="./user-update.action.php" enctype="multipart/form-data">
                            <label for="username">
                                <?php if ($language == "pt"): ?>
                                    Usuário:
                                <?php elseif ($language == "es"): ?>
                                    Usuario:
                                <?php elseif ($language == "en"): ?>
                                    User:
                                <?php endif; ?>
                            </label>
                            <input type="text" placeholder="Nome do usuário" value="<?php echo $user["username"] ?>" name="username" id="username" />


                            <label>Email:</label>
                            <input type="email" placeholder="Seu email" value=<?php echo $user["user_email"] ?> name="user_email" id="user_email" disabled />

                            <label for="password">
                                <?php if ($language == "pt"): ?>
                                    Senha:
                                <?php elseif ($language == "es"): ?>
                                    Contraseña:
                                <?php elseif ($language == "en"): ?>
                                    Password:
                                <?php endif; ?>
                            </label>
                            <input type="password" placeholder="*******" name="password" id="password" />

                            <label class="picture" for="imagem">

                                <?php if ($language == "pt"): ?>
                                    Foto:
                                <?php elseif ($language == "es"): ?>
                                    Foto:
                                <?php elseif ($language == "en"): ?>
                                    Photo:
                                <?php endif; ?></label>
                            <input type="file" accept="image/*" class="picture_input" id="imagem" name="imagem">


                            <button class="button save">
                                <?php if ($language == "pt"): ?>
                                    Salvar Alterações
                                <?php elseif ($language == "es"): ?>
                                    Guardar cambios
                                <?php elseif ($language == "en"): ?>
                                    Save changes
                                <?php endif; ?>
                            </button>
                        </form>
                    </div>
                    <div class="tab" id="meus-desap">
                        <h4 style="font-size: 20px; margin-bottom: 10px">
                            <?php if ($language == "pt"): ?>
                                Meus Desaparecidos
                            <?php elseif ($language == "es"): ?>
                                Mis Desaparecidos
                            <?php elseif ($language == "en"): ?>
                                My missings
                            <?php endif; ?>

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
                                                    <?php if ($language == "pt"): ?>
                                                        Nome:
                                                    <?php elseif ($language == "es"): ?>
                                                        Nombre:
                                                    <?php elseif ($language == "en"): ?>
                                                        Name:
                                                    <?php endif; ?>

                                                </strong> <?php echo $missing["missing_person_name"] ?></p>
                                            <p><strong>
                                                    <?php if ($language == "pt"): ?>

                                                        Visto por último em:
                                                    <?php elseif ($language == "es"): ?>

                                                        Visto por último en:
                                                    <?php elseif ($language == "en"): ?>

                                                        Seen last at:
                                                    <?php endif; ?>
                                                </strong> <?php echo $missing["missing_location"] ?></p>

                                            <p><strong>
                                                    <?php if ($language == "pt"): ?>
                                                        Data do desaparecimento:
                                                    <?php elseif ($language == "es"): ?>
                                                        Fecha de desaparición:
                                                    <?php elseif ($language == "en"): ?>
                                                        Date of disappearance:
                                                    <?php endif; ?>
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

                                    <?php if ($language == "pt"): ?> <h2>Você não possui desaparecidos cadastrados</h2>
                                        <a href="./missing-cadastre.php" class="btn">cadastrar desaparecidos</a>
                                    <?php elseif ($language == "es"): ?> <h2>No tienes la falta registrada</h2>
                                        <a href="./missing-cadastre.php" class="btn">Registar Desaparecido</a>
                                    <?php elseif ($language == "en"): ?> <h2>You do not have registered missing</h2>
                                        <a href="./missing-cadastre.php" class="btn">Register Missing</a>
                                    <?php endif; ?>

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