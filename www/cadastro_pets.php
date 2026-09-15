<?php 
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
    exit();
}

require_once("conecta.php"); 

$id_pet = "";
$nome = "";
$nascimento = "";
$especie_id = "";
$genero = "";
$prontuario = "";
$titulo_pagina = "Novo Pet";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id_pet = $_GET["id"];
    $sql = "SELECT * FROM pets WHERE id = $id_pet";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $pet = mysqli_fetch_array($resultado);
        $nome = $pet["nome"];
        $nascimento = $pet["nascimento"];
        $especie_id = $pet["especie_id"];
        $genero = $pet["genero"];
        $prontuario = $pet["prontuario"];
        $titulo_pagina = "Editar Pet";
    }
}

include_once 'cabecalho.php'; 
?>

    <main class="conteudo-principal">
        <div class="box-formulario">
            <h2>Novo Pet</h2>

            <form action="processa_pets.php" method="POST" class="form-cadastro">

                <input type="hidden" name="id_pet" value="<?= $id_pet ?>">

                <div class="campo-grupo">
                    <label for="nome">Nome do Pet</label>
                    <input type="text" id="nome" name="nome" required placeholder="Preencha o nome do seu PET" value="<?= $nome ?>" >
                </div>

                <div class="campo-grupo">
                    <label for="nascimento">Data de Nascimento</label>
                    <input type="date" id="nascimento" name="nascimento" required value="<?= $nascimento ?>">
                </div>

                <div class="campo-grupo">
                    <label for="especie_id">Espécie</label>
                    <select id="especie_id" name="especie_id" required>
                        <option value="">Selecione uma espécie</option>
                        <?php
                
                        $sql_especies = "SELECT * FROM especies ORDER BY especie ASC";
                        $res_especies = mysqli_query($conn, $sql_especies);

                        if ($res_especies && mysqli_num_rows($res_especies) > 0) {

                            while ($esp = mysqli_fetch_array($res_especies)) {
                                $selected = ($esp['id'] == $especie_id) ? 'selected' : '';
                                echo "<option value='{$esp['id']}' {$selected}>{$esp['especie']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="campo-grupo">
                    <label>Gênero</label>
                    <div class="opcoes-radio">
                        <label><input type="radio" name="genero" value="macho" required <?= ($genero == 'macho') ? 'checked' : '' ?> > Macho</label>
                        <label><input type="radio" name="genero" value="femea" required <?= ($genero == 'femea') ? 'checked' : '' ?> > Fêmea</label>
                    </div>
                </div>

                <div class="campo-grupo">
                    <label for="prontuario">Prontuário</label>
                    <textarea id="prontuario" name="prontuario" rows="4" placeholder="Alergias, castração, diagnósticos ou características relevantes..."><?= $prontuario ?></textarea>
                </div>

                <div class="acoes-formulario">
                    <button name="enviar" type="submit" class="bot-salvar">Salvar Pet</button>
                    <a href="index.php" class="bot-cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </main>

 <?php include_once 'rodape.php'; ?>