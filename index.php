<?php
include './database/database-connection.php';
include './utils/get-user-id.php';
include './database/missings-repository.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca Solidaria</title>
    <link rel="stylesheet" href="./assets/styles/globals.css">
    <link rel="stylesheet" href="./assets/styles/header.css">
    <link rel="stylesheet" href="./assets/styles/footer.css">
    <link rel="stylesheet" href="./assets/styles/carrossel.css">
    <link rel="stylesheet" href="./assets/styles/about.css">
    <link rel="stylesheet" href="./assets/styles/tudo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/styles/index.css">
    <link rel="stylesheet" href="./assets/styles/form-user.css">
</head>

<body>
    <!-- navbar -->
    <?php
    include './components/header.php';
    ?>

    <div class="content-form">
        <!-- validação -->
        <?php if (empty(get_user_id())): ?>
            <div class="wrapper">
                <!-- tela de login -->
                <?php
                include './components/form-sing-in.php'
                ?>
                <!--tela cadastro-->
                <?php
                include './components/form-sing-up.php'
                ?>
            </div>
        <?php endif ?>
    </div>


    <!--1 section-->
    <section class="one">
        <div class="content-0">
            <h1>Ajude-nos a encontrar aqueles que fazem falta</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quas, amet perferendis,
                eaque ipsum explicabo consequatur voluptas laborum,<br /> culpa error odio temporibus porro consequuntur
                facere veritatis nobis adipisci fugit minima! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quas, amet perferendis,
                eaque ipsum explicabo consequatur voluptas laborum,<br /> culpa error odio temporibus porro consequuntur
                facere veritatis nobis adipisci fugit minima!
            </p>
            <a href="/missing-cadastre.html" class="btn">Cadastre aqui</a>
        </div>
    </section>
    <!--fim-->
    <br />


    <!-- carrossel -->
    <h1 class="tit">DESAPARECIDOS RECENTEMENTE</h1>
    <section class="carrossel">
        <div class="wrapper">
            <i id="left" class="fa-solid fa-angle-left"></i>
            <ul class="carousel">
                <li class="card">
                    <div class="img"><img sr="./assets/images/desapecido.jpg" alt="img" draggable="false"></div>
                    <h2>Nome da pessoa 1</h2>
                    <span>Regiao ou qql coisa</span>
                </li>
                <li class="card">
                    <div class="img"><img src="./assets/images/desapecido.jpg" alt="img" draggable="false"></div>
                    <h2>Nome da pessoa 2</h2>
                    <span>Regiao ou qql coisa</span>
                </li>
                <li class="card">
                    <div class="img"><img src="./assets/images/desapecido.jpg" alt="img" draggable="false"></div>
                    <h2>Nome da pessoa 3</h2>
                    <span>Regiao ou qql coisa</span>
                </li>
                <li class="card">
                    <div class="img"><img src="./assets/images/desapecido.jpg" alt="img" draggable="false"></div>
                    <h2>Nome da pessoa 4</h2>
                    <span>Regiao ou qql coisa</span>
                </li>
                <li class="card">
                    <div class="img" draggable="false"><img src="./assets/images/desapecido.jpg" alt="img"></div>
                    <h2>Nome da pessoa 5</h2>
                    <span>Regiao ou qql coisa</span>
                </li>
                <li class="card">
                    <div class="img"><img src="./assets/images/desapecido.jpg" alt="img" draggable="false"></div>
                    <h2>Nome da pessoa 6</h2>
                    <span>Regiao ou qql coisa</span>
                </li>
                <li class="card">
                    <div class="img"><img src="./assets/images/desapecido.jpg" alt="img" draggable="false"></div>
                    <h2>Nome da pessoa 7</h2>
                    <span>Regiao ou qql coisa</span>
                </li>
                <li class="card">
                    <div class="img"><img src="./assets/images/desapecido.jpg" alt="img" draggable="false"></div>
                    <h2>Nome da pessoa 8</h2>
                    <span>Regiao ou qql coisa</span>
                </li>
                <li class="card">
                    <div class="img"><img src="./assets/images/desapecido.jpg" alt="img" draggable="false"></div>
                    <h2>Nome da pessoa 9</h2>
                    <span>Regiao ou qql coisa</span>
                </li>
                <li class="card">
                    <div class="img"><img src="./assets/images/desapecido.jpg" alt="img" draggable="false"></div>
                    <h2>Nome da pessoa 10</h2>
                    <span>Regiao ou qql coisa</span>
                </li>
            </ul>
            <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
    </section>

    <section class="kids">
        <div class="content">
            <div>

            </div>
    </section>
    <!-- fim carrossel -->

    <!-- <section class="forms"> 
    <div id="about">
		<h1 class="seccion">O QUE FAZEMOS?</h1>
		<div class="borde"></div>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis auctor massa at tincidunt. Suspendisse aliquam fringilla finibus. Fusce in lobortis urna. Phasellus urna nulla, euismod a sem at, tristique fringilla mi. Nulla et semper leo. Proin aliquet faucibus velit, at luctus turpis lacinia vitae. Duis tristique id orci aliquam fermentum. Donec laoreet sollicitudin nibh in mattis. In condimentum nunc eget purus gravida rhoncus.</p>
	</div>
  </section>-->

    <!-- <section class="sobre" id="sobre"> 
    sobre nos
