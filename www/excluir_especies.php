<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
    exit();
}

require_once("conecta.php");

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];


    $sql = "DELETE FROM especies WHERE id = $id";

    if (mysqli_query($conn, $sql)) {

        $_SESSION["msg"] = "Espécie excluída com sucesso!";
        $_SESSION["class"] = "alert-success";


    } else {

        $_SESSION["msg"] = "Erro ao excluir espécie: " . mysqli_error($conn);
        $_SESSION["class"] = "alert-danger";
    }
}

mysqli_close($conn);

header("location: especies.php");
exit();

?>