<?php
session_start();

if(!isset($_SESSION["usuario"])) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <main class="cartao">
        <span class="selo">Area secreta</span>
        <h1>Bem-vindo, <?php htmlspecialchars($_SESSION["usuario"]) ?></h1>
        <p>Está página é secreta. Só quem faz  login consegue ver.</p>
        <a class="botao-sair" href="sair.php">Sair</a>
    </main>
</body>
</html>