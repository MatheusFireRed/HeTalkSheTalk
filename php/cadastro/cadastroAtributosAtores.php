<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
    
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
    
    $tituloDaPagina = 'Área de Criação';
    
    require_once '../DB/conexaoDB.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../style/styleCadastroTitulo.css">
</head>
<body>
    <header>
        <?php include 'headerCadastro.php'; ?>
    </header>
</body>
</html>