<?php

session_start();

require_once("conecta.php");


$id = isset($_POST["id"]) ? $_POST["id"] : '';

$especie = isset($_POST["especie"]) ? mysqli_real_escape_string($conn, $_POST["especie"]) : '';

if (empty($especie)) {
    $_SESSION["msg"] = "Preencha o nome da espécie.";
    $_SESSION["class"] = "alert-danger";

} else {

    if (!empty($id)) {
        $sql = "UPDATE especies SET especie = '$especie' WHERE id = $id";
        $msg_sucesso = "Espécie alterada com sucesso!";
    } else {
        $sql = "INSERT INTO especies (especie) VALUES ('$especie')";
        $msg_sucesso = "Espécie cadastrada com sucesso!";
    }

    if (mysqli_query($conn, $sql)) {

        $_SESSION["msg"] = $msg_sucesso;

        $_SESSION["class"] = "alert-success";


    } else {
        $_SESSION["msg"] = "Erro ao salvar no banco de dados: " . mysqli_error($conn);
        $_SESSION["class"] = "alert-danger";
    }
}

mysqli_close($conn);

header("location: especies.php");
exit();


?>