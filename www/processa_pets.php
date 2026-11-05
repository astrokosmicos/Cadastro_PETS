<?php

/**Esse arquivo recebe as requisições POST, executa as validações, decide entre INSERT
 * e UPDATE e armazena mensagens da sessão, ficando separado deixa os códigos da interface mais limpos e
 * parecidos com os que fazemos nas aulas
 */

session_start();

require_once("conecta.php");

// Verifica se o usuário está logado
if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
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


$caminho_foto = null;

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $arquivo = $_FILES['foto'];

    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/webp'];
    $tamanhoMaximo = 5 * 1024 * 1024; // 5 MB

    if (in_array($arquivo['type'], $tiposPermitidos) && $arquivo['size'] <= $tamanhoMaximo) {

        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

        $nomeUnico = md5(uniqid(rand(), true)) . "." . $extensao;

        $pastaDestino = "uploads/";
        $caminhoCompleto = $pastaDestino . $nomeUnico;



        if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            $caminho_foto = $caminhoCompleto; // Caminho salvo no banco
        }
    } else {
        $erros[] = "Formato de imagem inválido ou arquivo maior que 5 MB.";
    }
}

if (count($erros) > 0) {
    $_SESSION["msg"] = implode("<br>", $erros);
    $_SESSION["class"] = "alert-danger";
} else {
    if (!empty($id)) {
    
        if ($caminho_foto) {
            $sql = "UPDATE pets SET 
                    nome = '$nome', 
                    nascimento = '$nascimento', 
                    especie_id = $especie_id, 
                    genero = '$genero', 
                    prontuario = '$prontuario',
                    foto = '$caminho_foto'
                    WHERE id = $id";
        } else {
            $sql = "UPDATE pets SET 
                    nome = '$nome', 
                    nascimento = '$nascimento', 
                    especie_id = $especie_id, 
                    genero = '$genero', 
                    prontuario = '$prontuario' 
                    WHERE id = $id";
        }
        $msg_sucesso = "Pet alterado com sucesso!";
    } else {
        
        $sql = "INSERT INTO pets (nome, nascimento, especie_id, genero, prontuario, foto) 
                VALUES ('$nome', '$nascimento', $especie_id, '$genero', '$prontuario', " . ($caminho_foto ? "'$caminho_foto'" : "NULL") . ")";
        $msg_sucesso = "Pet cadastrado com sucesso!";
    }

    if (mysqli_query($conn, $sql)) {
        $_SESSION["msg"] = $msg_sucesso;
        $_SESSION["class"] = "alert-success";
    } else {
        $_SESSION["msg"] = "Erro ao salvar: " . mysqli_error($conn);
        $_SESSION["class"] = "alert-danger";
    }
}

mysqli_close($conn);

header("location: index.php");
exit();
?>