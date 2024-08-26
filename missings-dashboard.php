<?php
include './utils/protect-page-route.php';
include './database/missings-repository.php'
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
      <!-- TODO:exibir desaparecidos de um determinado usuario admin -->
      <?php
      $missings = fetch_missings_by_user_id($connection, get_user_id(), 1);
      if ($missings->num_rows > 0) :
      ?>
        <?php
        while ($missing = $missings->fetch_assoc()): ?>
          <div>
            <?php
            print_r($missing);
            ?>

            <a href="missing-delete.action.php?
            missing_id=" <?php echo $missing["id_desaparecido"] ?>"">
              deletar
            </a>
          </div>
        <?php endwhile ?>
      <?php endif; ?>
    </section>

  </main>
  <!-- sonner -->
  <?php
  include './components/sonner.php';
  ?>

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