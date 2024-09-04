<?php
function create_missing(
  $connection,
  $user_id,
  $nome_desaparecido,
  $genero_desaparecido,
  $foto_desaparecido,
  $contato_desaparecido,
  $historia_desaparecido,
  $observacao_desaparecido,
  $data_desaparecimento,
  $idade_desparecido,
  $local_desaparecimento
) {
  $preparement_query_to_created_missing = $connection->prepare("INSERT INTO Desaparecido 
(id_usuario, nome_desaparecido,genero_desaparecido, foto_desaparecido, contato_desaparecido, historia_desaparecido, observacao_desaparecido, data_desaparecimento ,idade_desparecido, local_desaparecimento)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $preparement_query_to_created_missing->bind_param(
    "ssssssssss",
    $user_id,
    $nome_desaparecido,
    $genero_desaparecido,
    $foto_desaparecido,
    $contato_desaparecido,
    $historia_desaparecido,
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
  $user_id,
  $missing_id,
  $nome_desaparecido,
  $genero_desaparecido,
  $foto_desaparecido,
  $contato_desaparecido,
  $historia_desaparecido,
  $observacao_desaparecido,
  $data_desaparecimento,
  $idade_desparecido,
  $local_desaparecimento
) {
  $preparement_query_to_updated_missing = "UPDATE `desaparecido` SET `nome_desaparecido`='$nome_desaparecido',`genero_desaparecido`='$genero_desaparecido',`foto_desaparecido`='$foto_desaparecido',`contato_desaparecido`='$contato_desaparecido',`historia_desaparecido`='$historia_desaparecido',`observacao_desaparecido`='$observacao_desaparecido',`idade_desparecido`='$idade_desparecido',`data_desaparecimento`='$data_desaparecimento',`local_desaparecimento`='$local_desaparecimento' WHERE id_desaparecido = '$missing_id' AND id_usuario = '$user_id' ";

  $connection->query($preparement_query_to_updated_missing);
}


function get_missing_by_id($connection,  $missing_id)
{
  $query = "SELECT * FROM Desaparecido WHERE id_desaparecido = '{$missing_id}'";

  $missing = $connection->query($query);

  return $missing->fetch_array(MYSQLI_ASSOC);
}
