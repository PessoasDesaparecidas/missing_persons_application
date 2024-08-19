<?php
function create_missing(
  $connection,
  $user_id,
  $nome_desaparecido,
  $genero_desaparecido,
  $foto_desaparecido,
  $contato_desaparecido,
  $observacao_desaparecido,
  $data_desaparecimento,
  $idade_desparecido,
  $local_desaparecimento
) {
  $preparement_query_to_created_missing = $connection->prepare("INSERT INTO Desaparecido 
(id_usuario, nome_desaparecido,genero_desaparecido, foto_desaparecido, contato_desaparecido, observacao_desaparecido, data_desaparecimento ,idade_desparecido, local_desaparecimento)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $preparement_query_to_created_missing->bind_param(
    "sssssssss",
    $user_id,
    $nome_desaparecido,
    $genero_desaparecido,
    $foto_desaparecido,
    $contato_desaparecido,
    $observacao_desaparecido,
    $data_desaparecimento,
    $idade_desparecido,
    $local_desaparecimento
  );

  $preparement_query_to_created_missing->execute();

  $preparement_query_to_created_missing->close();
}

function fetch_missings_by_user_id($connection, int $user_id, int $skip)
{
  $offset_missing = $skip ? $skip : 0;
  $query = "SELECT *  FROM Desaparecido WHERE id_usuario = '{$user_id}' LIMIT 10 OFFSET '{$offset_missing}'";

  $result = $connection->query($query);

  return $result->fetch_assoc();
}
