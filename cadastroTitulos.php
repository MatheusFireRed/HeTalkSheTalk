<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");


$tituloDaPagina = 'Area de Criação';

require_once 'php/DB/conexaoDB.php';

try {
    // Consulta para obter os dados
    $query = "SELECT categoria_id, categoria FROM categorias ORDER BY categoria";
    $stmt = $pdo->query($query);

    // Verifica se há resultados
    $opcoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erro ao buscar os dados: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $tituloDaPagina ?></title>

    <link rel="stylesheet" href="style/styleCadastroTitulo.css">
</head>
<body>

    <header>

        <div class="box-saudacao">
            <h1 class="saudacao">Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        </div>

        <div class="box-menu">
            <ul class="menu">
               <li>
                    <a href="cadastroTitulos.php">Cadastrar <br> Titulo</a>
               </li> 
               <li>
                    <a href="#">Comentar <br> sobre <br> titulo</a>
               </li>
            </ul>
        </div>
        <form action="php/DB/logout.php" method="post">
            <button type="submit">Sair</button>
        </form>
    </header>

    <main>

        <div class="card">

            <form action="php/DB/incluirTitulo.php" method="POST">

                <div class="coluna">
                    <div class="label-input">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo">
                    </div>

                    <div class="label-input">
                        <label for="titulo-original">Titulo Original</label>
                        <input type="text" name="titulo-original" id="titulo-original">
                    </div>

                    <div class="label-input">
                        <label for="tipo">Tipo</label>
                        <select name="tipo" id="tipo">
                            <option value="">Selecionar..</option>
                            <option value="serie">Série</option>
                            <option value="filme">Filme</option>
                            <option value="anime">Anime</option>
                            <option value="documentario">Documentário</option>
                            <option value="reality-show">Reality Show</option>
                        </select>
                    </div>

                    <div class="label-input">
                        <label>Categorias</label>
                        <div id="categorias">
                            <?php foreach ($opcoes as $opcao): ?>
                            <label>
                                <input type="checkbox" name="categorias[]" value="<?= htmlspecialchars($opcao['categoria_id']) ?>">
                                <?= htmlspecialchars($opcao['categoria']) ?>
                            </label><br>
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
                        <label for="data-estreia">Data da estréia</label>
                        <input type="date" name="data-estreia" id="data-estreia">
                    </div>

                    <div class="label-input">
                        <label for="pais-origem">País de Origem</label>
                        <input type="text" id="pais-origem" name="pais-origem">
                    </div>

                    <div class="label-input">
                        <label for="roteiro">Roteiro</label>
                        <input type="text" name="roteiro" id="roteiro">
                    </div>
                </div>

                <div class="coluna">
                    <div class="label-input">
                        <label for="meta-dados">MetaDados</label>
                        <textarea name="meta-dados" id="meta-dados"></textarea>
                    </div>

                    <div class="label-input">
                        <label for="sinopse">Sinopse</label>
                        <textarea name="sinopse" id="sinopse"></textarea>
                    </div>
                </div>
                <button type="submit">Enviar</button>
            </form>
                
        </div>

    </main>

    
</body>
</html>