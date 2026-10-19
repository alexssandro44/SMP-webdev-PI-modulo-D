<?php

$dsn = ("sqlite:../database.db");

$pdo = new PDO($dsn);

// pegar via get o id a ser deletado 

$id = $_GET['id'];


// faz a verigicação da existencia da sala a ser deletada
$bloco = isset($_GET['bloco']) ? (int) $_GET['bloco'] : 1;


$sql = "DELETE FROM salas WHERE id = ?";

$stmt = $pdo->prepare($sql);

$stmt ->execute([$id]);

header("Location: ../Bloco.php?bloco=" . $bloco);


?>

