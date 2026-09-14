<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Lista - Abrigo de Animais</title>
</head>
<body>
    <!-- cabeçalho -->
    <header class="topo-navegacao">
        <div class="container-header">
            <div class="marca">
                <a href="index.html">
                    <img src="css/pata-de-cachorro.png" alt="Ícone Patinha" class="logo-icone">
                    Lista Pets
                </a>
            </div>
            <nav class="menu-principal">
                <ul>
                    <li><a href="index.html">Pets</a></li>
                    <li><a href="especies.html">Espécies</a></li>
                    <li><a href="login.html" class="bot-sair">Desconectar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="conteudo-principal">
        <div class="painel-topo">
            <h2>Pets Cadastrados</h2>
            <a href="cadastro_pets.html" class="bot-novo">+ Cadastrar Novo Pet</a>
            
            <link rel="stylesheet" href="css/style.css">

        </div>

        <div class="tabela-wrapper">
            <table class="tabela-dados">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th>Espécie</th>
                        <th>Gênero</th>
                        <th>Prontuário</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Tom</td>
                        <td>15/05/2022</td>
                        <td>Gato</td>
                        <td>Macho</td>
                        <td>Vacinas atualizadas, castrado e muito dócil.</td>
                        <td class="coluna-acoes">
                            <a href="cadastro_pets.html" class="bot-acao bot-editar">Editar</a>
                            <a href="#" class="bot-acao bot-excluir" onclick="return confirm('Deseja mesmo excluir o PET?');">Excluir</a>
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