
<?php include "header.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="POST" action="login/login.php">
        <label>Login:</label><input type="text" name="email" id="login" class="form-control"><br>
        <label>Senha:</label><input type="password" name="password" id="senha" class="form-control"><br>
        <button class="btn btn-outline-dark" type="submit" value="entrar" id="entrar" name="entrar">Enviar</button><br>
    </form>

</body>

</html>