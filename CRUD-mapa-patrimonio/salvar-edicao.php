<?php

$dsn = "sqlite:../database.db";
$pdo = new PDO($dsn);

// Receber dados
$sala_id = $_POST['sala_id'];
$id = $_POST['id']; 

$numero = $_POST['numero'];
$modelo = $_POST['modelo'];
$patrimonio = $_POST['patrimonio'];
$monitor = $_POST['monitor'];
$modelo_monitor = $_POST['modelo_monitor'];
$ponto_rede = $_POST['ponto_rede'];
$imagem = $_POST['imagem'];


$sql = "UPDATE pcs SET
    numero = :numero,
    modelo = :modelo,
    patrimonio = :patrimonio,
    monitor = :monitor,
    modelo_monitor = :modelo_monitor,
    ponto_rede = :ponto_rede,
    imagem = :imagem
WHERE id = :id";

// preparar
$stmt = $pdo->prepare($sql);

// executar
$stmt->execute([
    ':numero' => $numero,
    ':modelo' => $modelo,
    ':patrimonio' => $patrimonio,
    ':monitor' => $monitor,
    ':modelo_monitor' => $modelo_monitor,
    ':ponto_rede' => $ponto_rede,
    ':imagem' => $imagem,
    ':id' => $id
]);


// voltar
header("Location: ../mapaADM.php?sala_id=".$sala_id);

