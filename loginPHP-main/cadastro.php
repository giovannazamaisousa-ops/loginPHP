<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = trim($_POST["usuario"]);
    $senha   = $_POST["senha"];

    // 1. Carrega a lista de usuários que já existem
    if (file_exists("usuarios.json")) {
        $usuarios = json_decode(file_get_contents("usuarios.json"), true);
    } else {
        $usuarios = [];
    }

    // 2. Faz as verificações
    if ($usuario === "") {
        $mensagem = "Digite um nome de usuário.";
    } elseif (strlen($senha) < 4) {
        $mensagem = "A senha precisa ter pelo menos 4 caracteres.";
    } elseif (isset($usuarios[$usuario])) {
        $mensagem = "Esse usuário já existe. Escolha outro.";
    } else {
        // 3. Tudo certo: criptografa e salva
        $usuarios[$usuario] = password_hash($senha, PASSWORD_DEFAULT);
        file_put_contents("usuarios.json", json_encode($usuarios));
        $mensagem = "Conta criada! Já pode fazer login.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="cartao">
        <h1>Criar conta</h1>
        <p class="subtitulo">Escolha um usuario e uma senha</p>
        <form method="post">
            <p><input type="text" name="usuario" placeholder="Escolha um usuário"></p>
            <p><input type="password" name="senha" placeholder="Escolha uma senha"></p>
            <button>Cadastrar</button>
        </form>
        <p class="link"><a href="login.php">Já tenho conta</a></p>
    </main>
</body>
</html>