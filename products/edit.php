<?php

include "../conectionDB.php";

require "../login/verify.php";

$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $id != null){

    $description = $_POST['description'] ?? null;
    
    $sql = "update product set description='$description'
    where id='$id'"; 

    $result = mysqli_query($link, $sql);

    header('location: index.php');



    die();
}


$q = "select * from product where id='$id'"; 

$result = mysqli_query($link, $q);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php include "../header.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
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

    <h1>Editar Produtos</h1>

    <br>

    <form action="edit.php?id=<?php echo $rows[0]['id'];?>" method="POST">

        <input type="text" class="form-control" name="description" value="<?php echo $rows[0]['description'];?>"><br>
        <button class="btn btn-outline-dark" type="submit">Adicionar</button>

    </form>

</body>

</html>

<?php mysqli_close($link); ?>