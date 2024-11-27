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
  <title>
    <?php if ($language == "pt"): ?>
    Busca Solidária
    <?php elseif ($language == "es"): ?>
    Búsqueda Solidaria
    <?php elseif ($language == "en"): ?>
    Solidarity Search
    <?php endif; ?>
  </title>
  <link rel="stylesheet" href="./assets/styles/globals.css">
  <link rel="stylesheet" href="./assets/styles/comentario.css">
</head>

<body>
  <main class="main">
    <!--formlário de postagem-->
    <div class="newPost">
      <div class="infoUser">
        <div class="imgUser"></div>
        <strong>Douglas Souza</strong>
      </div>
      <!--Formulario de envio-->
      <form action="" class="formPost">
        <textarea name="textarea" placeholder="Faça seu comentário"></textarea>

        <div class="iconsAndButton">
          <div class="icons">
            <button class="btnFileForm"><img src="./assets/images/img.svg" alt="Adicionar uma imagem"></button>
            <button class="btnFileForm"><img src="./assets/images/video.svg" alt="Adicionar um video"></button>
          </div>
          <button type="submit" class="btnSubmitForm">
            <?php if ($language == "pt"): ?>
            Publicar
            <?php elseif ($language == "es"): ?>
            Publicar
            <?php elseif ($language == "en"): ?>
            Publish
            <?php endif; ?>
          </button>
        </div>
      </form>
    </div>

    <!--post de comentário-->
    <ul class="posts">
      <li class="post">
        <div class="infoUserPost">
          <div class="imgUserPost"></div>
          <div class="nameAndHour">

            <strong>Douglas Pukas</strong>
            <p>00h</p>
          </div>
        </div>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe veritatis nemo quibusdam? Consequatur
          reiciendis odio aliquam, similique, quo ex tempore eligendi provident odit blanditiis qui vel autem voluptatem
          a
          neque?</p>
        <div class="actionBtnPost">
          <button type="button" class="filesPost like"><img src="./assets/images/heart.svg" alt="Curtir">Curtir</button>
          <button type="button" class="filesPost comment"><img src="./assets/images/comment.svg"
              alt="Comentar">Comentar</button>
          <button type="button" class="filesPost share"><img src="./assets/images/share.svg"
              alt="Compartilhar">Compartilhar</button>
        </div>
      </li>
    </ul>
  </main>
  <!-- notificação -->
  <?php
  include './components/sonner.php';
  ?>
  <!-- libras -->
  <?php
  include './components/libras.php'
  ?>
</body>

</html>