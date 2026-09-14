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
                    <?php

                        $sql = "SELECT pets.*, especies.especie AS nome_especie 
                                FROM pets 
                                LEFT JOIN especies ON pets.especie_id = especies.id 
                                ORDER BY pets.nome ASC";


                        $resultado = mysqli_query($conn, $sql);

                        if ($resultado && mysqli_num_rows($resultado) > 0) {


                            while ($row = mysqli_fetch_array($resultado)) {
                                $data_br = date('d/m/Y', strtotime($row['nascimento']));
                                echo "<tr>";
                                echo "<td>{$row['id']}</td>";
                                echo "<td>{$row['nome']}</td>";
                                echo "<td>{$data_br}</td>";

                                echo "<td>{$row['nome_especie']}</td>";
                                echo "<td>" . ucfirst($row['genero']) . "</td>";
                                echo "<td>{$row['prontuario']}</td>";
                                echo "<td class=\"coluna-acoes\">
                                        <a href=\"cadastro_pets.php?id={$row['id']}\" class=\"bot-acao bot-editar\">Editar</a>
                                        <a href=\"excluir_pet.php?id={$row['id']}\" class=\"bot-acao bot-excluir\" onclick=\"return confirm('Deseja mesmo excluir o PET?');\">Excluir</a>
                                    </td>";
                                echo "</tr>";
                                
                            }

                        } else {
                            echo "<tr><td colspan='7'>Nenhum pet cadastrado.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

  <?php include_once 'rodape.php'; ?>