<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Criador de conteúdo</title>

    <link rel="stylesheet" href="style/styleLogin.css">
</head>
<body>
    <main>
        <form class="card-login" method="POST" action="php/DB/logar.php">

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
</body>
</html>