<?php 
session_start();

require_once("conecta.php"); 

$id_especie = "";
$nome_especie = "";
$titulo_pagina = "Cadastrar Nova Espécie";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id_especie = $_GET["id"];
    $sql = "SELECT * FROM especies WHERE id = $id_especie";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $esp = mysqli_fetch_array($resultado);
        $nome_especie = $esp["nome"];
        $titulo_pagina = "Editar Espécie";
    }
}

include_once 'cabecalho.php';

?>

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

<?php include_once 'rodape.php'; ?>