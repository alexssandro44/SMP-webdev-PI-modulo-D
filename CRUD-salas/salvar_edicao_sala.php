<?php

$dsn = "sqlite:../database.db";
$pdo = new PDO($dsn);

// Receber dados
$id = $_POST['id'];
$nome = $_POST['nome'];
$bloco = $_POST['bloco'];

// update
$sql = "UPDATE salas SET
    nome = :nome,
    bloco = :bloco
WHERE id = :id";

// preparar
$stmt = $pdo->prepare($sql);

// executar
$stmt->execute([
    ':nome' => $nome,
    ':bloco' => $bloco,
    ':id' => $id
]);

// voltar
header("Location: ../Bloco.php");
