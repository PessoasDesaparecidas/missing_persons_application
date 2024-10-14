<?php 
    include './database/database-connection.php'; // Conexão com o banco de dados
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
    // Definindo a página atual (default: 1)
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
    
    if ($page < 1) {
        header("Location:test.php?page=1");
    }

    // Definindo o número de registros a serem pulados
    $skip = ($page - 1) * 10;

    // Consultas básicas
    $query_all_missing = "SELECT * FROM Desaparecido";
    $query_quantity_missings = "SELECT COUNT(*) AS quantity_missings FROM Desaparecido";

    // Filtros dinâmicos
    $filters = [];

    if (isset($_GET["name"]) && !empty($_GET["name"])) {
        $name = $connection->real_escape_string($_GET["name"]);
        $filters[] = "nome_desaparecido LIKE '%$name%'";
    }
    
    if (isset($_GET["gender"]) && !empty($_GET["gender"])) {
        $gender = $connection->real_escape_string($_GET["gender"]);
        $filters[] = "genero_desaparecido = '$gender'";
    }

    if(isset($_GET["local_desaparecimento"]) && !empty($_GET["local_desaparecimento"])){
        $locale = $connection->real_escape_string($_GET["local_desaparecimento"]);
        $filters[] = "local_desaparecimento = '$locale'";
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
    echo "<p>Total de desaparecidos: $quantity_missings</p>";

    // Executando a consulta para listar os desaparecidos
    $missings = $connection->query($query_all_missing);
    if ($missings->num_rows > 0):
    ?>
        <?php while ($missing = $missings->fetch_assoc()): ?>
            <div>
                <p>Nome: <?= htmlspecialchars($missing['nome_desaparecido']) ?></p>
                <p>Gênero: <?= htmlspecialchars($missing['genero_desaparecido']) ?></p>
                <p>Data de Desaparecimento: <?= htmlspecialchars($missing['data_desaparecimento']) ?></p>
                <p>Local de Desaparecimento: <?= htmlspecialchars($missing['local_desaparecimento']) ?></p>
                <p>Contato: <?= htmlspecialchars($missing['contato_desaparecido']) ?></p>
                <p>Observação: <?= htmlspecialchars($missing['observacao_desaparecido']) ?></p>
                <hr>
            </div>
        <?php endwhile ?>
    <?php else: ?>
        <p>Nenhum desaparecido encontrado.</p>
    <?php endif; ?>

    <!-- Links de navegação para a paginação -->
    <?php
    // Calculando o total de páginas
    $total_pages = ceil($quantity_missings / 10);

    // Exibindo os links de paginação
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='?page=$i";

        // Adicionando os filtros na URL
        if (isset($_GET['name'])) {
            echo "&name=" . urlencode($_GET['name']);
        }
        if (isset($_GET['gender'])) {
            echo "&gender=" . urlencode($_GET['gender']);
        }
        if (isset($_GET['created_at'])) {
            echo "&created_at=" . urlencode($_GET['created_at']);
        }

        echo "'>$i</a> ";
    }
    ?>
</body>

</html>
