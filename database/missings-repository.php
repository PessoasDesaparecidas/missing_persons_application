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
  $local_desaparecimento,
  $doencas, 
  $depende_quimico, 
  $perfil, 
  $placa_do_carro
) {
  $preparement_query_to_created_missing = $connection->prepare("INSERT INTO Desaparecido 
(id_usuario, nome_desaparecido,genero_desaparecido, foto_desaparecido, contato_desaparecido, historia_desaparecido, observacao_desaparecido, data_desaparecimento ,idade_desparecido, local_desaparecimento, doencas, perfil, placa_do_carro, dependente_quimico)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $preparement_query_to_created_missing->bind_param(
    "ssssssssssssss",
    $user_id,
    $nome_desaparecido,
    $genero_desaparecido,
    $foto_desaparecido,
    $contato_desaparecido,
    $historia_desaparecido,
    $observacao_desaparecido,
    $data_desaparecimento,
    $idade_desparecido,
    $local_desaparecimento,
    $doencas, 
    $depende_quimico, 
    $perfil, 
    $placa_do_carro
  );

  $preparement_query_to_created_missing->execute();
  $preparement_query_to_created_missing->close();
}

function fetch_missings_by_user_id($connection, int $user_id, int $skip)
{
  $quantity_missings = 10;
  $offset_missings = $skip * $quantity_missings;

  $preparement_query_to_fetch_missings = $connection->prepare("SELECT * FROM Desaparecido WHERE id_usuario = ? ORDER BY created_at DESC LIMIT ? OFFSET ?");
  $preparement_query_to_fetch_missings->bind_param("sss", $user_id, $quantity_missings, $offset_missings);
  $preparement_query_to_fetch_missings->execute();
  $result = $preparement_query_to_fetch_missings->get_result();
  return $result;
}

function fetch_missings_recents($connection, int $skip)
{
  $quantity_missings = 10;
  $offset_missings = $skip * $quantity_missings;
  $query = "SELECT *  FROM Desaparecido  ORDER BY created_at DESC LIMIT {$quantity_missings} OFFSET {$offset_missings} ";

  $result = $connection->query($query);
  return $result;
}

function fetch_missings($connection,  int $skip)
{
   $quantity_missings = 10;
  $offset_missings = $skip * $quantity_missings;
  $query = "SELECT *  FROM Desaparecido  ORDER BY created_at DESC LIMIT {$quantity_missings} OFFSET {$offset_missings} ";

  $result = $connection->query($query);
  return $result;
}


function delete_missing_by_user_id($connection, int $user_id, int $missing_id)
{
  $preparement_query_to_delete_missing = $connection->prepare("DELETE FROM Desaparecido WHERE id_desaparecido = ? AND id_usuario = ?");
  $preparement_query_to_delete_missing->bind_param("ss", $missing_id, $user_id);
  $preparement_query_to_delete_missing->execute();
  $preparement_query_to_delete_missing->close();
}


function get_quantity_pages_by_user_id($connection, $user_id)
{
  $sql = "SELECT COUNT(*) AS quantity_missings FROM Desaparecido WHERE id_usuario = '{$user_id}'";
  $result = $connection->query($sql);

  $row = $result->fetch_assoc();
  $quantity_missings = $row['quantity_missings'];
  $quantity_missing_per_page = 10;
  $quantity_pages = ceil($quantity_missings / $quantity_missing_per_page);

  //Não posso ter 0 paginas , no minimo uma pagina
  if ($quantity_pages == 0) {
    return 1;
  }

  return $quantity_pages;
}


function calculate_quantity_pages($per_page,$total)  {
  $quantity_pages = ceil($total / $per_page);
  return $quantity_pages;
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
  $local_desaparecimento,
  $doencas, 
  $dependente_quimico, 
  $perfil, 
  $placa_do_carro
) {
  
  $preparement_query_to_update_missing = $connection->prepare("UPDATE Desaparecido SET nome_desaparecido = ?, genero_desaparecido = ?, foto_desaparecido = ?, contato_desaparecido = ?, historia_desaparecido = ?, observacao_desaparecido = ?, data_desaparecimento = ?, idade_desparecido = ?, local_desaparecimento = ?, doencas = ?, dependente_quimico = ?, perfil = ?, placa_do_carro = ? WHERE id_desaparecido = ? AND id_usuario = ?");
  $preparement_query_to_update_missing->bind_param(
    "sssssssssssssss",
    $nome_desaparecido,
    $genero_desaparecido,
    $foto_desaparecido,
    $contato_desaparecido,
    $historia_desaparecido,
    $observacao_desaparecido,
    $data_desaparecimento,
    $idade_desparecido,
    $local_desaparecimento,
    $doencas, 
    $dependente_quimico, 
    $perfil, 
    $placa_do_carro,
    $missing_id,
    $user_id
  );

  $preparement_query_to_update_missing->execute();
  $preparement_query_to_update_missing->close();
}


function get_missing_by_id($connection,  $missing_id)
{
  $preparement_query_to_select_missing= $connection->prepare("SELECT * FROM Desaparecido WHERE id_desaparecido = ?");
  $preparement_query_to_select_missing->bind_param("s", $missing_id);
  $preparement_query_to_select_missing->execute();
  return $preparement_query_to_select_missing->get_result()->fetch_assoc();
}