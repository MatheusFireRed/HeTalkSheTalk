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

// Consulta para obter categorias
try {
    $query = "SELECT categoria_id, categoria FROM categorias ORDER BY categoria";
    $stmt = $pdo->query($query);
    $opcoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar categorias: " . $e->getMessage());
}

// Consulta para obter atores
try {
    $sql = "SELECT id, nome_artistico FROM atores ORDER BY nome_artistico";
    $stmt = $pdo->query($sql);
    $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar atores: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $tituloDaPagina ?></title>
    <link rel="stylesheet" href="../../style/styleCadastroTitulo.css">
</head>
<body>

    <header>
        <?php include 'headerCadastro.php' ?>
    </header>

    <main>
        <div class="card">
            <form action="incluirTitulo.php" method="POST">
                <div class="coluna">
                    <div class="label-input">
                        <label for="titulo">Título</label>
                        <input class="input100" type="text" name="titulo" id="titulo" required>
                    </div>

                    <div class="label-input">
                        <label for="titulo-original">Título Original</label>
                        <input class="input100" type="text" name="titulo-original" id="titulo-original">
                    </div>

                    <div class="label-input">
                        <label for="tipo">Tipo</label>
                        <select name="tipo" id="tipo">
                            <option value="">Selecionar...</option>
                            <option value="serie">Série</option>
                            <option value="filme">Filme</option>
                            <option value="anime">Anime</option>
                            <option value="documentario">Documentário</option>
                            <option value="reality-show">Reality Show</option>
                        </select>
                    </div>

                    <div class="label-input">
                        <label for="search-categorias">Categorias</label>
                        <input type="text" id="search-categorias" placeholder="Pesquisar categorias...">
                        <div id="categorias" class="categorias-container">
                            <?php foreach ($opcoes as $opcao): ?>
                                <label class="categoria-item">
                                    <input class="input-select" type="checkbox" name="categorias[]" value="<?= htmlspecialchars($opcao['categoria_id']) ?>">
                                    <?= htmlspecialchars($opcao['categoria']) ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="label-input">
                        <label for="diretor">Diretor</label>
                        <input type="text" id="diretor" name="diretor">
                    </div>

                    <div class="label-input">
                        <label for="duracao">Duração</label>
                        <input type="text" id="duracao" name="duracao">
                    </div>

                    <div class="label-input">
                        <label for="data-estreia">Data de Estréia</label>
                        <input type="date" id="data-estreia" name="data-estreia">
                    </div>

                    <div class="label-input">
                        <label for="pais-origem">País de Origem</label>
                        <input type="text" id="pais-origem" name="pais-origem">
                    </div>

                    <div class="label-input">
                        <label for="roteiro">Roteiro</label>
                        <input type="text" id="roteiro" name="roteiro">
                    </div>
                </div>

                <div class="coluna">
                    <div class="label-input">
                        <label for="meta-dados">MetaDados</label>
                        <textarea id="meta-dados" name="meta-dados"></textarea>
                    </div>

                    <div class="label-input">
                        <label for="sinopse">Sinopse</label>
                        <textarea id="sinopse" name="sinopse"></textarea>
                    </div>

                    <div class="label-input">
                        <label for="classificacao">Classificação</label>
                        <input type="text" id="classificacao" name="classificacao">
                    </div>

                    <div class="label-input">
                        <label for="search-atores">Atores</label>
                        <input type="text" id="search-atores" placeholder="Pesquisar atores...">
                        <div id="atores" class="categorias-container">
                            <?php foreach ($tags as $tag): ?>
                                <label class="categoria-item">
                                    <input class="input-select" type="checkbox" name="atores[]" value="<?= htmlspecialchars($tag['id']) ?>">
                                    <?= htmlspecialchars($tag['nome_artistico']) ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>
