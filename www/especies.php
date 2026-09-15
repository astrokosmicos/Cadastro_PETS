<?php 
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
    exit();
}

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
                <?php

                $sql = "SELECT * FROM especies ORDER BY especie ASC";
                $resultado = mysqli_query($conn, $sql);

                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['especie']}</td>";

                        echo "<td class=\"coluna-acoes\">

                                <a href=\"cadastro_especies.php?id={$row['id']}\" class=\"bot-acao bot-editar\">Editar</a>
                                <a href=\"excluir_especies.php?id={$row['id']}\" class=\"bot-acao bot-excluir\" onclick=\"return confirm('Deseja mesmo excluir a espécie?');\">Excluir</a>
                              </td>";
                        echo "</tr>";
                        
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhuma espécie cadastrada.</td></tr>";

                }

                ?>
                </tbody>

            </table>
        </div>
    </main>

 <?php include_once 'rodape.php'; ?>