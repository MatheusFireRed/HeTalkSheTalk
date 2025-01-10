<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Área Restrita</title>

    <link rel="stylesheet" href="style/styleCadastroTitulo.css">
</head>
<body>

    <header>

        <div class="box-saudacao">
            <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        </div>

        <div class="box-menu">
            <ul class="menu">
               <li>
                    <a href="cadastroTitulos.php">Cadastrar Titulo</a>
               </li> 
               <li>
                    <a href="#">Comentar sobre titulo</a>
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
                <div class="label-input">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo">
                </div>

                <div class="label-input">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" id="tipo">
                        <option value="">Selecionar..</option>
                        <option value="serie">Série</option>
                        <option value="filme">Filme</option>
                        <option value="anime">Anime</option>
                        <option value="documentario">Documentário</option>
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

                <button type="submit">Enviar</button>
            </form>
        </div>

    </main>

    
</body>
</html>