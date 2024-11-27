<?php
include './database/database-connection.php';
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

if (isset($_GET["name"]) && !empty($_GET["name"])) {
  $name = $connection->real_escape_string($_GET["name"]);
  $filters[] = "missing_person_name LIKE '%$name%'";
}

if (isset($_GET["gender"]) && !empty($_GET["gender"])) {
  $gender = $connection->real_escape_string($_GET["gender"]);
  $filters[] = "missing_person_gender = '$gender'";
}

if (isset($_GET["missing_location"]) && !empty($_GET["missing_location"])) {
  $locale = $connection->real_escape_string($_GET["missing_location"]);
  $filters[] = "missing_location = '$locale'";
}

// Montagem da cláusula WHERE com base nos filtros
if (!empty($filters)) {
  $where_clause = " WHERE " . implode(" AND ", $filters);
  $query_all_missing .= $where_clause;
  $query_quantity_missings .= $where_clause;
}

// Ordenação por data de criação
if (!isset($_GET["created_at"]) || $_GET["created_at"] == "DESC") {
  $query_all_missing .= " ORDER BY created_at DESC";
} elseif (isset($_GET["created_at"]) && $_GET["created_at"] == "ASC") {
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?php if ($leanguage == "pt"): ?>
    Busca Solidária
    <?php elseif ($leanguage == "es"): ?>
    Búsqueda Solidaria
    <?php elseif ($leanguage == "en"): ?> Solidarity Search
    <?php endif; ?>
  </title>
  <link rel="icon" href="./assets/images/favicon.png">

  <link rel="stylesheet" href="./assets/styles/globals.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

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
  }

  .row {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 50px;
  }

  .card {
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: 0.3s;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .card-img {
    text-align: center;
    padding: 10px;
    margin: 0;
  }

  .card-img img {
    border-radius: 5px;
    height: 225px;
    width: 100%;
    max-width: 160px;
    object-fit: cover;
    object-position: center;
  }

  .card-body {
    padding: 10px 20px;
    text-align: center;
    font-size: 15px;
  }

  .card-body .btn {
    background-image: url("./assets/images/desapecido.jpg");
    display: block;
    color: #fff;
    text-align: center;
    background: #b6222b;
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

  @media screen and (max-width: 1024px) {
    .row {
      grid-template-columns: 1fr 1fr 1fr;
      gap: 40px;
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
  </style>
</head>

<body>
  <!--comeco da nav-->
  <?php
  include './components/header.php'
  ?>
  <!--fim da nav-->


  <section class="desap">
    <div class="content">
      <h3>
        <?php if ($leanguage == "pt"): ?>
        Encontre seu amigo, parente ou conhecido aqui...
        <?php elseif ($leanguage == "es"): ?>
        Encuentra a tu amigo, pariente o conocido aquí ...
        <?php elseif ($leanguage == "en"): ?>
        Find your friend, relative or known here ...
        <?php endif; ?>
      </h3>
      <div class="search-bar">
        <input type="text" class="search-input" placeholder="Pesquisar..." />

        <?php if ($leanguage == "pt"): ?>
        <button class="filter-button">Filtrar</button>
        <button class="search-button">Buscar</button>
        <?php elseif ($leanguage == "es"): ?>
        <button class="filter-button">Filtrar</button>
        <button class="search-button">Buscar</button>
        <?php elseif ($leanguage == "en"): ?>
        <button class="filter-button">Filter</button>
        <button class="search-button">Search</button>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- cards -->

  <div class="container">
    <div class="heading">
      <h1>
        <?php if ($leanguage == "pt"): ?>
        Desaparecidos
        <?php elseif ($leanguage == "es"): ?>
        Desaparecidos
        <?php elseif ($leanguage == "en"): ?>
        Missings
        <?php endif; ?>
      </h1>
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
              <?php if ($leanguage == "pt"): ?>
              Nome:
              <?php elseif ($leanguage == "en"): ?>
              Name:
              <?php elseif ($leanguage == "es"): ?>
              Nombre:
              <?php endif; ?>
            </strong> <?php echo $missing["missing_person_name"] ?></p>
          <p><strong>

              <?php if ($leanguage == "pt"): ?>
              Idade:
              <?php elseif ($leanguage == "en"): ?>
              Age:
              <?php elseif ($leanguage == "es"): ?>
              Edad:
              <?php endif; ?>
            </strong> <?php echo $missing["missing_person_age"] ?></p>
          <p><strong>
              <?php if ($leanguage == "pt"): ?>
              Região:<?php elseif ($leanguage == "en"): ?>
              Region:
              <?php elseif ($leanguage == "es"): ?>
              Región:
              <?php endif; ?>
            </strong> <?php echo $missing["missing_location"] ?></p>

          <p><strong>
              <?php if ($leanguage == "pt"): ?>
              Data do desaparecimento
              <?php elseif ($leanguage == "en"): ?>
              Date of disappearance
              <?php elseif ($leanguage == "es"): ?>
              Fecha de desaparición
              <?php endif; ?>
            </strong>
            <?php
                $date = new DateTime($missing["missing_date"]);
                $formatted_date = $date->format('d/m/Y');
                echo  $formatted_date ?>
          </p>
          <a href="./desaparecido.php?missing_id=<?php echo $missing["missing_person_id"] ?>" class="btn"><i
              class="fa-solid fa-comment"></i>
            <?php if ($leanguage == "pt"): ?>
            Viu? Comente
            <?php elseif ($leanguage == "en"): ?>
            It saw?Comment
            <?php elseif ($leanguage == "es"): ?>
            Vio? Comente
            <?php endif; ?>
          </a>
        </div>
      </div>
      <?php endwhile ?>
      <?php endif; ?>

      <!-- fim cards -->

      <section class="sobre" id="sobre">
        <?php if ($leanguage == "pt"): ?>
        SOBRE NOS!!
        <?php elseif ($leanguage == "es"): ?>
        SOBRE NOS!!
        <?php elseif ($leanguage == "en"): ?>
        ABOULT US!!
        <?php endif; ?>
      </section>

      <!-- notificação -->
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

      <script src="./assets/javascript/politica.js"></script>
      <script src="./assets/javascript/header.js"></script>
      <script src="./assets/javascript/handle-form-user.js"></script>
      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script>
      AOS.init();
      </script>
</body>

</html>