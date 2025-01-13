<?php
    require_once 'conexaoDB.php';

    $titulo             = $_POST['titulo'];
    $tipo               = $_POST['tipo'];
    $categoria          = $_POST['categoria'];
    $diretor            = $_POST['diretor'];
    $duracao            = $_POST['duracao'];
    $tituloOriginal     = $_POST['titulo-original'];
    $dataEstreia        = $_POST['data-estreia'];
    $metaDados          = $_POST['meta-dados'];
    $sinopse            = $_POST['sinopse'];
    $paisOrigem         = $_POST['pais-origem'];
    $roteiro            = $_POST['roteiro'];

    try{
        $sql = "INSERT INTO titulos (titulo,
         tipo,
         categoria, 
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
          :categoria,
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
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':diretor', $diretor);
        $stmt->bindParam(':duracao', $duracao);
        $stmt->bindParam(':titulo_original', $tituloOriginal);
        $stmt->bindParam(':data_estreia', $dataEstreia);
        $stmt->bindParam(':meta_dados', $metaDados);
        $stmt->bindParam(':sinopse', $sinopse);
        $stmt->bindParam(':pais_origem', $paisOrigem);
        $stmt->bindParam(':roteiro', $roteiro);

        

        if ($stmt->execute()) {
            echo "Dados inseridos com sucesso!";
            header("Location: ../../html/cadastroFeitoComSucesso.html");

            exit;
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
?>