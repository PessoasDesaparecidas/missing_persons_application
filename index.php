<?php

include './database/database-connection.php';
include './database/missings-repository.php';
include './utils/get-user-id.php';
include './utils/select-language.php';
include './database/comments-repository.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca Solidaria</title>

    <link rel="icon" href="./assets/images/favicon.png">
    <link rel="stylesheet" href="./assets/styles/footer.css">
    <link rel="stylesheet" href="./assets/styles/carrossel.css">
    <link rel="stylesheet" href="./assets/styles/about.css">
    <link rel="stylesheet" href="./assets/styles/tudo.css">

    <link rel="stylesheet" href="./assets/styles/header.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
    <!--comeco da nav-->
    <?php include './components/header.php'; ?>
    <!--fim da nav-->

    <?php include './components/select-language.php'; ?>


    <?php if ($language == "pt"): ?>
        <!--1 section-->
        <section class="one">
            <div class="content-0" data-aos="fade-up"
                data-aos-anchor-placement="top-bottom">
                <h1>Ajude-nos a encontrar aqueles que fazem falta.</h1>
                <p>O desaparecimento de pessoas no Brasil é uma questão alarmante, com cerca de 80 mil novos casos anuais,
                    segundo o Anuário Brasileiro de Segurança Pública. Diante da falta de informações claras à população sobre
                    o que fazer em casos de desaparecimento, nossa plataforma procura auxiliar, oferecendo um banco de dados e
                    um sistema para cadastro de pessoas desaparecidas.
                </p>
                <?php if (get_user_id()): ?>
                    <a href="./missing-cadastre.php" class="btn">
                        Cadastre aqui
                    </a>
                <?php else: ?>
                    <a class="btn" id="register-missing-not-authenticated">
                        Cadastre aqui
                    </a>
                    <script>
                        document.querySelector('#register-missing-not-authenticated').addEventListener('click', () => {
                            document.querySelector('.wrapper').classList.add('active-popup');
                        });
                    </script>
                <?php endif; ?>
            </div>
        </section>
        <!--fim-->
        <br />


        <!-- carrossel -->
        <h1 class="tit">DESAPARECIDOS RECENTEMENTE</h1>
        <section class="carrossel" data-aos="fade-up">
            <div class="wrapper">
                <i id="left" class="fa-solid fa-angle-left"></i>
                <ul class="carousel">
                    <?php
                    $recent_missings = fetch_recent_missings($connection, 0);

                    if ($recent_missings->num_rows > 0) :
                    ?>
                        <?php while ($missing = $recent_missings->fetch_assoc()): ?>
                            <div class="card">
                                <div class="card-img">
                                    <img src="./assets/uploads/missings/<?php echo $missing["missing_person_photo"] ?>">
                                </div>
                                <div class="card-body">
                                    <p><strong>
                                            Nome:
                                        </strong> <?php echo $missing["missing_person_name"] ?></p>
                                    <p><strong>
                                            Visto por último em:
                                        </strong> <?php echo $missing["missing_location"] ?></p>

                                    <p><strong>
                                            Data do desaparecimento

                                        </strong>
                                        <?php
                                        $date = new DateTime($missing["missing_date"]);
                                        $formatted_date = $date->format('d/m/Y');
                                        echo  $formatted_date ?>
                                    </p>
                                    <div class="buttons">
                                        <a id="openm" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
                                        <a href="./desaparecido.php?missing-id=<?php echo $missing["missing_person_id"] ?>" class="btn"><i class="fa-solid fa-link"></i> Ver mais sobre</a>
                                    </div>
                                    <dialog id="dialogo">
                                        <p class="description">
                                        <main class="main">
                                            <div class="newPost">
                                                <?php if (get_user_id()): ?>
                                                    <!--formlário de postagem-->

                                                    <div class="infoUser">
                                                        <div class="imgUser">
                                                            <img src="./assets/uploads/users/<?php echo $user["user_photo"] ?>" alt="">
                                                        </div>
                                                        <strong><?php echo $user["username"] ?></strong>
                                                    </div>

                                                    <!--Formulario de envio-->
                                                    <form
                                                        action="./create-comment-by-missing.action.php?missing-id=<?php echo $missing['missing_person_id'] ?>"
                                                        class="formPost" method="post" enctype="multipart/form-data">
                                                        <textarea name=" comment" id="comment" placeholder="Faça seu comentário" required></textarea>
                                                        <input type="text" name="latitude" id="input-latitude-<?php echo $missing['missing_person_id'] ?>"
                                                            value="" class="invisible">
                                                        <input type="text" name="longitude"
                                                            id="input-longitude-<?php echo $missing["missing_person_id"] ?>" value="" class="invisible">

                                                        <div class="iconsAndButton">
                                                            <div class="icons">
                                                                <button class="btnFileForm"><img src="./assets/images/img.svg" alt="Adicionar uma imagem">
                                                                    <input type="file" accept="image/*" class="picture_input" id="imagem" name="imagem"></button>
                                                                <button class="btnFileForm" id="btn-add-current-location" type="button"
                                                                    data-missing-id="<?php echo $missing['missing_person_id']; ?>"><img
                                                                        src="./assets/images/location.svg" alt="Adicionar localização atual"></button>
                                                            </div>
                                                            <button type="submit" class="btnSubmitForm">Publicar</button>
                                                        </div>
                                                    </form>
                                                <?php else: ?>
                                                    <div style="width:100%; height:100%; display:flex; justify-content: center; align-content:center">
                                                        <h3>necessário ter uma conta para comentar :(</h3>
                                                    </div>
                                                <?php endif; ?>
                                            </div>



                                            <!--post de comentário-->
                                            <ul class="posts">
                                                <?php
                                                $comments = fetch_comments_by_missing_id($connection, $missing["missing_person_id"]);
                                                ?>
                                                <?php if ($comments->num_rows > 0): ?>
                                                    <?php while ($comment = $comments->fetch_assoc()): ?>
                                                        <li class="post">
                                                            <div class="infoUserPost">
                                                                <div class="imgUserPost">
                                                                    <img src="./assets/uploads/users/<?php echo $comment["author_image_url"] ?>" alt="">
                                                                </div>
                                                                <div class="nameAndHour">
                                                                    <strong><?php echo $comment["author_name"] ?></strong>
                                                                    <p><?php $date = new DateTime($comment["created_at"]);
                                                                        $formatted_date = $date->format('d/m/Y');
                                                                        echo  $formatted_date  ?></p>
                                                                </div>
                                                            </div>


                                                            <?php if (isset($comment["image_url"])): ?>
                                                                <img src="./assets/uploads/comments/<?php echo $comment["image_url"] ?>" alt=""
                                                                    class="comment-image-url">
                                                            <?php endif; ?>

                                                            <p><?php echo $comment["content"] ?></p>

                                                        </li>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>

                                            </ul>
                                        </main>
                                        </p>
                                        <button id="closem" class="btn" autofocus>Close</button>
                                    </dialog>
                                </div>
                            </div>
                        <?php endwhile ?>
                    <?php endif; ?>
                </ul>
                <i id="right" class="fa-solid fa-angle-right"></i>
            </div>
        </section>
        <!-- fim carrossel -->


        <center>
            <section class="cta-section">
                <div class="cta-content" data-aos="fade-up"
                    data-aos-duration="3000">
                    <h2>
                        <span>Cada minuto importa,</span><br>
                        </br>
                        <strong>cadastre aqui seu </strong>
                        <span class="typing-text"></span>
                    </h2>
                    <p>aumentando a possibilidade de encontra-lo.</p>
                    <small>O preenchimento de formulario não substitui o BO</small>
                    <?php if (get_user_id()): ?>
                        <a href="./missing-cadastre.php" class="btn">Formulario de cadastro</a>

                    <?php else: ?>
                        <a class="btn" id="register-missing-not-authenticated2">
                            Cadastre aqui
                        </a>
                        <script>
                            document.querySelector('#register-missing-not-authenticated2').addEventListener('click', () => {
                                document.querySelector('.wrapper').classList.add('active-popup');
                            });
                        </script>
                    <?php endif; ?>
                </div>
            </section>

        </center>


        <center>
            <section class="spsp" data-aos="fade-up"
                data-aos-anchor-placement="top-bottom">
                <div class="sampa">
                    <div class="image-section">
                        <img src="./assets/images/sp.webp" alt="Descrição da Imagem">
                    </div>
                    <div class="text-section">
                        <p class="subtitle"> No ano de 2024, em uma pesquisa feita pela instituição SSP, aponta cerca de 17.711 pessoas que estavam desaparecidas e foram encontradas em São Paulo. </p>
                        <h1 class="title">Podemos ajudar nessa busca!</h1>
                    </div>
                </div>
            </section>
        </center>



        <section class="faq-section">
            <h2 data-aos="zoom-in">Principais perguntas e informações</h2>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>O que é desaparecimento?</h3>
                <p>Desaparecimento é o sumiço repentino de alguém, sem aviso prévio a familiares ou a terceiros. Uma pessoa é considerada desaparecida quando não pode ser localizada nos lugares que costuma frequentar, nem encontrada de qualquer outra forma.</p>
            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>Quais motivos podem levar ao desaparecimento de alguem?</h3>
                <p>Várias causas podem levar a essa desaparição, por exemplo, conflitos familiares, uso problemático de drogas, alcoolismo, transtorno mental, depressão, violência, dentre outras. O desaparecimento pode ser:

                    </br> Voluntário, quando a pessoa se afasta por vontade própria e sem avisar. Isso pode acontecer por motivos diversos, como desentendimentos, medo, aflição, planos de vida diferentes, entre outros conflitos.
                    </br> Involuntário, quando a pessoa é afastada do cotidiano por um evento sobre o qual não tem controle, como um acidente, um problema de saúde, um desastre natural;
                    </br> Forçado, quando outras pessoas provocam o afastamento, sem a concordância da pessoa, como em um sequestro, ou pela ação do próprio Estado.</p>

            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>Por que agir rápido em caso de desaparecimento?</h3>
                <p>Normalmente, não estamos preparados para vivenciar o desaparecimento de algum ente querido. Ele acontece de repente e sem que se saiba sua causa. Quanto mais rápido você procurar ajuda, mais são as chances de reencontro, especialmente quando se trata de um desaparecimento forçado ou involuntário.</p>
            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>O que fazer em uma situação de desaparecimento voluntário?</h3>
                <p>Toda pessoa tem o direito de mudar de vida, independentemente do motivo. No entanto, quando uma pessoa decide, voluntariamente, se afastar de sua rotina ou do convívio com a família, é importante que ela comunique a decisão de se ausentar. O desaparecimento voluntário abala a rotina de outras pessoas e também do Poder Público, que deve se concentrar na busca de pessoas que desapareceram de forma involuntária ou forçada. É importante compreender que a pessoa que desapareceu por vontade própria tem o direito de, quando encontrada, não retornar ou, não reatar o vínculo familiar, desde que seja maior de idade e capaz de ser responsável por si. Nesses casos, o Poder Público deve apenas comunicar os familiares que o desaparecido foi encontrado e não quer ser localizado.</p>
            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>O que fazer em caso de desaparecimento de crianças, adolescentes e pessoas com transtorno mental?</h3>
                <p>Para a lei, crianças, adolescentes e pessoas com transtorno mental desconhecem a gravidade de mudar de vida sem o apoio da família ou de pessoas próximas. Por isso, elas nunca são consideradas como casos de desaparecimento voluntário e devem imediatamente ser procuradas e reconduzidas a um local seguro. Ou seja, mesmo que ela tenha se esquecido de avisar aonde foi, tenha fugido ou se afastado por vontade própria, é dever do Poder Público procurá-la com a máxima urgência, sem esperar nem um minuto a mais. Se a criança, adolescente ou incapaz tiver desaparecido em razão de violência ou perseguição, ela deverá ser encaminhada a um conselho tutelar ou órgão competente.</p>
            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>O registro do BO só pode ser feito depois de passadas algumas horas?</h3>
                <p>Pelo contrário! Quanto mais rápido você iniciar sua busca, há mais possibilidades de localizar a pessoa desaparecida.</p>
            </div>
        </section>


        <h1 class="tit">SOBRE NÓS</h1>
        <section class="about" id="about">

            <div class="about-content">
                <ul>
                    <p>O Busca Solidária surgiu em 2024 a partir de um projeto de TCC realizados por alunos da ETEC Parque da Juventude do curso de Desenvolvimento de Sistemas. Tem o objetivo de ajudar as pessoas que possuem entes queridos desaparecidos a encontrá-los, por meio de um banco de dados aberto ao público.</p>
                    <br />
                    <p>O Busca Solidária também visa conscientizar e sensibilizar os cidadãos quanto ao desaparecimento de pessoas, além de fornecer orientações quanto ao que deve ser feito ao se deparar com uma situação similar, servindo como uma plataforma auxiliar na busca por desaparecidos.</p>
                </ul>
                <ul>
                    <i class="fa-solid fa-users" style="color: #fff; font-size: 150px;"></i>
                </ul>
            </div>
        </section>

        <!-- INTEGRANTES -->
        <h1 class="tit">INTEGRANTES</h1>
        <section class="int">
            <div class="content-2">
                <ul class="ul1">
                    <img src="assets/images/henry.jpeg" alt="" class="henry">
                    <h2>Henry</h2>
                    <span class="detail">Desenvolvedor</span>
                    <p>18 anos de idade. Técnica em desenvolvimento de sistemas pela Etec Parque da Juventude. Futuro desenvolvedor web.</p>
                </ul>
                <ul class="ul2">
                    <img src="assets/images/thay.jpeg" alt="" class="thay">
                    <h2>Thayssa</h2>
                    <span class="detail">Desenvolvedora</span>
                    <p>17 anos de idade. Técnica em desenvolvimento de sistemas pela Etec Parque da Juventude. Futura médica e programadora.</p>
                    </p>
                </ul>
                <ul class="ul3">
                    <img src="assets/images/soso.jpeg" alt="" class="soso">
                    <h2>Sophia</h2>
                    <span class="detail">Desenvolvedora</span>
                    <p>17 anos de idade. Técnica em desenvolvimento de sistemas pela Etec Parque da Juventude. Futura economista.</p>
                </ul>
            </div>
            <div class="content-22">
                <ul></ul>
                <ul class="ul4">
                    <img src="assets/images/vitoria2.jpeg" alt="" class="vicky">
                    <h2>Vitória</h2>
                    <span class="detail">Desenvolvedora</span>
                    <p>17 anos de idade. Técnica em desenvolvimento de sistemas pela Etec Parque da Juventude. Futura dentista.</p>
                </ul>
                <ul class="ul5">
                    <img src="assets/images/rib.jpeg" alt="" class="rib">
                    <h2>Ribeiro</h2>
                    <span class="detail">Desenvolvedora</span>
                    <p>18 anos de idade. Técnica em desenvolvimento de sistemas pela Etec Parque da Juventude. Futura arquiteta.</p>
                    </p>
                </ul>
            </div>
        </section>
    <?php elseif ($language == "es"): ?>
        <!--1 section-->
        <section class="one">
            <div class="content-0" data-aos="fade-up"
                data-aos-anchor-placement="top-bottom">
                <h1>Ayúdanos a encontrar a los que faltan.</h1>
                <p>La desaparición de las personas en Brasil es un tema alarmante, con unos 80,000 casos nuevos anualmente,
                    Según el anuario de seguridad pública brasileña.Enfrentado a la falta de información clara a la población sobre
                    Qué hacer en casos de desaparición, nuestra plataforma busca ayudar, ofreciendo una base de datos y
                    Un sistema para el registro de personas desaparecidas.
                </p>
                <?php if (get_user_id()): ?>
                    <a href="./missing-cadastre.php" class="btn">
                        Registrarse aquí
                    </a>
                <?php else: ?>
                    <a class="btn" id="register-missing-not-authenticated">
                        Registrarse aquí
                    </a>
                    <script>
                        document.querySelector('#register-missing-not-authenticated').addEventListener('click', () => {
                            document.querySelector('.wrapper').classList.add('active-popup');
                        });
                    </script>
                <?php endif; ?>
            </div>
        </section>
        <!--fim-->
        <br />


        <!-- carrossel -->
        <h1 class="tit">Faltando recientemente</h1>
        <section class="carrossel" data-aos="fade-up">
            <div class="wrapper">
                <i id="left" class="fa-solid fa-angle-left"></i>
                <ul class="carousel">
                    <?php
                    $recent_missings = fetch_recent_missings($connection, 0);

                    if ($recent_missings->num_rows > 0) :
                    ?>
                        <?php while ($missing = $recent_missings->fetch_assoc()): ?>
                            <div class="card">
                                <div class="card-img">
                                    <img src="./assets/uploads/missings/<?php echo $missing["missing_person_photo"] ?>">
                                </div>
                                <div class="card-body">
                                    <p><strong>
                                            Nombre:
                                        </strong> <?php echo $missing["missing_person_name"] ?></p>
                                    <p><strong>
                                            Visto por último en:
                                        </strong> <?php echo $missing["missing_location"] ?></p>

                                    <p><strong>
                                            Fecha de desaparición:
                                        </strong>
                                        <?php
                                        $date = new DateTime($missing["missing_date"]);
                                        $formatted_date = $date->format('d/m/Y');
                                        echo  $formatted_date ?>
                                    </p>
                                    <div class="buttons">
                                        <a id="openm" class="btn"><i class="fa-solid fa-comment"></i> Vio? comentar</a>
                                        <a href="./desaparecido.php?missing-id=<?php echo $missing["missing_person_id"] ?>" class="btn"><i class="fa-solid fa-link"></i> Ver mais sobre</a>
                                    </div>
                                    <dialog id="dialogo">
                                        <p class="description">
                                        <main class="main">
                                            <div class="newPost">
                                                <?php if (get_user_id()): ?>
                                                    <!--formlário de postagem-->

                                                    <div class="infoUser">
                                                        <div class="imgUser">
                                                            <img src="./assets/uploads/users/<?php echo $user["user_photo"] ?>" alt="">
                                                        </div>
                                                        <strong><?php echo $user["username"] ?></strong>
                                                    </div>

                                                    <!--Formulario de envio-->
                                                    <form
                                                        action="./create-comment-by-missing.action.php?missing-id=<?php echo $missing['missing_person_id'] ?>"
                                                        class="formPost" method="post" enctype="multipart/form-data">
                                                        <textarea name=" comment" id="comment" placeholder="Haz tu comentario" required></textarea>
                                                        <input type="text" name="latitude" id="input-latitude-<?php echo $missing['missing_person_id'] ?>"
                                                            value="" class="invisible">
                                                        <input type="text" name="longitude"
                                                            id="input-longitude-<?php echo $missing["missing_person_id"] ?>" value="" class="invisible">

                                                        <div class="iconsAndButton">
                                                            <div class="icons">
                                                                <button class="btnFileForm"><img src="./assets/images/img.svg" alt="Adicionar uma imagem">
                                                                    <input type="file" accept="image/*" class="picture_input" id="imagem" name="imagem"></button>
                                                                <button class="btnFileForm" id="btn-add-current-location" type="button"
                                                                    data-missing-id="<?php echo $missing['missing_person_id']; ?>"><img
                                                                        src="./assets/images/location.svg" alt="Adicionar localização atual"></button>
                                                            </div>
                                                            <button type="submit" class="btnSubmitForm">Publicar</button>
                                                        </div>
                                                    </form>
                                                <?php else: ?>
                                                    <div style="width:100%; height:100%; display:flex; justify-content: center; align-content:center">
                                                        <h3>necesario tener una cuenta para comentar :(</h3>
                                                    </div>
                                                <?php endif; ?>
                                            </div>



                                            <!--post de comentário-->
                                            <ul class="posts">
                                                <?php
                                                $comments = fetch_comments_by_missing_id($connection, $missing["missing_person_id"]);
                                                ?>
                                                <?php if ($comments->num_rows > 0): ?>
                                                    <?php while ($comment = $comments->fetch_assoc()): ?>
                                                        <li class="post">
                                                            <div class="infoUserPost">
                                                                <div class="imgUserPost">
                                                                    <img src="./assets/uploads/users/<?php echo $comment["author_image_url"] ?>" alt="">
                                                                </div>
                                                                <div class="nameAndHour">
                                                                    <strong><?php echo $comment["author_name"] ?></strong>
                                                                    <p><?php $date = new DateTime($comment["created_at"]);
                                                                        $formatted_date = $date->format('d/m/Y');
                                                                        echo  $formatted_date  ?></p>
                                                                </div>
                                                            </div>


                                                            <?php if (isset($comment["image_url"])): ?>
                                                                <img src="./assets/uploads/comments/<?php echo $comment["image_url"] ?>" alt=""
                                                                    class="comment-image-url">
                                                            <?php endif; ?>

                                                            <p><?php echo $comment["content"] ?></p>

                                                        </li>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>

                                            </ul>
                                        </main>
                                        </p>
                                        <button id="closem" class="btn" autofocus>Close</button>
                                    </dialog>
                                </div>
                            </div>
                        <?php endwhile ?>
                    <?php endif; ?>
                </ul>
                <i id="right" class="fa-solid fa-angle-right"></i>
            </div>
        </section>
        <!-- fim carrossel -->


        <center>
            <section class="cta-section">
                <div class="cta-content" data-aos="fade-up"
                    data-aos-duration="3000">
                    <h2>
                        <span>Cada minuto importa,</span><br>
                        </br>
                        <strong>Registrarse aquí </strong>
                        <span class="typing-text"></span>
                    </h2>
                    <p>aumentando la posibilidad de encontrarlo.</p>
                    <small>Formación de formulario no reemplaza BO</small>
                    <?php if (get_user_id()): ?>
                        <a href="./missing-cadastre.php" class="btn">Formulario de inscripción</a>

                    <?php else: ?>
                        <a class="btn" id="register-missing-not-authenticated2">
                            Registrarse aquí
                        </a>
                        <script>
                            document.querySelector('#register-missing-not-authenticated2').addEventListener('click', () => {
                                document.querySelector('.wrapper').classList.add('active-popup');
                            });
                        </script>
                    <?php endif; ?>
                </div>
            </section>

        </center>


        <center>
            <section class="spsp" data-aos="fade-up"
                data-aos-anchor-placement="top-bottom">
                <div class="sampa">
                    <div class="image-section">
                        <img src="./assets/images/sp.webp" alt="Descrição da Imagem">
                    </div>
                    <div class="text-section">
                        <p class="subtitle">En el año 2024, en una encuesta realizada por la institución SSP, señala a unas 17.711 personas que estaban desaparecidas y fueron encontradas en São Paulo.</p>
                        <h1 class="title">¡Podemos ayudar en esta búsqueda!</h1>
                    </div>
                </div>
            </section>
        </center>



        <section class="faq-section">
            <h2 data-aos="zoom-in">Preguntas e información principales</h2>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>¿Qué es la desaparición?</h3>
                <p>La desaparición es la desaparición repentina de alguien, sin previo aviso a los miembros de la familia o terceros.Una persona se considera desaparecida cuando no puede ubicarse en los lugares a los que a menudo asisten, ni se encuentra de ninguna otra manera.</p>
            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>¿Qué razones puede llevar a la desaparición de alguien?</h3>
                <p>Varias causas pueden conducir a esta desaparición, por ejemplo, conflictos familiares, uso problemático de drogas, alcoholismo, trastorno mental, depresión, violencia, entre otros.La desaparición puede ser:

                    </br> Voluntario, cuando la persona se aleja de su propia voluntad y sin previo aviso.Esto puede suceder por varias razones, como desacuerdos, miedo, angustia, diferentes planes de vida, entre otros conflictos.
                    </br> Involuntario, cuando la persona es eliminada de la vida diaria para un evento en el que no tiene control, como un accidente, un problema de salud, un desastre natural;
                    </br> Forzado, cuando otras personas causan eliminación, sin el acuerdo de la persona, como en un secuestro o por la acción del estado.</p>

            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>¿Por qué actuar rápido en caso de desaparición?</h3>
                <p>Por lo general, no estamos preparados para experimentar la desaparición de un ser querido.Sucede de repente y sin conocer tu causa.Cuanto más rápido busque ayuda, más son las posibilidades de reunión, especialmente cuando se trata de una desaparición forzada o involuntaria.</p>
            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>¿Qué hacer en una situación de desaparición voluntaria?</h3>
                <p>Todos tienen derecho a cambiar la vida, independientemente de la razón.Sin embargo, cuando una persona decidirá voluntariamente alejarse de su rutina o de vivir con su familia, es importante que informe la decisión de estar ausente.La desaparición voluntaria sacude la rutina y el poder público de otras personas, lo que debería centrarse en la búsqueda de personas que han desaparecido de manera involuntaria o forzada.Es importante comprender que la persona que ha desaparecido por su cuenta tendrá derecho a, cuando se encuentre, no regresar o no reanudar el vínculo familiar, siempre que sea de edad y capaz de ser responsable de sí mismos.En tales casos, el gobierno solo debe comunicar a los miembros de la familia que se encontró a los desaparecidos y no quiere ser ubicado.</p>
            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>¿Qué hacer en caso de desaparición de niños, adolescentes y personas con trastorno mental?</h3>
                <p>Para la ley, los niños, los adolescentes y las personas con trastorno mental desconocen la gravedad de cambiar sus vidas sin el apoyo de la familia o las personas cercanas.Por lo tanto, nunca se consideran casos de desaparición voluntaria y deben buscar y volver a nombrar de inmediato a un lugar seguro.Es decir, incluso si olvidó advertir dónde estaba, ha huido o lejos de su propia voluntad, es deber del poder público buscar la máxima urgencia, sin siquiera esperar un minuto.Si el niño, el adolescente o el incapaz han desaparecido debido a la violencia o la persecución, debe ser enviado a un consejo de tutela o un organismo competente.
            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>¿Se puede hacer el registro BO solo después de unas horas?</h3>
                <p>¡De lo contrario!Cuanto más rápido comience su búsqueda, es más probable que localice a la persona desaparecida.</p>
            </div>
        </section>


        <h1 class="tit">Sobre nosotros</h1>
        <section class="about" id="about">

            <div class="about-content">
                <ul>
                    <p>La búsqueda de solidaridad llegó en 2024 de un proyecto TCC realizado por estudiantes de ETEC Youth Parque of the Systems Development Course.Su objetivo es ayudar a las personas que tienen queridos seres queridos a encontrarlos a través de una base de datos abierta al público.</p>
                    <br />
                    <p>La búsqueda de solidaridad también tiene como objetivo hacer que los ciudadanos conozcan la desaparición de las personas, además de proporcionar orientación sobre lo que se debe hacer cuando se enfrenta a una situación similar, sirviendo como una plataforma auxiliar en la búsqueda des.</p>
                </ul>
                <ul>
                    <i class="fa-solid fa-users" style="color: #fff; font-size: 150px;"></i>
                </ul>
            </div>
        </section>

        <!-- INTEGRANTES -->
        <h1 class="tit">Miembros</h1>
        <section class="int">
            <div class="content-2">
                <ul class="ul1">
                    <img src="assets/images/henry.jpeg" alt="" class="henry">
                    <h2>Henry</h2>
                    <span class="detail">Desenvolvedor</span>
                    <p>18 años.Técnica de desarrollo de sistemas de ETEC Youth Parque.Desarrollador web futuro.</p>
                </ul>
                <ul class="ul2">
                    <img src="assets/images/thay.jpeg" alt="" class="thay">
                    <h2>Thayssa</h2>
                    <span class="detail">Desenvolvedora</span>
                    <p>17 años.Técnica de desarrollo de sistemas de ETEC Youth Parque.Futuro médico y programador.</p>
                    </p>
                </ul>
                <ul class="ul3">
                    <img src="assets/images/soso.jpeg" alt="" class="soso">
                    <h2>Sophia</h2>
                    <span class="detail">Desenvolvedora</span>
                    <p>17 años.Técnica de desarrollo de sistemas de ETEC Youth Parque.Economista futuro.</p>
                </ul>
            </div>
            <div class="content-22">
                <ul></ul>
                <ul class="ul4">
                    <img src="assets/images/vitoria2.jpeg" alt="" class="vicky">
                    <h2>Vitória</h2>
                    <span class="detail">Desenvolvedora</span>
                    <p>17 años.Técnica de desarrollo de sistemas de ETEC Youth Parque.Futuro dentista.</p>
                </ul>
                <ul class="ul5">
                    <img src="assets/images/rib.jpeg" alt="" class="rib">
                    <h2>Ribeiro</h2>
                    <span class="detail">Desenvolvedora</span>
                    <p>18 años.Técnica de desarrollo de sistemas de ETEC Youth Parque.Futuro arquitecta.</p>
                    </p>
                </ul>
            </div>
        </section>
    <?php elseif ($language == "en"): ?>
        <!--1 section-->
        <section class="one">
            <div class="content-0" data-aos="fade-up"
                data-aos-anchor-placement="top-bottom">
                <h1>Help us find those who are missing.</h1>
                <p>The disappearance of people in Brazil is an alarming issue, with about 80,000 new cases annually,
                    According to the Brazilian Public Security Yearbook.Faced with the lack of clear information to the population about
                    What to do in cases of disappearance, our platform seeks to assist, offering a database and
                    a system for the registration of missing persons.
                </p>
                <?php if (get_user_id()): ?>
                    <a href="./missing-cadastre.php" class="btn">
                        Register here
                    </a>
                <?php else: ?>
                    <a class="btn" id="register-missing-not-authenticated">
                        Register here
                    </a>
                    <script>
                        document.querySelector('#register-missing-not-authenticated').addEventListener('click', () => {
                            document.querySelector('.wrapper').classList.add('active-popup');
                        });
                    </script>
                <?php endif; ?>
            </div>
        </section>
        <!--fim-->
        <br />


        <!-- carrossel -->
        <h1 class="tit">Recently missing</h1>
        <section class="carrossel" data-aos="fade-up">
            <div class="wrapper">
                <i id="left" class="fa-solid fa-angle-left"></i>
                <ul class="carousel">
                    <?php
                    $recent_missings = fetch_recent_missings($connection, 0);

                    if ($recent_missings->num_rows > 0) :
                    ?>
                        <?php while ($missing = $recent_missings->fetch_assoc()): ?>
                            <div class="card">
                                <div class="card-img">
                                    <img src="./assets/uploads/missings/<?php echo $missing["missing_person_photo"] ?>">
                                </div>
                                <div class="card-body">
                                    <p><strong>
                                            name:
                                        </strong> <?php echo $missing["missing_person_name"] ?></p>
                                    <p><strong>
                                            Seen last at:
                                        </strong> <?php echo $missing["missing_location"] ?></p>

                                    <p><strong>
                                            Date of disappearance

                                        </strong>
                                        <?php
                                        $date = new DateTime($missing["missing_date"]);
                                        $formatted_date = $date->format('d/m/Y');
                                        echo  $formatted_date ?>
                                    </p>
                                    <div class="buttons">
                                        <a id="openm" class="btn"><i class="fa-solid fa-comment"></i> It saw?Comment</a>
                                        <a href="./desaparecido.php?missing-id=<?php echo $missing["missing_person_id"] ?>" class="btn"><i class="fa-solid fa-link"></i> See more about</a>
                                    </div>
                                    <dialog id="dialogo">
                                        <p class="description">
                                        <main class="main">
                                            <div class="newPost">
                                                <?php if (get_user_id()): ?>
                                                    <!--formlário de postagem-->

                                                    <div class="infoUser">
                                                        <div class="imgUser">
                                                            <img src="./assets/uploads/users/<?php echo $user["user_photo"] ?>" alt="">
                                                        </div>
                                                        <strong><?php echo $user["username"] ?></strong>
                                                    </div>

                                                    <!--Formulario de envio-->
                                                    <form
                                                        action="./create-comment-by-missing.action.php?missing-id=<?php echo $missing['missing_person_id'] ?>"
                                                        class="formPost" method="post" enctype="multipart/form-data">
                                                        <textarea name=" comment" id="comment" placeholder="Make your comment" required></textarea>
                                                        <input type="text" name="latitude" id="input-latitude-<?php echo $missing['missing_person_id'] ?>"
                                                            value="" class="invisible">
                                                        <input type="text" name="longitude"
                                                            id="input-longitude-<?php echo $missing["missing_person_id"] ?>" value="" class="invisible">

                                                        <div class="iconsAndButton">
                                                            <div class="icons">
                                                                <button class="btnFileForm"><img src="./assets/images/img.svg" alt="Adicionar uma imagem">
                                                                    <input type="file" accept="image/*" class="picture_input" id="imagem" name="imagem"></button>
                                                                <button class="btnFileForm" id="btn-add-current-location" type="button"
                                                                    data-missing-id="<?php echo $missing['missing_person_id']; ?>"><img
                                                                        src="./assets/images/location.svg" alt="Adicionar localização atual"></button>
                                                            </div>
                                                            <button type="submit" class="btnSubmitForm">Publicar</button>
                                                        </div>
                                                    </form>
                                                <?php else: ?>
                                                    <div style="width:100%; height:100%; display:flex; justify-content: center; align-content:center">
                                                        <h3>necessary to have an account to comment :(</h3>
                                                    </div>
                                                <?php endif; ?>
                                            </div>



                                            <!--post de comentário-->
                                            <ul class="posts">
                                                <?php
                                                $comments = fetch_comments_by_missing_id($connection, $missing["missing_person_id"]);
                                                ?>
                                                <?php if ($comments->num_rows > 0): ?>
                                                    <?php while ($comment = $comments->fetch_assoc()): ?>
                                                        <li class="post">
                                                            <div class="infoUserPost">
                                                                <div class="imgUserPost">
                                                                    <img src="./assets/uploads/users/<?php echo $comment["author_image_url"] ?>" alt="">
                                                                </div>
                                                                <div class="nameAndHour">
                                                                    <strong><?php echo $comment["author_name"] ?></strong>
                                                                    <p><?php $date = new DateTime($comment["created_at"]);
                                                                        $formatted_date = $date->format('d/m/Y');
                                                                        echo  $formatted_date  ?></p>
                                                                </div>
                                                            </div>


                                                            <?php if (isset($comment["image_url"])): ?>
                                                                <img src="./assets/uploads/comments/<?php echo $comment["image_url"] ?>" alt=""
                                                                    class="comment-image-url">
                                                            <?php endif; ?>

                                                            <p><?php echo $comment["content"] ?></p>

                                                        </li>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>

                                            </ul>
                                        </main>
                                        </p>
                                        <button id="closem" class="btn" autofocus>Close</button>
                                    </dialog>
                                </div>
                            </div>
                        <?php endwhile ?>
                    <?php endif; ?>
                </ul>
                <i id="right" class="fa-solid fa-angle-right"></i>
            </div>
        </section>
        <!-- fim carrossel -->


        <center>
            <section class="cta-section">
                <div class="cta-content" data-aos="fade-up"
                    data-aos-duration="3000">
                    <h2>
                        <span>Every minute matters,</span><br>
                        </br>
                        <strong>Register here</strong>
                        <span class="typing-text"></span>
                    </h2>
                    <p>increasing the possibility of finding it.</p>
                    <small>Forming of form does not replace BO</small>
                    <?php if (get_user_id()): ?>
                        <a href="./missing-cadastre.php" class="btn">Registration form</a>

                    <?php else: ?>
                        <a class="btn" id="register-missing-not-authenticated2">
                            Register here
                        </a>
                        <script>
                            document.querySelector('#register-missing-not-authenticated2').addEventListener('click', () => {
                                document.querySelector('.wrapper').classList.add('active-popup');
                            });
                        </script>
                    <?php endif; ?>
                </div>
            </section>

        </center>


        <center>
            <section class="spsp" data-aos="fade-up"
                data-aos-anchor-placement="top-bottom">
                <div class="sampa">
                    <div class="image-section">
                        <img src="./assets/images/sp.webp" alt="Descrição da Imagem">
                    </div>
                    <div class="text-section">
                        <p class="subtitle"> In the year 2024, in a survey by the SSP institution, he points out about 17,711 people who were missing and were found in São Paulo. </p>
                        <h1 class="title">We can help in this search!</h1>
                    </div>
                </div>
            </section>
        </center>



        <section class="faq-section">
            <h2 data-aos="zoom-in">MAIN QUESTIONS AND INFORMATION</h2>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>What is disappearance?</h3>
                <p>Disappearance is the sudden disappearance of someone, without notice to family members or third parties.A person is considered missing when it cannot be located in the places they often attend, nor found in any other way.</p>
            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3> What reasons can someone disappear? </h3>
                <p> Several causes may lead to this disappearance, for example family conflicts, problematic use of drugs, alcoholism, mental disorder, depression, violence, among others.The disappearance can be:

                    </br> Volunteer, when the person walks away on his own will and without warning.This can happen for various reasons such as disagreements, fear, distress, different life plans, among other conflicts.
                    Involuntary, when the person is removed from daily life for an event on which he has no control, such as an accident, a health problem, a natural disaster;
                    </br> Forced, when other people cause removal, without the agreement of the person, as in a kidnapping, or by the action of the state itself. </p>

            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>Why act fast in case of disappearance?</h3>
                <p>Usually we are not prepared to experience the disappearance of some loved one.It happens suddenly and without knowing your cause.The faster you seek help, the more the chances of reunion are, especially when it comes to a forced or involuntary disappearance.</p>
            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3> What to do in a voluntary disappearance situation?</h3>
                <p> Everyone has the right to change life, regardless of the reason.However, when a person will voluntarily decide to move away from his routine or from living with his family, it is important that he reports the decision to be absent.Voluntary disappearance shakes other people's routine and public power, which should focus on the pursuit of people who have disappeared in a involuntarily or forced way.It is important to understand that the person who has disappeared on their own will have the right to, when found, do not return or not resume the family bond, provided that it is of age and capable of being responsible for themselves.In such cases, the government should only communicate the family members that the missing was found and does not want to be located. </p>
            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3> What to do in case of disappearance of children, adolescents and people with mental disorder?</h3>
                <p> For the law, children, adolescents and people with mental disorder are unaware of the seriousness of changing their lives without the support of family or close people.Therefore, they are never considered as cases of voluntary disappearance and should immediately be sought and reappointed to a safe place.That is, even if she forgot to warn where she was, she has fled or away from her own will, it is the duty of the public power to look for the utmost urgency, without even waiting for a minute.If the child, adolescent or incapable has disappeared due to violence or persecution, he must be sent to a Guardianship Council or competent body. </p>
            </div>
            <div class="faq-item" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <h3>Can the BO record only be done after a few hours?</h3>
                <p>On the contrary!The faster you start your search, the more possibilities of locating the missing person.</p>
            </div>
        </section>


        <h1 class="tit">SOBRE NÓS</h1>
        <section class="about" id="about">

            <div class="about-content">
                <ul>
                    <p>Solidarity Search came in 2024 from a TCC project carried out by students from Etec Youth Parque of the Systems Development Course.It aims to help people who have dear loved ones to find them through a database open to the public.</p>
                    <br />
                    <p>Solidarity seeking also aims to make citizens aware and raise awareness of the disappearance of people, as well as providing guidelines on what should be done when faced with a similar situation, serving as an auxiliary platform in the search for missing.</p>
                </ul>
                <ul>
                    <i class="fa-solid fa-users" style="color: #fff; font-size: 150px;"></i>
                </ul>
            </div>
        </section>

        <!-- INTEGRANTES -->
        <h1 class="tit">INTEGRANTES</h1>
        <section class="int">
            <div class="content-2">
                <ul class="ul1">
                    <img src="assets/images/henry.jpeg" alt="" class="henry">
                    <h2>Henry</h2>
                    <span class="detail">Developer</span>
                    <p>18 years old.Systems Development Technique from ETEC Youth Parque.Future web developer.</p>
                </ul>
                <ul class="ul2">
                    <img src="assets/images/thay.jpeg" alt="" class="thay">
                    <h2>Thayssa</h2>
                    <span class="detail">Developer</span>
                    <p>17 years old.Systems Development Technique from ETEC Youth Parque.Future Medical and Programmer.</p>
                    </p>
                </ul>
                <ul class="ul3">
                    <img src="assets/images/soso.jpeg" alt="" class="soso">
                    <h2>Sophia</h2>
                    <span class="detail">Developer</span>
                    <p>17 years old.Systems Developer Technique from ETEC Youth Parque.Future economist.</p>
                </ul>
            </div>
            <div class="content-22">
                <ul></ul>
                <ul class="ul4">
                    <img src="assets/images/vitoria2.jpeg" alt="" class="vicky">
                    <h2>Vitória</h2>
                    <span class="detail">Developer</span>
                    <p>17 years old.Systems Development Technique from ETEC Youth Parque.Future dentist.</p>
                </ul>
                <ul class="ul5">
                    <img src="assets/images/rib.jpeg" alt="" class="rib">
                    <h2>Ribeiro</h2>
                    <span class="detail">Developer</span>
                    <p>18 years old.Systems Development Technique from ETEC Youth Parque.Future architect.</p>
                    </p>
                </ul>
            </div>
        </section>
    <?php endif ?>



    <!--rodapé-->
    <?php include './components/footer.php'; ?>
    <!--fim rodapé-->

    <!-- notificação -->
    <?php
    include './components/sonner.php'; ?>

    <!-- vlibras -->
    <?php include './components/libras.php' ?>

    <script src="./assets/javascript/politica.js"></script>
    <script src="./assets/javascript/carrossel.js" defer></script>
    <script src="./assets/javascript/header.js"></script>
    <script src="./assets/javascript/handle-form-user.js"></script>
    <script src="./assets/javascript/comentario.js"></script>

    <script>
        const buttonsAddCurrentLocation = document.querySelectorAll("#btn-add-current-location")


        buttonsAddCurrentLocation.forEach((button) => {
            button.addEventListener("click", () => {
                navigator.geolocation.getCurrentPosition((position) => {
                    const {
                        latitude,
                        longitude
                    } = position.coords;

                    const missingId = button.getAttribute("data-missing-id");
                    console.log(missingId);
                    const inputLatitude = document.querySelector(`#input-latitude-${missingId}`);
                    const inputLongitude = document.querySelector(`#input-longitude-${missingId}`);

                    inputLatitude.value = latitude;
                    inputLongitude.value = longitude;

                    alert("Localização atual adicionada com sucesso!");

                })
            })
        })
    </script>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- lib de icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>

</html>