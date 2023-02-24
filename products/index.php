<?php

include "../conectionDB.php";

require "../login/verify.php";

$q = "select * from product";

$result = mysqli_query($link, $q);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php include "../header.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="textoNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../inicial/index.php">Voltar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="insert.php">Adicionar Novo Produto</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <fieldset class="fieldset">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $value) : ?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['description']; ?></td>

                        <td>
                            <button class="btn btn-outline-dark"><p><a href="edit.php?id=<?php echo $value['id']; ?>">Editar</a></p></button>
                        </td>
                        <td>
                            <button class="btn btn-outline-dark"><p><a href="delete.php?id=<?php echo $value['id']; ?>">Deletar</a></p></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </fieldset>
</body>

</html>

<?php mysqli_close($link); ?>