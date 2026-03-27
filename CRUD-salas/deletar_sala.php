<?php

$dsn = ("sqlite:../database.db");

$pdo = new PDO($dsn);

// pegar via get o id a ser deletado 

$id = $_GET['id'];

$sql = "DELETE FROM salas WHERE id = ?";

$stmt = $pdo->prepare($sql);

$stmt ->execute([$id]);

header("Location: ../Bloco.php");


?>

