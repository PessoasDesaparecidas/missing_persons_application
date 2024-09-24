<?php 
    include './database/database-connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $page = $_GET["page"];
    if (empty($page) || $page < 1) {
        header("Location:test.php?page=1");
    }

    $skip = ($page - 1)*10;
    $query_all_missing = "SELECT * FROM Desaparecido LIMIT 10 OFFSET $skip";
    $query_quantity_missings = "SELECT COUNT(*) AS quantity_missings FROM Desaparecido";

    if(isset($_GET["name"])){
        $name = $_GET["name"];
        $query_all_missing = "SELECT * FROM Desaparecido WHERE nome_desaparecido LIKE '%$name%' LIMIT 10 OFFSET $skip";
        $query_quantity_missings = "SELECT COUNT(*) AS quantity_missings FROM Desaparecido WHERE nome_desaparecido LIKE '%$name%'";
    }

    $result = $connection->query($query_quantity_missings);
    $row = $result->fetch_assoc();
    $query_quantity_missings = $row['quantity_missings'];
    print_r($query_quantity_missings);

    $missings = $connection->query($query_all_missing);
    if ($missings->num_rows > 0):
    ?>
        <?php
        while ($missing = $missings->fetch_assoc()): ?>
             <div>
                <div>
                    <?php
                    print_r($missing);
                    ?>

                </div>
                <br>
                <br>
            </div>
        <?php endwhile ?>
    <?php endif; ?>

 
</body>

</html>