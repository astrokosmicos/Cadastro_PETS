<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espécies - Abrigo de Animais</title>

    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <!-- cabeçalho -->
    <header class="topo-navegacao">
        <div class="container-header">

            <div class="marca">
                <a href="index.php">
                    <img src="css/pata-de-cachorro.png" alt="Ícone Patinha" class="logo-icone">
                    Lista Pets
                </a>
            </div>

            <nav class="menu-principal">
                <ul>
                    <li><a href="index.php">Pets</a></li>
                    <li><a href="especies.php">Espécies</a></li>
                    <li><a href="login.php" class="bot-sair">Desconectar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="conteudo-principal">
        <div class="painel-topo">
            <h2>Gerenciamento de Espécies</h2>
            <a href="cadastro_especies.php" class="bot-novo">+ Nova Espécie</a>
        </div>

        <div class="tabela-wrapper">
            <table class="tabela-dados">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Espécie</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Gato</td>
                        <td class="coluna-acoes">
                            <a href="#" class="bot-acao bot-excluir" onclick="return confirm('Deseja mesmo excluir a espécie?');"> Excluir</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </main>

  <!-- rodapé -->
    <footer class="rodape-sistema">
        <p>Sistema Cadastro Adoção Pets</p>
    </footer>

</body>
</html>