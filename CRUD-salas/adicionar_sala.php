<?php

$dsn = "sqlite:../database.db";

$pdo = new PDO($dsn);


// dados do formulário
$nome = $_POST['nome'];

// realiza a verificação da existencia da sala no bloco
$bloco = isset($_POST['bloco']) ? (int) $_POST['bloco'] : 1;


$sql = "INSERT INTO salas
(nome,bloco)
VALUES (:nome, :bloco)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome'=> $nome,
    ':bloco' => $bloco,
    
]);

// voltar pra página
header("Location: ../Bloco.php?bloco=" . $bloco);
exit;


?>
