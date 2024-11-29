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
  <link rel="stylesheet" href="./assets/styles/header.css">
  <link rel="icon" href="./assets/images/favicon.png">
  <link rel="stylesheet" href="./assets/styles/footer.css">
  <link rel="stylesheet" href="./assets/styles/carrossel.css">
  <link rel="stylesheet" href="./assets/styles/about.css">
  <link rel="stylesheet" href="./assets/styles/tudo.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
  <!--comeco da nav-->
  <?php include './components/header.php'; ?>
  <!--fim da nav-->


  <!--1 section-->
  <section class="one">
    <div class="content-0" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
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
    </div>
    <?php endif; ?>
  </section>
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

                Idade:
              </strong> <?php echo $missing["missing_person_age"] ?></p>
            <p><strong>
                Região:
              </strong> <?php echo $missing["missing_location"] ?></p>

            <p><strong>
                Data do desaparecimento

              </strong>
              <?php
                  $date = new DateTime($missing["missing_date"]);
                  $formatted_date = $date->format('d/m/Y');
                  echo  $formatted_date ?>
            </p>
            <button id="openm" class="btnn"><i class="fa-solid fa-comment"></i> Viu? Comente</button>
            <dialog id="dialogo">
              <p class="description">
              <main class="main">
                <!--formlário de postagem-->
                <div class="newPost">

                  <div class="infoUser">
                    <div class="imgUser">
                      <img src="./assets/uploads/users/<?php echo $user["user_photo"] ?>" alt="">
                    </div>
                    <strong><?php echo $user["username"] ?></strong>
                  </div>

                  <!--Formulario de envio-->
                  <form
                    action="./create-comment-by-missing.action.php?missing-id=<?php echo $missing["missing_person_id"] ?>"
                    class="formPost" method="post">
                    <textarea name=" comment" id="comment" placeholder="Faça seu comentário"></textarea>
                    <input type="number" name="latitude" id="latitude" class="invisible">
                    <input type="number" name="longitude" id="longitude" class="invisible">

                    <div class="iconsAndButton">
                      <div class="icons">
                        <button class="btnFileForm"><img src="./assets/images/img.svg"
                            alt="Adicionar uma imagem"></button>
                        <button class="btnFileForm"><img src="./assets/images/video.svg"
                            alt="Adicionar um video"></button>
                      </div>
                      <button type="submit" class="btnSubmitForm">Publicar</button>
                    </div>
                  </form>
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
                    <p><?php echo $comment["content"] ?></p>

                    <div class="actionBtnPost">
                      <button type="button" class="filesPost like"><img src="./assets/images/heart.svg"
                          alt="Curtir">Curtir</button>
                      <button type="button" class="filesPost comment"><img src="./assets/images/comment.svg"
                          alt="Comentar">Comentar</button>
                      <button type="button" class="filesPost share"><img src="./assets/images/share.svg"
                          alt="Compartilhar">Compartilhar</button>
                    </div>
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

        <div class="card">
          <div class="card-img">
            <img src="./assets/images/dimi.jpg">
          </div>
          <div class="card-body">
            <p><strong> Nome: </strong> Lucas Dimitry</p>
            <p><strong> Nascimento: </strong> 31/12/2006</p>
            <p><strong> Visto por último em: </strong> Rua Aperibé, 0</p>

            <button id="openm" class="btnn"><i class="fa-solid fa-comment"></i> Viu? Comente</button>
            <dialog id="dialogo">
              <p class="description">
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
                        <button class="btnFileForm"><img src="./assets/images/img.svg"
                            alt="Adicionar uma imagem"></button>
                        <button class="btnFileForm"><img src="./assets/images/video.svg"
                            alt="Adicionar um video"></button>
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
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe veritatis nemo quibusdam?
                      Consequatur reiciendis odio aliquam, similique, quo ex tempore eligendi provident odit blanditiis
                      qui vel autem voluptatem a neque?</p>

                    <div class="actionBtnPost">
                      <button type="button" class="filesPost like"><img src="./assets/images/heart.svg"
                          alt="Curtir">Curtir</button>
                      <button type="button" class="filesPost comment"><img src="./assets/images/comment.svg"
                          alt="Comentar">Comentar</button>
                      <button type="button" class="filesPost share"><img src="./assets/images/share.svg"
                          alt="Compartilhar">Compartilhar</button>
                    </div>
                  </li>
                </ul>
              </main>
              </p>
              <button id="closem" class="btn" autofocus>Close</button>
            </dialog>
          </div>
        </div>

        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
  </section>
  <!-- fim carrossel -->

  <center>
    <section class="cta-section">
      <div class="cta-content" data-aos="fade-up" data-aos-duration="3000">
        <h2>
          <span>Cada minuto importa,</span><br>
          </br>
          <strong>cadastre aqui seu </strong>
          <span class="typing-text"></span>
        </h2>
        <p>aumentando a possibilidade de encontra-lo.</p>
        <small>O preenchimento de formulario não substitui o BO</small>
        <a href="./missing-cadastre.html" class="btn">Formulario de cadastro</a>
      </div>
    </section>

  </center>


  <center>
    <section class="spsp" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
      <div class="sampa">
        <div class="image-section">
          <!-- Substitua a URL da imagem abaixo pela sua imagem -->
          <img src="./assets/images/sp.webp" alt="Descrição da Imagem">
        </div>
        <div class="text-section">
          <p class="subtitle"> No ano de 2024, em uma pesquisa feita pela instituição SSP, aponta cerca de 17.711
            pessoas que estavam desaparecidas e foram encontradas em São Paulo. </p>
          <h1 class="title">Podemos ajudar nessa busca!</h1>
        </div>
      </div>
    </section>
  </center>



  <section class="faq-section">
    <h2 data-aos="zoom-in">Principais perguntas e informações</h2>
    <div class="faq-item" data-aos="fade-up" data-aos-anchor-placement="top-center">
      <h3>O que é desaparecimento?</h3>
      <p>Desaparecimento é o sumiço repentino de alguém, sem aviso prévio a familiares ou a terceiros. Uma pessoa é
        considerada desaparecida quando não pode ser localizada nos lugares que costuma frequentar, nem encontrada de
        qualquer outra forma.</p>
    </div>
    <div class="faq-item" data-aos="fade-up" data-aos-anchor-placement="top-center">
      <h3>Quais motivos podem levar ao desaparecimento de alguem?</h3>
      <p>Várias causas podem levar a essa desaparição, por exemplo, conflitos familiares, uso problemático de drogas,
        alcoolismo, transtorno mental, depressão, violência, dentre outras. O desaparecimento pode ser:

        </br> Voluntário, quando a pessoa se afasta por vontade própria e sem avisar. Isso pode acontecer por motivos
        diversos, como desentendimentos, medo, aflição, planos de vida diferentes, entre outros conflitos.
        </br> Involuntário, quando a pessoa é afastada do cotidiano por um evento sobre o qual não tem controle, como um
        acidente, um problema de saúde, um desastre natural;
        </br> Forçado, quando outras pessoas provocam o afastamento, sem a concordância da pessoa, como em um sequestro,
        ou pela ação do próprio Estado.</p>

    </div>
    <div class="faq-item" data-aos="fade-up" data-aos-anchor-placement="top-center">
      <h3>Por que agir rápido em caso de desaparecimento?</h3>
      <p>Normalmente, não estamos preparados para vivenciar o desaparecimento de algum ente querido. Ele acontece de
        repente e sem que se saiba sua causa. Quanto mais rápido você procurar ajuda, mais são as chances de reencontro,
        especialmente quando se trata de um desaparecimento forçado ou involuntário.</p>
    </div>
    <div class="faq-item" data-aos="fade-up" data-aos-anchor-placement="top-center">
      <h3>O que fazer em uma situação de desaparecimento voluntário?</h3>
      <p>Toda pessoa tem o direito de mudar de vida, independentemente do motivo. No entanto, quando uma pessoa decide,
        voluntariamente, se afastar de sua rotina ou do convívio com a família, é importante que ela comunique a decisão
        de se ausentar. O desaparecimento voluntário abala a rotina de outras pessoas e também do Poder Público, que
        deve se concentrar na busca de pessoas que desapareceram de forma involuntária ou forçada. É importante
        compreender que a pessoa que desapareceu por vontade própria tem o direito de, quando encontrada, não retornar
        ou, não reatar o vínculo familiar, desde que seja maior de idade e capaz de ser responsável por si. Nesses
        casos, o Poder Público deve apenas comunicar os familiares que o desaparecido foi encontrado e não quer ser
        localizado.</p>
    </div>
    <div class="faq-item" data-aos="fade-up" data-aos-anchor-placement="top-center">
      <h3>O que fazer em caso de desaparecimento de crianças, adolescentes e pessoas com transtorno mental?</h3>
      <p>Para a lei, crianças, adolescentes e pessoas com transtorno mental desconhecem a gravidade de mudar de vida sem
        o apoio da família ou de pessoas próximas. Por isso, elas nunca são consideradas como casos de desaparecimento
        voluntário e devem imediatamente ser procuradas e reconduzidas a um local seguro. Ou seja, mesmo que ela tenha
        se esquecido de avisar aonde foi, tenha fugido ou se afastado por vontade própria, é dever do Poder Público
        procurá-la com a máxima urgência, sem esperar nem um minuto a mais. Se a criança, adolescente ou incapaz tiver
        desaparecido em razão de violência ou perseguição, ela deverá ser encaminhada a um conselho tutelar ou órgão
        competente.</p>
    </div>
    <div class="faq-item" data-aos="fade-up" data-aos-anchor-placement="top-center">
      <h3>O registro do BO só pode ser feito depois de passadas algumas horas?</h3>
      <p>Pelo contrário! Quanto mais rápido você iniciar sua busca, há mais possibilidades de localizar a pessoa
        desaparecida.</p>
    </div>
  </section>


  <h1 class="tit">SOBRE NÓS</h1>
  <section class="about">

    <div class="about-content">
      <ul>
        <p>O Busca Solidária surgiu em 2024 a partir de um projeto de TCC realizados por alunos da ETEC Parque da
          Juventude do curso de Desenvolvimento de Sistemas. Tem o objetivo de ajudar as pessoas que possuem entes
          queridos desaparecidos a encontrá-los, por meio de um banco de dados aberto ao público.</p>
        <br />
        <p>O Busca Solidária também visa conscientizar e sensibilizar os cidadãos quanto ao desaparecimento de pessoas,
          além de fornecer orientações quanto ao que deve ser feito ao se deparar com uma situação similar, servindo
          como uma plataforma auxiliar na busca por desaparecidos.</p>
      </ul>
      <!-- <hr width="1" size="210"> -->
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
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus
          ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
      </ul>
      <ul class="ul2">
        <img src="assets/images/thay.jpeg" alt="" class="thay">
        <h2>Thayssa</h2>
        <span class="detail">Desenvolvedora</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus
          ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
      </ul>
      <ul class="ul3">
        <img src="assets/images/soso.jpeg" alt="" class="soso">
        <h2>Sophia</h2>
        <span class="detail">Desenvolvedora</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus
          ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
      </ul>
    </div>
    <div class="content-22">
      <ul></ul>
      <ul class="ul4">
        <img src="assets/images/vitoria2.jpeg" alt="" class="vicky">
        <h2>Vitória</h2>
        <span class="detail">Desenvolvedora</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus
          ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
      </ul>
      <ul class="ul5">
        <img src="assets/images/rib.jpeg" alt="" class="rib">
        <h2>Ribeiro</h2>
        <span class="detail">Desenvolvedora</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nisi aspernatur numquam! Necessitatibus
          ab nobis temporibus hic cupiditate, numquam debitis nesciunt, deserunt esse repudiandae</p>
      </ul>
    </div>
  </section>

  <!-- notificação -->
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
  <script src="./assets/javascript/carrossel.js" defer></script>
  <script src="./assets/javascript/header.js"></script>
  <script src="./assets/javascript/handle-form-user.js"></script>
  <script src="./assets/javascript/comentario.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
  AOS.init();
  </script>

</body>

</html>