<?php
session_start();
include './database/database-connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cadastro de desaparecidos</title>
  <link rel="icon" href="./assets/images/favicon.png">
  <!-- CSS -->
  <link rel="stylesheet" href="./assets/styles/globals.css">
  <link rel="stylesheet" href="./assets/styles/missing-dashboard.css">

</head>

<body>
  <!-- navbar -->
  <?php
  include './components/header.php';
  ?>

  <!-- content  -->

  <main>
    <h1>meus desaparecidos </h1>
    <ul class="link-list">
      <li class="link-item">
        <a href="./missing-cadastre.php">
          cadastro
        </a>
      </li>
    </ul>
    <section>
      <?php
      ?>
    </section>
  </main>

  <!-- rodapé -->
  <?php
  include './components/footer.php'
  ?>

  <!-- javascript -->
  <script src=" ./assets/javascript/handle-form-user.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>