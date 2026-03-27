<!--- conexao com o banco  ---->
<?php
$dsn = "sqlite:database.db";
$pdo = new PDO($dsn);

$sql = "SELECT * FROM salas";
$salas = $pdo->query($sql)->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Salas</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<!-----------------------------------------------  cabeçalho  ------------------------------------------------->

<header class="border-bottom lh-1 py-3 p-3 mb-2 bg-primary-subtle text-primary-emphasis">
  <div class="row justify-content-center">
    <div class="col-12 text-center">
      <a class="blog-header-logo text-body-emphasis text-decoration-none">
        Salas - Bloco A
      </a>
    </div>
  </div>
</header>

<!------------------------------------------------ BOTÃO ADICIONAR ------------------------------------------------------------->
<div class="container mb-3 text-end">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdicionar">
    + Adicionar Sala
  </button>
</div>

<!---------------------------------------------- MODAL ADICIONAR ------------------------------------------------->

<div class="modal fade" id="modalAdicionar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Adicionar Sala</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form action="CRUD-salas/adicionar_sala.php" method="POST">

          <div class="mb-2">
            <label>Número</label>
            <input type="text" name="nome" class="form-control">
          </div>

          <div class="mb-2">
            <label>Bloco</label>
            <select name="bloco" class="form-control">
              <option value="1">Bloco A</option>
              <option value="2">Bloco B</option>
              <option value="3">Bloco C</option>
            </select>
          </div>

          <button type="submit" class="btn btn-success mt-2">
            Salvar
          </button>

        </form>
      </div>

    </div>
  </div>
</div>

<!---------------------------------------------- LISTA DE SALAS ------------------------------------------------->

<div class="container">
  <div class="row">

  <?php foreach($salas as $sala): ?>

    <div class="col-md-3 mb-3">
      <div class="card text-center">
        <img src="ícone-pc.png" class="card-img-top mx-auto d-block img-fluid" style="max-width:150px;">

        <div class="card-body">
          <h5 class="card-title">Sala <?= $sala['nome'] ?></h5>

          <a href="CRUD-salas/form_editar_sala.php?id=<?= $sala['id'] ?>" 
         class="btn btn-outline-primary btn-sm">
         <img src="ícone-editar.png" style="width:16px">
         Editar
         </a>
          <!-- BOTÃO DELETAR -->
          
          <a href="CRUD-salas/deletar_sala.php?id=<?= $sala['id'] ?>" 
             class="btn btn-outline-primary btn-sm">
             <img src="ícone-deletar.png" style="width:16px"
             onclick="return confirm('Tem certeza que deseja deletar esta sala?')">
            Deletar
          </a>
        </div>

        <a href="mapaADM.php?sala_id=<?= $sala['id'] ?>" 
        class="btn btn-primary btn-sm">
        Entrar
        </a>

      </div>
    </div>
 
    


  <?php endforeach; ?>

  </div>
</div>

<!------------------------------------------------------------------------------------------------------------->

<footer>
  <div class="footer text-center mt-4">
    <a href="pagina_principal.php">
      <button class="btn btn-outline-primary">voltar</button>
    </a>
  </div>
</footer>

</body>
</html>
