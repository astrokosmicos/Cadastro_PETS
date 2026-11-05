<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
    exit();
}

require_once("conecta.php");


if (isset($_GET["id"]) && !empty($_GET["id"])) {

    $id = $_GET["id"];

    $sqlFoto = "SELECT foto FROM pets WHERE id = $id";
    $resultadoFoto = mysqli_query($conn, $sqlFoto);
    if ($resultadoFoto && $row = mysqli_fetch_assoc($resultadoFoto)) {
        // Se houver uma foto cadastrada e o arquivo existir no servidor, apaga-o
        if (!empty($row['foto']) && file_exists($row['foto'])) {
            unlink($row['foto']);
        }
    }

    $sql = "DELETE FROM pets WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) == 1) {

            $_SESSION["msg"] = "Pet excluído com sucesso.";

            $_SESSION["class"] = "alert-success";
        } else {
            $_SESSION["msg"] = "Registro não encontrado.";
            $_SESSION["class"] = "alert-danger";
        }
    } else {

        $_SESSION["msg"] = "Erro ao excluir pet.";
        $_SESSION["class"] = "alert-danger";
    }
}

mysqli_close($conn);


header("location: index.php");
?>