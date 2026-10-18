<?php

$dsn = ("sqlite:../database.db");

$pdo = new PDO($dsn);

// pegar via get o id a ser deletado 

$id = $_GET['id'];
$sala_id = $_GET['sala_id'];

$sql = "DELETE FROM pcs WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: ../pagina_mapa.php?sala_id=".$sala_id);



?>

