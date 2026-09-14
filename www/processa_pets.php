<?php

/**Esse arquivo recebe as requisições POST, executa as validações, decide entre INSERT
 * e UPDATE e armazena mensagens da sessão, ficando separado deixa os códigos da interface mais limpos e
 * parecidos com os que fazemos nas aulas
 */



session_start();

require_once("conecta.php");

if (!isset($_POST["enviar"])) {
    header("location: index.php");
    exit();
}



$id = isset($_POST["id_pet"]) ? $_POST["id_pet"] : '';
$nome = $_POST["nome"];
$nascimento = $_POST["nascimento"];
$especie_id = $_POST["especie_id"];
$genero = $_POST["genero"];
$prontuario = $_POST["prontuario"];

$erros = [];




if (empty($nome)) $erros[] = "Preencha o nome";
if (empty($nascimento)) $erros[] = "Preencha a data de nascimento";
if (empty($especie_id)) $erros[] = "Selecione a espécie";
if (empty($genero)) $erros[] = "Selecione o gênero";

if (count($erros) > 0) {
    $_SESSION["msg"] = implode("<br>", $erros);
    $_SESSION["class"] = "alert-danger";
} else {
    if (!empty($id)) {
        $sql = "UPDATE pets SET 
                nome = '$nome', 
                nascimento = '$nascimento', 
                especie_id = $especie_id, 
                genero = '$genero', 
                prontuario = '$prontuario' 
                WHERE id = $id";
        $msg_sucesso = "Pet alterado com sucesso!";
    } else {
        $sql = "INSERT INTO pets (nome, nascimento, especie_id, genero, prontuario) 
                VALUES ('$nome', '$nascimento', $especie_id, '$genero', '$prontuario')";
        $msg_sucesso = "Pet cadastrado com sucesso!";
    }




    if (mysqli_query($conn, $sql)) {
        $_SESSION["msg"] = $msg_sucesso;
        $_SESSION["class"] = "alert-success";



    } else {
        $_SESSION["msg"] = "Erro ao salvar no banco de dados.";
        $_SESSION["class"] = "alert-danger";
    }
}

mysqli_close($conn);

header("location: index.php");

?>