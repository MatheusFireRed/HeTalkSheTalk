<?php
    session_start();
    require 'conexaoDB.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $username = $_POST['usuario'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && $password === $user['password']){

            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: ../../cadastroTitulos.php");

            exit;
        } else {
            echo "Usuário ou senha inválidos.";

            echo "Senha enviada: " . $password . "<br>";
            echo "Senha no banco: " . $user['password'] . "<br>";
            echo "Username no banco: " . $user['username'] . "<br>";
            echo "Username enviado: " . ($username) . "<br>";
        }
    }
?>
