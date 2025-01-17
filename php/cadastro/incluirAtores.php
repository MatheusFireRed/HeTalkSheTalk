<?php

    require_once '../DB/conexaoDB.php';

    $nome               = $_POST['nome'];
    $nomeArtistico      = $_POST['nome-artistico'];
    $dataNascimento     = $_POST['data-nascimento'];
    $dataFalecimento    = $_POST['data-falecimento'];
    $nacionalidade      = $_POST['nacionalidade'];
    $cidadeNascimento   = $_POST['cidade-nascimento'];
    $estadoNascimento   = $_POST['estado-nascimento'];
    $filhos             = $_POST['filhos'];
    $conjuges           = $_POST['conjuges'];
    $txtApresentacao    = $_POST['txt-apresentacao'];

    try{
        $pdo->beginTransaction();

        $sql = "INSERT INTO atores (nome,
        nascimento,
        falecimento,
        nacionalidade,
        nome_artistico,
        cidade_nascimento,
        estado_nascimento,
        filhos,
        conjuges,
        txt_apresentacao
        ) VALUES (:nome,
        :nascimento,
        :falecimento,
        :nacionalidade,
        :nome_artistico),
        :cidade_nascimento,
        :estado_nascimento,
        :filhos,
        :conjuges,
        :txt_apresentacao";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome',               $nome);
        $stmt->bindParam(':nascimento',         $dataNascimento);
        $stmt->bindParam(':falecimento',        $dataFalecimento);
        $stmt->bindParam(':nacionalidade',      $nacionalidade);
        $stmt->bindParam(':nome_artistico',     $nomeArtistico);
        $stmt->bindParam(':cidade_nascimento',  $cidadeNascimento);
        $stmt->bindParam(':estado_nascimento',  $estadoNascimento);
        $stmt->bindParam(':filhos',             $filhos);
        $stmt->bindParam(':conjuges',           $conjuges);
        $stmt->bindParam(':txt_apresentacao',   $txtApresentacao);

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