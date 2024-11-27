<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
          <button type="submit" class="btnSubmitForm">Publicar</button>
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
          <button type="button" class="filesPost like"><img src="./assets/images/heart.svg" alt="Curtir">
            Curtir</button>
          <button type="button" class="filesPost comment"><img src="./assets/images/comment.svg" alt="Comentar">
            Comentar</button>
          <button type="button" class="filesPost share"><img src="./assets/images/share.svg" alt="Compartilhar">
            Compartilhar</button>
        </div>
      </li>
    </ul>
  </main>
</body>

</html>