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

  <?php
  include "./components/footer.php";
  include "./components/sonner.php";
  ?>
  <script defer>
    function formatRelativeDate(date) {
      const now = new Date();
      const seconds = Math.floor((now - date) / 1000);
      const minutes = Math.floor(seconds / 60);
      const hours = Math.floor(minutes / 60);
      const days = Math.floor(hours / 24);
      const weeks = Math.floor(days / 7);

      let result = '';

      if (seconds < 60) {
        result = 'agora';
      } else if (minutes < 60) {
        result = `${minutes} minuto${minutes === 1 ? '' : 's'} atrás`;
      } else if (hours < 24) {
        result = `${hours} hora${hours === 1 ? '' : 's'} atrás`;
      } else if (days < 7) {
        result = `${days} dia${days === 1 ? '' : 's'} atrás`;
      } else {
        result = `${weeks} semana${weeks === 1 ? '' : 's'} atrás`;
      }

      return result;
    }
    const comments = document.querySelectorAll('#date-comments');
    comments.forEach(comment => {
      const date = new Date(comment.getAttribute('date-value'));
      comment.innerText = formatRelativeDate(date);
    });
  </script>
</body>

</html>