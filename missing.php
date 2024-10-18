<?php
include "./utils/get-user-id.php";
include "./database/database-connection.php";
include "./database/missings-repository.php";
include "./database/comments-repository.php";
include "./utils/sonner.php";
include "./utils/get-missing-id.php";

if (!get_missing_id()) {
  sonner("error", "Desaparecido não encontrado");
  header("Location: index.php");
}

$missing = get_missing_by_id($connection, get_missing_id());

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
  <title>Desaparecido | <?php echo $missing["missing_person_name"] ?></title>
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

  <div id="content-comment">
    <div id="comments">
      <h2>Comentários</h2>
      <div id="comments-list">

        <form action="create-comment-by-missing.action.php?missing_id=<?php echo get_missing_id() ?>" method="POST">
          <textarea name="comment" id="comment" placeholder="Escreva um comentário"></textarea>
          <button type="submit">Comentar</button>
        </form>

        <?php
        $comments = fetch_comments_by_missing_id($connection, get_missing_id());
        while ($comment = $comments->fetch_assoc()) :
        ?>
          <div class="comment">
            <h3><?php echo $comment["author_name"]; ?></h3>
            <h3 id="date-comments" date-value="<?php echo $comment["created_at"] ?>"> </h3>



            <p><?php echo $comment["content"] ?></p>



            <?php if ($comment["user_id"] == get_user_id()): ?>
              <div class="comment-actions">
                <a href="edit-comment.php?comment_id=<?php echo $comment["comment_id"] ?>">Editar</a>
                <a href="delete-comment.php?comment_id=<?php echo $comment["comment_id"] ?>">Excluir</a>
              </div>
            <?php endif; ?>
          </div>
        <?php
        endwhile
        ?>
      </div>

    </div>

  </div>



  <!-- sonner -->
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

  <script src="./assets/javascript/format-relative-date.js" defer>
  </script>
</body>

</html>