<?php
session_start();
function isAutheticate()
{
  $usuario_id = $_SESSION['id_user'] ?? '';

  if (!$usuario_id) {
    header('Location: index.php');
  }
}
