<?php

session_start();

include "../conectionDB.php";

$email = $_POST['email'] ?? null;
$password = md5($_POST['password']) ?? null;

if (!$email || !$password) {
    echo "Você deve digitar sua senha e login!";
    exit;
}

$sql = ("SELECT id, email, password FROM users WHERE email = '$email' AND password = '$password'");

$result = mysqli_query($link, $sql) or die("Erro no banco de dados!");
$total = mysqli_num_rows($result);

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if ($total) {
    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
    $dados = mysqli_fetch_array($result);

    // Agora verifica a senha
    if (!strcmp($password, $dados["password"])) {
        // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
        $_SESSION["id"] = $dados["id"];
        header("Location: ../inicial./index.php");
        exit;
    }
    // Senha inválida
    else {
        "Senha inválida!";
        exit;
    }
}
// Login inválido
else {
    echo "O login fornecido por você é inexistente!";
    exit;
}
?>
