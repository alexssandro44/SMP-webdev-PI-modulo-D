<?php

$dsn = ("sqlite:../database.db");

$pdo = new PDO($dsn);

// pegar ID
$id = $_GET['id'];

// buscar dados do PC
$sql = "SELECT * FROM salas WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$sala = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Editar Sala</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<!------------ FORMULARIO DE ATUALIZAÇÃO --------------->

<body class="container mt-5">

<h3>Editar Sala <?= $sala['id'] ?></h3>

<form action="salvar_edicao_sala.php" method="POST">


<input type="hidden" name="id" value="<?= $sala['id'] ?>">
  <div class="mb-2">
    <label>Número</label>
    <input type="text" name="nome" class="form-control" value="<?= $sala['nome'] ?>">
  </div>

  <label>Bloco</label>
  <div class="mb-2">
    
 <select name="bloco">
  <option value="1" <?= $sala['bloco'] == 1 ? 'selected' : '' ?>>Bloco A</option>
  <option value="2" <?= $sala['bloco'] == 2 ? 'selected' : '' ?>>Bloco B</option>
  <option value="3" <?= $sala['bloco'] == 3 ? 'selected' : '' ?>>Bloco C</option>
</select>

  
   </div>

  <button type="submit" class="btn btn-success mt-2">Salvar</button>
  <a href="../Bloco.php" class="btn btn-secondary mt-2">Cancelar</a>

</form>

</body>
</html>