<?php

include "../conectionDB.php";

require "../login/verify.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $date = $_POST['date'] ?? null;
    $shift = $_POST['shift'] ?? null;
    $product = $_POST['product'] ?? null;
    $users = $_SESSION['id'] ?? null;
    $production = $_POST['production'] ?? null;
    $quality = $_POST['quality'] ?? null;
    $maintenance = $_POST['maintenance'] ?? null;
    $security = $_POST['security'] ?? null;

    $sql = "insert into diary (product_id, users_id, date, shift, production, quality, maintenance, security)
    values ('$product','$users','$date', '$shift', '$production', '$quality', '$maintenance', '$security')";

    $result = mysqli_query($link, $sql);

    header('location: index.php');

    die();
}

$q = "select * from product";

$result = mysqli_query($link, $q);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php include "../header.php" ?>

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

    <form action="insert.php" method="POST">
        <div class="form-group">
            <label for="date">Data</label>
            <input type="date" name="date" id="">
        </div>
        <br>
        <div class="form-group">
            <label for="turno">Turno</label>
            <select name="shift">
                <option value="A" selected>A - 6:00/14:00</option>
                <option value="B">B - 14:00/23:00</option>
                <option value="C">C - 23:00/06:00</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Produto</label>
            <select class="form-control" id="exampleFormControlSelect1" name="product">
                <?php foreach ($rows as $value) : ?>
                    <option value="<?php echo $value['id']; ?>"> <?php echo $value['description'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Produção</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="production"></textarea>
        </div>
        <div class="form-group">
            <label>Qualidade</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="quality"></textarea>
        </div>
        <div class="form-group">
            <label>Manutenção</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="maintenance"></textarea>
        </div>
        <div class="form-group">
            <label>Segurança</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="security"></textarea>
        </div>

        <br>

        <button class="btn btn-outline-dark" type="submit">Enviar</button>
    </form>
</body>