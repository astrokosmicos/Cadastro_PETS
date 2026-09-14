<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro Especie - Abrigo de Animais</title>

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
        <div class="box-formulario">
            <h2> Cadastrar Nova Espécie</h2>

            <form action="especies.html" method="POST" class="form-cadastro">
                <div class="campo-grupo">
                    <label for="especie">Nome da Espécie</label>
                    <input type="text" id="especie" name="especie" required placeholder="Ex: Cachorro, Gato, Roedor...">
                </div>

                <div class="acoes-formulario">
                    <button type="submit" class="bot-salvar">Salvar </button>
                    <a href="especies.php" class="bot-cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </main>

    <!-- rodapé -->
    <footer class="rodape-sistema">
        <p>Sistema Cadastro Adoção Pets</p>
    </footer>

</body>
</html>