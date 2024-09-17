<?php
include './database/database-connection.php';
include './utils/get-user-id.php'
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BuscaSolidária</title>
  <link rel="icon" href="./assets/images/favicon.png">
  <link rel="stylesheet" href="./assets/styles/globals.css">
  <link rel="stylesheet" href="./assets/styles/index.css">
  <link rel="stylesheet" href="./assets/styles/form-user.css">
</head>

<body>

  <!-- navbar -->
  <?php
  include './components/header.php';
  ?>

  <!-- se estiver logado não precisa fazer cadatro ou login  -->
  <!-- validação -->
  <?php if (empty(get_user_id())) : ?>
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


  <section>

    <div class="content">
      <ul class="ul1">
        <h3 style="font-size: 50px;">Ajude-nos a encontrar aqueles que fazem falta</h3>
        <p class="p1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quas, amet perferendis,
          eaque ipsum explicabo consequatur voluptas laborum, culpa error odio temporibus porro consequuntur
          facere veritatis nobis adipisci fugit minima! Lorem, ipsum dolor sit amet consectetur adipisicing
          elit. Placeat soluta ad nobis facilis quidem eum, culpa blanditiis suscipit accusantium perspiciatis
          voluptate fugiat, eos autem facere laudantium deleniti debitis voluptatem nam. </p>
        <br />
        <p>Conhece alguém que desapareceu? <a style="color: black; cursor: pointer;" href="cadastrodesp.php">Cadastre
            aqui!</a></p>
        <br />
        <div class="box">
          <form method="GET" action="">
            <div class="search-container">
              <input type="text" name="pesquisar" class="search-input" placeholder="O que você procura...">
              <button class="search-button">Buscar</button>
              <button class="filter-button">Filtrar</button>
            </div>
          </form>
      </ul>
      <ul class="ul1">
        <div class="image">
          <img src="./assets/images/background-home.png" style="height: 300px;">
        </div>
        <!-- <p class="p1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quas, amet perferendis, eaque ipsum explicabo consequatur voluptas laborum, culpa error odio temporibus porro consequuntur facere veritatis nobis adipisci fugit minima! Lorem ipsum dolor sit amet consectetur adipisicing elit. Error placeat molestias corrupti recusandae natus saepe facere autem, sint aliquid consectetur aut beatae mollitia consequatur quos doloremque harum modi, atque dolor!</p> -->
        <!-- <br/> -->
        <!-- <p class="p1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quas, amet perferendis, eaque ipsum explicabo consequatur voluptas laborum, culpa error odio temporibus porro consequuntur facere veritatis nobis adipisci fugit minima! Lorem ipsum dolor sit amet consectetur adipisicing elit. Error placeat molestias corrupti recusandae natus saepe facere autem, sint aliquid consectetur aut beatae mollitia consequatur quos doloremque harum modi, atque dolor!</p> -->
      </ul>
    </div>
    <!-- <button id="btn-form" class="btn-cad">Clique para preencher o formulário</button> -->
  </section>

  <br />

  <section>
    <h1 class="tit">DESAPARECIDOS</h1>
    <div class="content">
      <ul class="uld">
        <div class="image">
          <img src="./assets/images/person-random.jpg" alt="" href="#">
        </div>
        <p>
        <h3>Nome:</h3>Fulaninho da Silva</p>
        <p>
        <h3>Desapareceu em:</h3>DD/MM/AAAA</p>
        <p>
        <h3>Local:</h3> Rua Taltal, 123</p>
        <p>
        <h3>Endereço:</h3>Rua Taltal, 123. Zona Tal.</p>
      </ul>
      <ul class="uld">
        <div class="image">
          <img src="./assets/images/person-random.jpg" alt="" href="#">
        </div>
        <p>
        <h3>Nome:</h3>Fulaninho da Silva</p>
        <p>
        <h3>Desapareceu em:</h3>DD/MM/AAAA</p>
        <p>
        <h3>Local:</h3> Rua Taltal, 123</p>
        <p>
        <h3>Endereço:</h3>Rua Taltal, 123. Zona Tal.</p>
      </ul>
      <ul class="uld">
        <div class="image">
          <img src="./assets/images/person-random.jpg" alt="" href="#">
        </div>
        <p>
        <h3>Nome:</h3>Fulaninho da Silva</p>
        <p>
        <h3>Desapareceu em:</h3>DD/MM/AAAA</p>
        <p>
        <h3>Local:</h3> Rua Taltal, 123</p>
        <p>
        <h3>Endereço:</h3>Rua Taltal, 123. Zona Tal.</p>
      </ul>
      <ul class="uld">
        <div class="image">
          <img src="./assets/images/person-random.jpg" alt="" href="#">
        </div>
        <p>
        <h3>Nome:</h3>Fulaninho da Silva</p>
        <p>
        <h3>Desapareceu em:</h3>DD/MM/AAAA</p>
        <p>
        <h3>Local:</h3> Rua Taltal, 123</p>
        <p>
        <h3>Endereço:</h3>Rua Taltal, 123. Zona Tal.</p>
      </ul>
    </div>
  </section>



  <!-- sonner -->
  <?php
  include './components/sonner.php';
  ?>


  <!-- rodapé -->
  <?php
  include './components/footer.php'
  ?>
  <!-- javascript -->
  <script src="./assets/javascript/handle-form-user.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>