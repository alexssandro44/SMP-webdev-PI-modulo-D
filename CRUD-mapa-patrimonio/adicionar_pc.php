<?php

$dsn = "sqlite:../database.db";

$pdo = new PDO($dsn);


// dados do formulário

$numero = $_POST['numero'];
$modelo = $_POST['modelo'];
$patrimonio = $_POST['patrimonio'];
$monitor = $_POST['monitor'];
$modelo_monitor = $_POST['modelo_monitor'];
$ponto_rede = $_POST['ponto_rede'];
$imagem = $_POST['imagem'];
$sala_id = $_POST['sala_id'];



$sql = "INSERT INTO pcs 
(sala_id, numero, modelo, patrimonio, monitor, modelo_monitor, ponto_rede, imagem)
VALUES (:sala_id, :numero, :modelo, :patrimonio, :monitor, :modelo_monitor, :ponto_rede, :imagem)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':sala_id'=> $sala_id,
    ':numero' => $numero,
    ':modelo' => $modelo,
    ':patrimonio' => $patrimonio,
    ':monitor' => $monitor,
    ':modelo_monitor' => $modelo_monitor,
    ':ponto_rede' => $ponto_rede,
    ':imagem' => $imagem
]);

// voltar pra página
header("Location: ../mapaADM.php?sala_id=".$sala_id);



?>
