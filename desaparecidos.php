<?php
include './database/database-connection.php';
include './database/missings-repository.php';
include './utils/get-user-id.php';
include './utils/select-language.php';
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Busca Solidaria</title>

  <link rel="stylesheet" href="./assets/styles/header.css">
  <link rel="icon" href="./assets/images/favicon.png">
  <link rel="stylesheet" href="./assets/styles/footer.css">
  <link rel="stylesheet" href="./assets/styles/about.css">
  <link rel="stylesheet" href="./assets/styles/tudo.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  .container {
    width: 90%;
    margin: 50px auto;
  }

  .heading {
    text-align: center;
    font-size: 20px;
    margin-bottom: 50px;
    margin-top: 0px;
  }

  .desapare {
    color: #b62222;
    margin-top: 10px;
    text-align: center;
  }

  .row {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-flow: wrap;
    gap: 18px;
  }

  .card {
    width: 20%;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 50px;
    transition: 0.3s;
  }

  .card-img {
    text-align: center;
    padding: 10px;
    margin: 0;
  }

  .card-img img {
    border-radius: 5px;
    height: 225px;
    width: 160px;
  }

  .card-body {
    padding: 10px 20px;
    text-align: center;
    font-size: 15px;
  }

  .card-body .btn {
    background-image: url("./ assets/images/desapecido.jpg");
    display: block;
    color: #fff;
    text-align: center;
    background: #b62222;
    margin-top: 20px;
    /* Diminui o espaçamento superior */
    text-decoration: none;
    padding: 5px 10px;
    /* Diminui o tamanho do botão */
    font-size: 12px;
    /* Ajusta o tamanho do texto */
    border-radius: 5px;
    /* Arredonda os cantos do botão */
  }

  .card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 40px -10px rgba(0, 0, 0, 0.25);
  }

  @media screen and (max-width: 1000px) {
    .card {
      width: 40%;
    }
  }

  @media screen and (max-width: 620px) {
    .container {
      width: 100%;
    }

    .heading {
      padding: 20px;
      font-size: 20px;
    }

    .card {
      width: 80%;
    }
  }


  .hero {
    height: 70vh;
    /* Altura total da tela */
    background: linear-gradient(to bottom, #b6222b, #000000);
    /* Fundo gradiente */
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
  }

  .hero::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: url('https://www.transparenttextures.com/patterns/stardust.png');
    /* Estrelas */
    opacity: 0.1;
    z-index: 1;
  }

  .desas {
    position: relative;
    z-index: 2;
    /* Para garantir que o texto e os botões fiquem acima das estrelas */
    max-width: 100%;
  }

  .desas h1 {
    font-size: 2.4rem;
    margin-bottom: 1em;
    margin-top: 100px;
  }

  .desas p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    line-height: 1.5;
  }

  .search-bar {
    display: flex;
    width: 80%;
    height: 50px;
    align-items: center;
    gap: 8px;
    background-color: #f0f0f0;
    border-radius: 15px;
    padding: 10px 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
    margin-left: 125px;
  }

  .search-input {
    flex: 1;
    border: none;
    background: transparent;
    padding: 10px;
    align-items: center;
    font-size: 16px;
    outline: none;

  }

  .filter-button {
    background-color: #101010;
    color: #fff;
    border: none;
    border-radius: 20px;
    padding: 8px 16px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s;
  }

  .search-button {
    background-color: #0b0b0b;
    color: #fff;
    border: none;
    border-radius: 20px;
    padding: 8px 16px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s;
  }

  .filter-button:hover {
    background-color: #b62222;
  }

  .search-button:hover {
    background-color: #b62222;
  }
  </style>
</head>

<body>
  <!--comeco da nav-->
  <?php include './components/header.php'; ?>
  <!--fim da nav-->


  <section class="hero">
    <div class="desas">
      <h1>Seu olhar atento pode ser a esperança de um reencontro.</h1>
      <p>Reconhece algum desses rostos? Pesquise pelo nome, características ou idade e ajude-nos </br>a trazer alguém de
        volta para casa. </p>
      <div class="search-bar">
        <input type="text" class="search-input" placeholder="Procure aqui...">
        <button class="filter-button">Filtrar</button>
        <button class="search-button">Buscar</button>
      </div>
    </div>
  </section>
  <!-- cards -->

  <div class="container">

    <div class="heading">
      <h1 class="desapare">Desaparecidoss</h1>
    </div>
    <div class="row">
      <div class="card">
        <div class="card-img">
          <img src="./assets/images/dimi.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="./assets/images/desapecido.jpg">
        </div>
        <div class="card-body">
          <p><strong> Nome: </strong> Fulaninho da Silva</p>
          <p><strong> Nascimento: </strong> dd/mm/aaaa</p>
          <p><strong> Visto por último em: </strong> endereço endereço</p>
          <a href="#" class="btn"><i class="fa-solid fa-comment"></i> Viu? Comente</a>
        </div>
      </div>
    </div>
  </div>
  <!-- fim cards -->

  <section class="social-media-section">
    <h2>Junte-se a nós nas redes sociais</h2>
    <div class="features">
      <div class="feature">
        <div class="icon">
          <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" alt="Instagram" />
        </div>
        <h3>Instagram</h3>
        <p>Siga-nos no Instagram para acompanhar as informações e atualizações.</p>
      </div>
      <div class="feature">
        <div class="icon">
          <img src="https://cdn-icons-png.flaticon.com/512/3046/3046121.png" alt="TikTok" />
        </div>
        <h3>TikTok</h3>
        <p>Para alcançar o maximo de jovens com informações sobre o desparecido no nosso TikTok.</p>
      </div>
      <div class="feature">
        <div class="icon">
          <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" />
        </div>
        <h3>Facebook</h3>
        <p>Curta nossa página no Facebook para atualizações e encontro especiais.</p>
      </div>
    </div>
  </section>


  <section class="sobre" id="sobre">
    SOBRE NOS!!
  </section>



  <?php
  session_start();
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

  <!--fim rodapé-->
  <script src="./assets/javascript/politica.js"></script>
  <script src="./assets/javascript/header.js"></script>
  <script src="./assets/javascript/handle-form-user.js"></script>
  <script src="./assets/javascript/comentario.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
  AOS.init();
  </script>
</body>

</html>