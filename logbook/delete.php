<?php

include "../conectionDB.php";

require "../login/verify.php";

$id = $_GET['id'] ?? null;

 $sql = "delete from diary where id = $id";

 $result = mysqli_query($link, $sql);

 header('location: index.php');


mysqli_close($link);