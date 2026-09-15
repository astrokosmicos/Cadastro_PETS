<?php

session_start();

require_once("conecta.php");


if (isset($_POST["login"]) && isset($_POST["senha"])) {

    $email = mysqli_real_escape_string($conn, $_POST["login"]);

    $senha = mysqli_real_escape_string($conn, $_POST["senha"]);


    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

    $resultado = mysqli_query($conn, $sql);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_array($resultado);

        $_SESSION["usuario"] = $usuario["nome"];

        header("location: index.php");
        exit();


    } else {
        $_SESSION["msg"] = "E-mail ou senha incorretos!";
        $_SESSION["class"] = "alert-danger";

        header("location: login.php");

        exit();
    }
} else {
    header("location: login.php");
    exit();
}
?>