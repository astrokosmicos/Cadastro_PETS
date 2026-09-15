<?php

session_start();

// desconectar
if (isset($_GET['acao']) && $_GET['acao'] == 'sair') {
    session_unset();
    session_destroy();
    header("location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login - Abrigo de Animais </title>

    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

    <main class="conteudo-principal">
        <div class="card-login">
            <div class="login-banner">
                <h1>
                    <img src="css/pata-de-cachorro.png" alt="Ícone Patinha" class="logo-login-icone">
                    Lista de Pets
                </h1>
                <p>Acesse a gestão de animais</p>
            </div>

            <form action="processa_login.php" method="POST" class="form-login">
                <div class="campo-grupo">
                    <label for="login">E-mail do Usuário</label>
                    <input type="text" id="login" name="login" required placeholder="Digite seu e-mail ou nome de usuário">
                </div>

                <div class="campo-grupo">
                    <label for="senha">Senha de Acesso</label>
                    <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
                </div>

                <button type="submit" class="bot-entrar"> Acessar </button>
            </form>
        </div>
    </main>


<?php include_once 'rodape.php'; ?>