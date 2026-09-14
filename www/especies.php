<?php 
session_start();

require_once("conecta.php"); 

include_once 'cabecalho.php'; 

?>

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

 <?php include_once 'rodape.php'; ?>