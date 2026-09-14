<?php

session_start();

require_once("conecta.php");

if (!isset($_POST["enviar"])) {
    header("location: especies.php");
    exit();
}

$id = isset($_POST["id_especie"]) ? $_POST["id_especie"] : '';

$especie = $_POST["especie"];

if (empty($especie)) {
    $_SESSION["msg"] = "Preencha o nome da espécie.";

    $_SESSION["class"] = "alert-danger";

} else {
    if (!empty($id)) {
        $sql = "UPDATE especies SET nome = '$especie' WHERE id = $id";
        $msg_sucesso = "Espécie alterada com sucesso!";
    } else {
        $sql = "INSERT INTO especies (nome) VALUES ('$especie')";
        $msg_sucesso = "Espécie cadastrada com sucesso!";
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

header("location: especies.php");

?>