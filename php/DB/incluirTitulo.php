<?php
require_once 'conexaoDB.php';

$titulo             = $_POST['titulo'];
$tipo               = $_POST['tipo'];
$categorias         = isset($_POST['categorias']) ? $_POST['categorias'] : [];
$diretor            = $_POST['diretor'];
$duracao            = $_POST['duracao'];
$tituloOriginal     = $_POST['titulo-original'];
$dataEstreia        = $_POST['data-estreia'];
$metaDados          = $_POST['meta-dados'];
$sinopse            = $_POST['sinopse'];
$paisOrigem         = $_POST['pais-origem'];
$roteiro            = $_POST['roteiro'];

try {
    // Iniciar a transação
    $pdo->beginTransaction();

    // Inserção do título
    $sql = "INSERT INTO titulos (titulo,
         tipo,
         diretor,
         duracao,
         titulo_original,
         data_estreia,
         meta_dados,
         sinopse,
         pais_origem,
         roteiro) 
         VALUES
         (:titulo,
          :tipo,
          :diretor,
          :duracao,
          :titulo_original,
          :data_estreia,
          :meta_dados,
          :sinopse,
          :pais_origem,
          :roteiro)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':diretor', $diretor);
    $stmt->bindParam(':duracao', $duracao);
    $stmt->bindParam(':titulo_original', $tituloOriginal);
    $stmt->bindParam(':data_estreia', $dataEstreia);
    $stmt->bindParam(':meta_dados', $metaDados);
    $stmt->bindParam(':sinopse', $sinopse);
    $stmt->bindParam(':pais_origem', $paisOrigem);
    $stmt->bindParam(':roteiro', $roteiro);

    // Executar a inserção
    $stmt->execute();

    // Obtendo o ID do título inserido
    $tituloId = $pdo->lastInsertId();

    // Inserir as categorias associadas ao título
    foreach ($categorias as $categoriaId) {
        $sqlCategoria = "INSERT INTO titulo_categoria (titulo_id, categoria_id) VALUES (:titulo_id, :categoria_id)";
        $stmtCategoria = $pdo->prepare($sqlCategoria);
        $stmtCategoria->execute([
            ':titulo_id' => $tituloId,
            ':categoria_id' => $categoriaId
        ]);
    }

    // Confirmar transação após todas as inserções
    $pdo->commit();

    // Redirecionar para a página de sucesso
    header("Location: ../../html/cadastroFeitoComSucesso.html");
    exit;
} catch (PDOException $e) {
    // Caso ocorra erro, desfazer as transações
    $pdo->rollBack();
    echo "Erro: " . $e->getMessage();
}
?>
