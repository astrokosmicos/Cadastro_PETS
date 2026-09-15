<?php

session_start();

require_once("conecta.php");


if (isset($_GET["id"]) && !empty($_GET["id"])) {

    $id = $_GET["id"];

    $sql = "DELETE FROM especies WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) == 1) {
            $_SESSION["msg"] = "Espécie excluída com sucesso.";

            $_SESSION["class"] = "alert-success";


        } else {
            $_SESSION["msg"] = "Registro não encontrado.";
            $_SESSION["class"] = "alert-danger";
        }



    } else {

        $_SESSION["msg"] = "Erro ao excluir espécie. Verifique se existem pets associados.";
        $_SESSION["class"] = "alert-danger";

    }
}

mysqli_close($conn);

header("location: especies.php");

?>