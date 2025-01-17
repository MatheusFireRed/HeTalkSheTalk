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
    <title><?php echo $tituloDaPagina; ?></title>

    <link rel="stylesheet" href="../../style/styleCadastroTitulo.css">

    <style>
        .label-input{
            height: 40px;
        }
    </style>
</head>
<body>
    <header>
        <?php include 'headerCadastro.php'; ?>
    </header>

    <main>

        

        <div class="card">
            <form action="incluirAtores.php" method="post">

                <div class="coluna">
                    <div class="label-input">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome">
                    </div>
                    <div class="label-input">
                        <label for="nome-artistico">Nome artistico</label>
                        <input type="text" name="nome-artistico" id="nome-artistico">
                    </div>
                    <div class="label-input">
                        <label for="data-nascimento">Data de nascimento</label>
                        <input type="date" name="data-nascimento" id="data-nascimento">
                    </div>
                    <div class="label-input">
                        <label for="data-falecimento">Data de falecimento</label>
                        <input type="date" name="data-falecimento" id="data-falecimento">
                    </div>
                    <div class="label-input">
                        <label for="nacionalidade">Nacionalidade</label>
                        <input type="text" name="nacionalidade" id="nacionalidade">
                    </div>
                    <div class="label-input">
                        <label for="cidade-nascimento">Cidade de nascimento</label>
                        <input type="text" name="cidade-nascimento" id="cidade-nascimento">
                    </div>
                    <div class="label-input">
                        <label for="estado-nascimento">Estado de nascimento</label>
                        <input type="text" name="estado-nascimento" id="estado-nescimento">
                    </div>
                    <div class="label-input">
                        <label for="filhos">Filhos</label>
                        <input type="text" name="filhos" id="filhos">
                    </div>
                    <div class="label-input">
                        <label for="conjuges">Cônjuges</label>
                        <input type="text" name="conjuges" id="conjuges">
                    </div>
                </div>

                <div class="coluna">
                    <div class="label-input">
                        <label for="txt-apresentacao">Texto de apresentação</label>
                        <textarea name="txt-apresentacao" id="txt-apresentacao"></textarea>
                    </div>
                </div>
                
                    <button>Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>