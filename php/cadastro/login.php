<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Criador de conteúdo</title>

    <link rel="stylesheet" href="../../style/styleLogin.css">
</head>
<body>

    <main>
        <form class="card-login" method="POST" action="logar.php">

            <div class="label-input">
                <label for="usuario">Login</label>
                <input type="text" id="usuario" name="usuario">
            </div>
           
           
            <div class="label-input">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password">
            </div>
           
            

            <input type="submit" id="logar" value="Logar">
        </form>
    </main>
    <script>
        window.onload = function() {
            // Substitui a entrada atual no histórico
            window.history.replaceState(null, null, window.location.href);
            // Impede que o usuário use o botão "Voltar"
            window.onpopstate = function() {
                window.history.replaceState(null, null, window.location.href);
            };
        };
    </script>
</body>
</html>