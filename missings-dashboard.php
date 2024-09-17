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

        <!-- listagem de desaparecidos -->
        <section>
            <?php
      $page = $_GET["page"];
      $max_pages = get_quantity_pages_by_user_id($connection,get_user_id());



      if(empty($page)) {
        header("Location:missings-dashboard.php?page=1");
      }
      if($page<1){
        header("Location:missings-dashboard.php?page=1");
      }      
      if($page>$max_pages){
        header("Location:missings-dashboard.php?page=1");
      }

      $skip = $page - 1;
      $missings = fetch_missings_by_user_id($connection, get_user_id(), $skip);
      if ($missings->num_rows > 0) :
      ?>
            <?php
        while ($missing = $missings->fetch_assoc()): ?>
            <div>
                <?php
            print_r($missing);
            ?>

                <a href="./missing-delete.action.php?
            missing_id=<?php echo $missing["id_desaparecido"]?>&page=<?php echo $page?>">
                    deletar
                </a>
                <a
                    href="./missing-update.php?missing_id=<?php echo $missing["id_desaparecido"] ?>&page=<?php echo $page?>">
                    editar
                </a>
            </div>
            <?php endwhile ?>
            <?php endif; ?>
        </section>

        <!-- paginação -->
        <div>
            <?php
      $quantity_pages = get_quantity_pages_by_user_id($connection, get_user_id());

      for ($page = 1; $page <= $quantity_pages; $page++):
      ?>
            <a href="./missings-dashboard.php?page=<?php echo $page ?>">
                <?php
          echo $page;
          ?>
            </a>
            <?php endfor; ?>
        </div>
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>