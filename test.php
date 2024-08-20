   <?php
    include './database/database-connection.php';
    include './database/missings-repository.php';
    include './utils/get-user-id.php';
    $missings = fetch_missings_by_user_id($connection, 2, 1);
    if ($missings->num_rows > 0) {
      while ($missing = $missings->fetch_assoc()) {
        print_r($missing);
      }
    } else {
      echo "0 results";
    }
    ?>