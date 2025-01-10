<?php
    require_once 'conexaoDB.php';

    $titulo =  $_POST['titulo'];
    $tipo   =  $_POST['tipo'];
    $categoria = $_POST['categoria'];

    try{
        $sql = "INSERT INTO titulos (titulo, tipo, categoria) VALUES (:titulo, :tipo, :categoria)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':categoria', $categoria);

        if ($stmt->execute()) {
            echo "Dados inseridos com sucesso!";
            header("Location: ../../html/cadastroFeitoComSucesso.html");

            exit;
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
?>