<?php 
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
    exit();
}

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
        $nome_especie = $esp["especie"];
        $titulo_pagina = "Editar Espécie";
    }
}

include_once 'cabecalho.php';

?>

    <main class="conteudo-principal">
        <div class="box-formulario">
            <h2><?= $titulo_pagina ?></h2>

            <form action="processa_especies.php" method="POST" class="form-cadastro">
                <input type="hidden" name="id" value="<?= $id_especie ?>">
                <div class="campo-grupo">
                    <label for="especie">Nome da Espécie</label>
                    <input type="text" id="especie" name="especie" required placeholder="Ex: Cachorro, Gato, Roedor..." value="<?= $nome_especie ?>">
                </div>

                <div class="acoes-formulario">
                    <button type="submit" class="bot-salvar">Salvar </button>
                    <a href="especies.php" class="bot-cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </main>

<?php include_once 'rodape.php'; ?>