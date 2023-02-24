<?php

include "../conectionDB.php";

require "../login/verify.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $description = $_POST['description'] ?? null;

    $sql = "insert into product (description)
    values ('$description')"; 

    $result = mysqli_query($link, $sql);

    header('location: /index.php');

    die();
}

?>

<?php include "../header.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
</head>
<body>

<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="textoNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Voltar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <br>

    <h3>Adicionar Produtos</h3>

    <br>

    <form action="insert.php" method="POST">
        
        <input type="text" class="form-control" name="description"><br>
        <button class="btn btn-outline-dark" type="submit">Adicionar</button>

    </form>
    
</body>
</html>

<?php mysqli_close($link); ?>