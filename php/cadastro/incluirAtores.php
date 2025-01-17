<?php

    require_once '../DB/conexaoDB.php';

    $nome               = $_POST['nome'];
    $nomeArtistico      = $_POST['nome-artistico'];
    $dataNascimento     = $_POST['data-nascimento'];
    $dataFalecimento    = $_POST['data-falecimento'];
    $nacionalidade      = $_POST['nacionalidade'];

    try{
        $pdo->beginTransaction();

        $sql = "INSERT INTO atores (nome,
        nascimento,
        falecimento,
        nacionalidade,
        nome_artistico
        ) VALUES (:nome,
        :nascimento,
        :falecimento,
        :nacionalidade,
        :nome_artistico)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':nascimento', $dataNascimento);
        $stmt->bindParam(':falecimento', $dataFalecimento);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':nome_artistico', $nomeArtistico);

        $stmt->execute();

        $pdo->commit();

    // Redirecionar para a página de sucesso
    header("Location: ../../html/atorCadastradoComsucesso.html");
    exit;
} 
catch (PDOException $e) {
    // Caso ocorra erro, desfazer as transações
$pdo->rollBack();
echo "Erro: " . $e->getMessage();
}
?>