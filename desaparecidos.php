<?php
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

// Exibindo a quantidade total de registros encontrados
echo "<p>Total de MissingPersons: $quantity_missings</p>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Busca Solidaria</title>
  <link rel="stylesheet" href="/assets/css/header.css">
  <link rel="stylesheet" href="/assets/css/footer.css">
  <link rel="stylesheet" href="/assets/css/tudo.css">
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
    margin-bottom: 50px;
    transition: 0.3s;
  }

  .card-img {
    text-align: center;
    padding: 0;
    margin: 0;
  }

  .card-body {
    padding: 10px 20px;
    text-align: center;
    font-size: 10px;
  }

  .card-body .btn {
    background-image: url(/assets/imagens/desapecido.jpg);
    display: block;
    color: #fff;
    text-align: center;
    background: linear-gradient(to right, #ff416c, #ff4b2b);
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
  </style>


</head>

<body>

  <header>
    <input type="checkbox" name="" id="chek">
    <label for="chek"><i class="fa-solid fa-bars"></i></label>
    <h1 class="logo">Busca Solidaria</h1>
    <nav>
      <a href="/index.html">Inicio</a>
      <a href="/orientacao.html">Orientações</a>
      <a href="/desaparecidos.html">Desaparecidos</a>
      <a href="#sobre">Sobre</a>
    </nav>
    <a href="#" class="btn">sign up</a>
  </header>

  <section>

    <div class="overlay">
      <video class="video" autoplay muted loop width="100%">
        <source src="/assets/imagens/video.mp4">
      </video>
    </div>

    <div class="content">
      <h1>Ajude-nos a encontrar aqueles que fazem falta</h1>
      <div class="search-bar">
        <input type="text" class="search-input" placeholder="Pesquisar...">
        <button class="filter-button">Filtrar</button>
        <button class="search-button">Buscar</button>
      </div>
    </div>
  </section>


  <div class="container">
    <div class="heading">
      <h1>Desaparecidoss</h1>
    </div>
    <div class="row">

      <?php
      $missings = $connection->query($query_all_missing);
      if ($missings->num_rows > 0):
      ?>
      <?php while ($missing = $missings->fetch_assoc()): ?>
      <div>
        <p>Nome: <?= htmlspecialchars($missing['missing_person_name']) ?></p>
        <p>Gênero: <?= htmlspecialchars($missing['missing_person_gender']) ?></p>
        <p>Data de Desaparecimento: <?= htmlspecialchars($missing['missing_date']) ?></p>
        <p>Local de Desaparecimento: <?= htmlspecialchars($missing['missing_location']) ?></p>
        <p>Contato: <?= htmlspecialchars($missing['missing_person_contact']) ?></p>
        <p>Observação: <?= htmlspecialchars($missing['missing_person_note']) ?></p>
        <hr>
      </div>


      <div class="card">
        <div class="card-img">
          <img src="./assets/uploads/missings/<?php echo $missing["missing_person_photo"] ?>">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="./missing.php?missing_id=<?php echo $missing['missing_person_id']?>" class="btn">Read more</a>
        </div>
      </div>div>
      <?php endwhile ?>
      <?php endif; ?>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>

      <div class="card">
        <div class="card-img">
          <img src="/assets/imagens/desapecido.jpg">
        </div>
        <div class="card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque molestiae eius explicabo mollitia
            tempore reiciendis, vel, sequi.
          </p>
          <a href="#" class="btn">Read more</a>
        </div>
      </div>
    </div>
  </div>



  <section class="sobre" id="sobre">
    SOBRE NOS!!
  </section>
  <!--rodapé-->
  <footer class="rodape" id="contato">
    <div class="rodape-div">

      <div class="rodape-div-1">
        <div class="rodape-div-1-coluna">
          <!-- elemento -->
          <span><b>LOGO</b></span>
          <p>SIA Trecho 5 lote 000 bloco z sala 900 - Guará, Brasília - DF, 70000-010</p>
        </div>
      </div>

      <div class="rodape-div-2">
        <div class="rodape-div-2-coluna">
          <!-- elemento -->
          <span><b>Contatos</b></span>
          <p>contato@na.na</p>
          <p>+55 63 99200-0000</p>
        </div>
      </div>

      <div class="rodape-div-3">
        <div class="rodape-div-3-coluna">
          <!-- elemento -->
          <span><b>Links</b></span>
          <p><a href="#servicos">Serviços</a></p>
          <p><a href="#empresa">Empresa</a></p>
          <p><a href="#sobre">Sobre</a></p>
        </div>
      </div>

      <div class="rodape-div-4">
        <div class="rodape-div-4-coluna">
          <!-- elemento -->
          <span><b>Outros</b></span>
          <p>Políticas de Privacidade</p>
        </div>
      </div>

    </div>
    <p class="rodape-direitos">Copyright © 2024 – Todos os Direitos Reservados.</p>
  </footer>



</body>

</html>