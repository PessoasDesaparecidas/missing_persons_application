<?php
include './database/database-connection.php';
include './database/missings-repository.php';
include './database/comments-repository.php';

include './utils/get-user-id.php';
include './utils/select-language.php';

$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

if ($page < 1) {
  header("Location:test.php?page=1");
}

// Definindo o número de registros a serem pulados
$skip = ($page - 1) * 10;

// Consultas básicas
$query_all_missing = "SELECT * FROM MissingPerson";
$query_quantity_missings = "SELECT COUNT(*) AS quantity_missings FROM MissingPerson";

// Filtros dinâmicos
$filters = [];
$name = "";
if (isset($_GET["name"]) && !empty($_GET["name"])) {
  $name = $connection->real_escape_string($_GET["name"]);
  $filters[] = "missing_person_name LIKE '%$name%'";
}
$gender = "";
if (isset($_GET["gender"]) && !empty($_GET["gender"])) {
  $gender = $connection->real_escape_string($_GET["gender"]);
  $filters[] = "missing_person_gender = '$gender'";
}

$missing_location = "";
if (isset($_GET["missing_location"]) && !empty($_GET["missing_location"])) {
  $locale = $connection->real_escape_string($_GET["missing_location"]);
  $filters[] = "missing_location = '$locale'";
}

$age_range = "";

if (isset($_GET["age_range"]) && !empty($_GET["age_range"])) {
  $age_range = $connection->real_escape_string($_GET["age_range"]);
  $age_range_query = "";
  if ($age_range === "jovem") {
    $age_range_query = "0 AND 18";
  } elseif ($age_range === "adulto") {
    $age_range_query = "18 AND 60";
  } elseif ($age_range === "velho") {
    $age_range_query = "60 AND 100";
  }

  $filters[] = "missing_person_age BETWEEN  $age_range_query";
}

// Montagem da cláusula WHERE com base nos filtros
if (!empty($filters)) {
  $where_clause = " WHERE " . implode(" AND ", $filters);
  $query_all_missing .= $where_clause;
  $query_quantity_missings .= $where_clause;
}

// Ordenação por data de criação
$create_at_missings = "";
if (!isset($_GET["created_at"]) || $_GET["created_at"] == "DESC") {
  $create_at_missings = "DESC";
  $query_all_missing .= " ORDER BY created_at DESC";
} elseif (isset($_GET["created_at"]) && $_GET["created_at"] == "ASC") {
  $create_at_missings = "ASC";
  $query_all_missing .= " ORDER BY created_at ASC";
}

// Limite e offset para paginação
$query_all_missing .= " LIMIT 10 OFFSET $skip";

// Executando a consulta para contar o total de registros
$result = $connection->query($query_quantity_missings);
$row = $result->fetch_assoc();
$quantity_missings = $row['quantity_missings'];

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
  <link rel="stylesheet" href="./assets/styles/tudo.css">
  <link rel="stylesheet" href="./assets/styles/desapa.css">


  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
  <!--comeco da nav-->
  <?php include './components/header.php'; ?>
  <!--fim da nav-->

  <section class="hero">
    <div class="desas">
      <h1>Seu olhar atento pode ser a esperança de um reencontro. </h1>
      <p>Reconhece algum desses rostos? Pesquise pelo nome, características ou idade e ajude-nos </br>a trazer alguém de volta para casa. </p>
      <form class="form-search" action="./desaparecidos.php" method="get">
        <div class="search-bar">
          <input type="text" class="search-input" name="name" id="name" placeholder="Procure aqui..." value="<?php echo $name ?>">
        </div>

        <div>
          <select name="gender" id="gender">
            <option value="" <?php if ($gender === "") echo "selected"; ?>>Tanto Faz</option>
            <option value="masculino" <?php if ($gender === "masculino") echo "selected"; ?>>Masculino</option>
            <option value="feminino" <?php if ($gender === "feminino") echo "selected"; ?>>Feminino</option>
          </select>

          <select name="created_at" id="created_at">
            <option value="DESC" <?php if ($create_at_missings == "DESC") echo "selected"; ?>>Mais Recente</option>
            <option value="ASC" <?php if ($create_at_missings == "ASC") echo "selected"; ?>>Mais antigo</option>
          </select>


          <select name="age_range" id="age_range">
            <option value="" <?php if ($age_range == "") echo "selected"; ?>>Todas as idades</option>
            <option value="jovem" <?php if ($age_range == "jovem") echo "selected"; ?>>Jovem (-18 anos)</option>
            <option value="adulto" <?php if ($age_range == "adulto") echo "selected"; ?>>Aduto (+ 18anos)</option>
            <option value="velho" <?php if ($age_range == "velho") echo "selected"; ?>>Idoso (+ 60anos)</option>
          </select>

          <button class="search-button" type="submit">
            Buscar
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>
      </form>


    </div>
  </section>
  <!-- cards -->
  <div class="container">
    <div class="heading">
      <h1 class="desapare">Desaparecidos </h1>
      <h3 class="desapare">
        Total Resultados: <?php echo $quantity_missings; ?>
      </h3>
    </div>
    <div class="row">

      <?php

      $missings = $connection->query($query_all_missing);
      if ($missings->num_rows > 0) :
      ?>
        <?php while ($missing = $missings->fetch_assoc()): ?>
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
                        <h3>necessario ter uma conta para comentar :(</h3>
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
    </div>
    <?php if ($quantity_missings > 8): ?>
      <div class="show-more-container">
        <button id="showMoreBtn" class="show-more">Mostrar mais ⬇</button>
      </div>
    <?php endif; ?>
  </div>



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



  <!--rodapé-->
  <?php include './components/footer.php'; ?>
  <!--fim rodapé-->

  <!-- notificação -->
  <?php
  include './components/sonner.php'; ?>

  <!-- vlibras -->
  <?php include './components/libras.php' ?>

  <script src="./assets/javascript/header.js"></script>
  <script src="./assets/javascript/handle-form-user.js"></script>
  <script src="./assets/javascript/politica.js"></script>
  <script src="./assets/javascript/desapa.js"></script>
  <script src="./assets/javascript/comentario.js"></script>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!-- lib de icons -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>