</section>-->

    <!--<h1 class="tit">SOBRE</h1>
  <div class="sobre">
    <ul class="sobre-text">
          <p>O Busca Solidária surgiu em 2024 a partir de um projeto de TCC realizados por alunos da ETEC Parque da Juventude do curso de Desenvolvimento de Sistemas. Tem o objetivo de ajudar as pessoas que possuem entes queridos desaparecidos a encontrá-los, além de trazer consigo um papel de conscientização da população.</p>
    </ul>
  </div>-->
    <h1 class="tit">SOBRE NÓS</h1>
    <section class="about">

        <div class="about-content">
            <div class="left">
                <img class="img1" src="./assets/images/proj.jpg" alt="About" />
                <img class="img1" src="./assets/images/proj.jpg" alt="About" />
            </div>

            <div class="right">
                <h3>Ajudando a sociedade</h3>
                <p>O Busca Solidária surgiu em 2024 a partir de um projeto de TCC realizados por alunos da ETEC Parque da Juventude do curso de Desenvolvimento de Sistemas. Tem o objetivo de ajudar as pessoas que possuem entes queridos desaparecidos a encontrá-los, além de trazer consigo um papel de conscientização da população.</p>
                <br />
                <h3>Ajudando a sociedade</h3>
                <p>O Busca Solidária surgiu em 2024 a partir de um projeto de TCC realizados por alunos da ETEC Parque da Juventude do curso de Desenvolvimento de Sistemas. Tem o objetivo de ajudar as pessoas que possuem entes queridos desaparecidos a encontrá-los, além de trazer consigo um papel de conscientização da população.</p>
            </div>
        </div>
        </div>
    </section>

    <!-- INTEGRANTES -->
    <h1 class="tit">INTEGRANTES</h1>
    <section class="int">
        <div class="content-2">
            <ul class="ul1">
                <img src="./assets/images/henry.jpeg" alt="" class="henry">
                <h2>Henry</h2>
                <span class="detail">Desenvolvedor</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
            </ul>
            <ul class="ul2">
                <img src="./assets/images/" alt="" class="thay">
                <h2>Thayssa</h2>
                <span class="detail">Desenvolvedora</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
            </ul>
            <ul class="ul3">
                <img src="./assets/images/soso.jpeg" alt="" class="soso">
                <h2>Sophia</h2>
                <span class="detail">Desenvolvedora</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
            </ul>
            <ul class="ul4">
                <img src="./assets/images/vitoria2.jpeg" alt="" class="vicky">
                <h2>Vitória</h2>
                <span class="detail">Desenvolvedora</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
            </ul>
            <ul class="ul5">
                <img src="./assets/images/soso.jpeg" alt="" class="rib">
                <h2>Ribeiro</h2>
                <span class="detail">Desenvolvedora</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
            </ul>
        </div>
    </section>

    <!-- video -->

    <div class="video-wrapper">
        <iframe id="video-in" width="560" height="315"
            src="https://www.youtube-nocookie.com/embed/2ixfkddD7xs?si=O_poGJMyXCmqs5AA" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
    </div>

    <!-- <script src="/assets/js/header.js"></script> -->
    <script src="/assets/js/carrossel.js" defer></script>

    <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'pt',
                includedLanguages: 'es,en,fr,it,de', // Lista de idiomas
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


    <!-- sonner -->
    <?php
    include './components/sonner.php';
    ?>


    <!-- rodapé -->
    <?php
    include './components/footer.php'
    ?>

    <!-- libras -->
    <?php
    include './components/libras.php'
    ?>

    <!-- javascript -->
    <script src="./assets/javascript/handle-form-user.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="./assets/javascript/carrossel.js" defer></script>
    <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>