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
  $query = "SELECT *  FROM Desaparecido WHERE id_usuario = '{$user_id}' LIMIT 10 ";

  $result = $connection->query($query);
  return $result;
}

function delete_missing_by_user_id($connection, int $user_id, int $missing_id)
{
  $query = "DELETE FROM Desaparecido WHERE id_desaparecido = '{$missing_id}' AND id_usuario = '{$user_id}'";

  $connection->query($query);
}

function update_missing_by_user_id(
  $connection,
  int $user_id,
  int $missing_id,
  $data
) {
  $preparement_query_to_updated_missing = $connection->prepare("UPDATE Desaparecido 
            SET nome_desaparecido = ?,
            SET genero_desaparecido = ?,
            SET foto_desaparecido = ?,
            SET contato_desaparecido = ?,
            SET observacao_desaparecido = ?,
            SET data_desaparecimento = ?,
            SET idade_desparecido = ?,
            SET local_desaparecimento = ?,
            WHERE id_desaparecido = ?
            AND id_usuario = ? ;");

  $preparement_query_to_updated_missing->bind_param(
    "ssssssssii",
    $data['nome_desaparecido'],
    $data['genero_desaparecido'],
    $data['foto_desaparecido'],
    $data['contato_desaparecido'],
    $data['observacao_desaparecido'],
    $data['data_desaparecimento'],
    $data['idade_desparecido'],
    $data['local_desaparecimento'],
    $missing_id,
    $user_id
  );

  $preparement_query_to_updated_missing->execute();
  $preparement_query_to_updated_missing->close();
}


function get_missing_by_id($connection, int $missing_id)
{
  $query = "SELECT * FROM Desaparecido WHERE id_desaparecido = '{$missing_id}'";

  $missing = $connection->query($query);

  return $missing->fetch_array(MYSQLI_ASSOC);
}
