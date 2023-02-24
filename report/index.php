<?php

include "../conectionDB.php";

require "../login/verify.php";

$dateI = $_POST['dateI'] ?? null;
$dateF = $_POST['dateF'] ?? null;

$q = "SELECT D.id, D.date, D.shift, D.production, D.quality, D.maintenance, D.security, P.description, U.name
FROM diary D INNER JOIN product P ON D.product_id = P.id INNER JOIN users U ON D.users_id = U.id 
WHERE D.date BETWEEN '$dateI' AND '$dateF'";

$result = mysqli_query($link, $q);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php include "../header.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Report</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="textoNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../inicial/index.php">Voltar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <br>

    <form action="index.php" method="POST">

        <div class="form-group">
            <label for="date">Data Inicial:</label>
            <input type="date" name="dateI" id="">
        </div>

        <br>

        <div class="form-group">
            <label for="date">Data Final:</label>
            <input type="date" name="dateF" id="">
        </div>

        <br>

        <button class="btn btn-outline-dark" type="submit">Enviar</button>

    </form>

    <br>

    <fieldset class="fieldset">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Turno</th>
                    <th>Lider de Produção</th>
                    <th>Produto</th>
                    <th>Produção</th>
                    <th>Qualidade</th>
                    <th>Manutenção</th>
                    <th>Segurança</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $value) : ?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['date']; ?></td>
                        <td><?php echo $value['shift']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['description']; ?></td>
                        <td><?php echo $value['production']; ?></td>
                        <td><?php echo $value['quality']; ?></td>
                        <td><?php echo $value['maintenance']; ?></td>
                        <td><?php echo $value['security']; ?></td>

                        <td>
                            <button class="btn btn-outline-dark">
                                <p><a href="delete.php?id=<?php echo $value['id']; ?>">Deletar</a></p>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </fieldset>
</body>

</html>

<?php mysqli_close($link);?>