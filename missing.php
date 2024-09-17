<?php
include "./database/database-connection.php";
include "./database/missings-repository.php";
include "./utils/sonner.php";
$missing_id = $_GET["missing_id"];
if (empty($missing_id)) {
  sonner("error", "desaparecido não encontrado");
  header("Location index.php");
}
$missing = get_missing_by_id($connection, $missing_id);

if (!$missing) {
  sonner("error", "desaparecido não encontrado");
  header("Location index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desaparecido | <?php echo $missing["nome_desaparecido"] ?></title>
  <link rel="icon" href="./assets/images/favicon.png">
  <link rel="stylesheet" href="./assets/styles/globals.css">
  <link rel="stylesheet" href="./assets/styles/missing.css">
</head>

<body>
  <?php
  include "./components/header.php";
  ?>

  <?php


  print_r($missing);
  ?>

  <?php
  include "./components/footer.php";
  include "./components/sonner.php";
  ?>
</body>

</html>