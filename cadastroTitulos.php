<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
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
        <a class="logout" href="login.php">Sair</a>
    </header>

    <main>


    </main>

    
</body>
</html>