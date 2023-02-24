<?php

include "../conectionDB.php";

require "../login/verify.php";

$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $id != null) {

    $date = $_POST['date'] ?? null;
    $shift = $_POST['shift'] ?? null;
    $product = $_POST['product'] ?? null;
    $production = $_POST['production'] ?? null;
    $quality = $_POST['quality'] ?? null;
    $maintenance = $_POST['maintenance'] ?? null;
    $security = $_POST['security'] ?? null;

    $sql = "update diary set product_id='$product', date='$date', shift='$shift', production='$production', 
                             quality='$quality' , maintenance='$maintenance' , security='$security' 
    where id='$id'";

    $result = mysqli_query($link, $sql);

    header('location: index.php');



    die();
}


$q = "select * from product";

$result = mysqli_query($link, $q);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);


$q2 = "select * from diary where id='$id'";

$result2 = mysqli_query($link, $q2);

$rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

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

    <h3>Editar Diário</h3>

    <br>

    <form action="edit.php?id=<?php echo $rows2[0]['id']; ?>" method="POST">

        <input type="date" name="date" value="<?php echo $rows2[0]['date']; ?>">
        <label for="turno">Turno</label>
        <select name="shift">
            <option value="A" selected>A - 6:00/14:00</option>
            <option value="B">B - 14:00/23:00</option>
            <option value="C">C - 23:00/06:00</option>
        </select><br><br>

        <label for="exampleFormControlSelect1">Produto</label>
        <select class="form-control" id="exampleFormControlSelect1" name="product">
            <?php foreach ($rows as $value) : ?>
                <option value="<?php echo $value['id']; ?>"> <?php echo $value['description'] ?> </option>
            <?php endforeach; ?>
        </select><br><br>

        Produção: <input type="text" class="form-control" name="production" value="<?php echo $rows2[0]['production']; ?>"><br><br>
        Qualidade: <input type="text" class="form-control" name="quality" value="<?php echo $rows2[0]['quality']; ?>"><br><br>
        Manutenção<input type="text" class="form-control" name="maintenance" value="<?php echo $rows2[0]['maintenance']; ?>"><br><br>
        Segurança:<input type="text" class="form-control" name="security" value="<?php echo $rows2[0]['security']; ?>"><br><br>
        <button class="btn btn-outline-dark" type="submit">Editar</button>

    </form>

</body>

</html>

<?php mysqli_close($link); ?>