<?php 
session_start();

require_once("conecta.php"); 

include_once 'cabecalho.php'; 

?>

    <main class="conteudo-principal">
        <div class="painel-topo">
            <h2>Pets Cadastrados</h2>
            <a href="cadastro_pets.php" class="bot-novo">+ Cadastrar Novo Pet</a>
            
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

  <?php include_once 'rodape.php'; ?>