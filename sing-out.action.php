<?php
session_start();
$_SESSION['user_id'] = '';
$_SESSION['sonner-type'] = 'success';
$_SESSION['sonner-message'] = 'logout feito com sucesso';
if (isset($_SERVER['HTTP_REFERER'])) {
    $previousPage = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);

    if ($previousPage) {
        header("Location: $previousPage");
        exit;
    }
}



header('Location: index.php');
