<?php

$dsn = ("sqlite:../database.db");

$pdo = new PDO($dsn);

// pegar ID
$id = $_GET['id'];

// buscar dados do PC
$sql = "SELECT * FROM pcs WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$pc = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Editar PC</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<!------------ FORMULARIO DE ATUALIZAÇÃO --------------->

<body class="container mt-5">

<h3>Editar PC <?= $pc['numero'] ?></h3>

<form action="salvar-edicao.php" method="POST">

  <input type="hidden" name="id" value="<?= $pc['id'] ?>">

  <div class="mb-2">
    <label>Número</label>
    <input type="number" name="numero" class="form-control" value="<?= $pc['numero'] ?>">
  </div>

  <div class="mb-2">
    <label>Modelo</label>
    <input type="text" name="modelo" class="form-control" value="<?= $pc['modelo'] ?>">
  </div>

  <div class="mb-2">
    <label>Patrimônio</label>
    <input type="text" name="patrimonio" class="form-control" value="<?= $pc['patrimonio'] ?>">
  </div>

  <div class="mb-2">
    <label>Monitor</label>
    <input type="text" name="monitor" class="form-control" value="<?= $pc['monitor'] ?>">
  </div>

  <div class="mb-2">
    <label>Modelo Monitor</label>
    <input type="text" name="modelo_monitor" class="form-control" value="<?= $pc['modelo_monitor'] ?>">
  </div>

  <div class="mb-2">
    <label>Ponto de Rede</label>
    <input type="text" name="ponto_rede" class="form-control" value="<?= $pc['ponto_rede'] ?>">
  </div>

  <div class="mb-2">
    <label>Imagem</label>
    <input type="text" name="imagem" class="form-control" value="<?= $pc['imagem'] ?>">
  </div>

  <button type="submit" class="btn btn-success mt-2">Salvar</button>
  <a href="../mapaADM.php" class="btn btn-secondary mt-2">Cancelar</a>

</form>

</body>
</html>