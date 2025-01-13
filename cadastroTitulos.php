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
                        <label for="categoria">Categoria</label>
                        <select name="categoria" id="categoria">
                            <option value="">Selecionar..</option>
                            <option value="terror">Terror</option>
                            <option value="comedia">Comédia</option>
                            <option value="acao">Ação</option>
                            <option value="romance">Romance</option>
                        </select>
                    </div>

                    <div class="label-input">
                        <label for="diretor">Diretor</label>
                        <input type="text" id="diretor" name="diretor">
                    </div>

                    <div class="label-input">
                        <label for="durecao">Duração</label>
                        <input type="text" id="duracao" name="durecao">
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