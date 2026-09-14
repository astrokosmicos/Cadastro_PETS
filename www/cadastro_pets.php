<?php 
session_start();

require_once("conecta.php"); 

include_once 'cabecalho.php'; 

?>

    <main class="conteudo-principal">
        <div class="box-formulario">
            <h2>Novo Pet</h2>

            <form action="index.html" method="POST" class="form-cadastro">
                <div class="campo-grupo">
                    <label for="nome">Nome do Pet</label>
                    <input type="text" id="nome" name="nome" required placeholder="Preencha o nome do seu PET">
                </div>

                <div class="campo-grupo">
                    <label for="nascimento">Data de Nascimento</label>
                    <input type="date" id="nascimento" name="nascimento" required>
                </div>

                <div class="campo-grupo">
                    <label for="especie_id">Espécie</label>
                    <select id="especie_id" name="especie_id" required>
                        <option value="">Selecione uma espécie</option>
                        <option value="1">Cachorro</option>
                        <option value="2">Gato</option>
                    </select>
                </div>

                <div class="campo-grupo">
                    <label>Gênero</label>
                    <div class="opcoes-radio">
                        <label><input type="radio" name="genero" value="macho" required> Macho</label>
                        <label><input type="radio" name="genero" value="femea" required> Fêmea</label>
                    </div>
                </div>

                <div class="campo-grupo">
                    <label for="prontuario">Prontuário</label>
                    <textarea id="prontuario" name="prontuario" rows="4" placeholder="Alergias, castração, diagnósticos ou características relevantes..."></textarea>
                </div>

                <div class="acoes-formulario">
                    <button type="submit" class="bot-salvar">Salvar Pet</button>
                    <a href="index.php" class="bot-cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </main>

 <?php include_once 'rodape.php'; ?>