<!--- conexao com o banco  ---->
<?php

$dsn = "sqlite:database.db";
$pdo = new PDO($dsn);

// Identifica o bloco selecionado pela URL
$bloco = isset($_GET['bloco']) ? (int) $_GET['bloco'] : 1;

// Busca somente as salas do bloco selecionado
$sql = "SELECT * FROM salas WHERE bloco = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$bloco]);
$salas = $stmt->fetchAll();

// Define a letra do bloco para o cabeçalho
$letras = [
    1 => 'A',
    2 => 'B',
    3 => 'C',
    4 => 'D'
];

$letra_bloco = $letras[$bloco] ?? 'A';

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


   <!-- cria a cor de fundo gradiente da pagina principal ---->
    <style>
        .cabecalho-gradient{
            background: linear-gradient(90deg, #5bb0ff, #36f2f8);
        }
    </style>
  
</head>

<body>

<!-----------------------------------------------  cabeçalho  ------------------------------------------------->

<header class="border-bottom lh-1 py-3 p-3 mb-2 cabecalho-gradient text-white"> 
  <div class="row justify-content-center">
    <div class="col-12 text-center">
      <a class="blog-header-logo text-body-emphasis text-decoration-none">
        Salas - Bloco <?= $letra_bloco ?>
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

        <!-- cadastra altomaticamente a sala no bloco atual ---->
         
        <input type="hidden" name="bloco" value="<?= $bloco ?>">
        
        
        <div class="mb-2">
            <label>Número</label>
            <input type="text" name="nome" class="form-control">
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

          <a href="CRUD-salas/form_editar_sala.php?id=<?= $sala['id'] ?>&bloco=<?= $bloco ?>" 
         class="btn btn-outline-primary btn-sm">
         <img src="ícone-editar.png" style="width:16px">
         Editar
         </a>
          
         <!-- BOTÃO DELETAR -->
          
        <a href="CRUD-salas/deletar_sala.php?id=<?= $sala['id'] ?>&bloco=<?= $bloco ?>"
             class="btn btn-outline-primary btn-sm"
             onclick="return confirm('Tem certeza de que deseja deletar esta sala?')">
             <img src="ícone-deletar.png" style="width:16px">
            Deletar
          </a>
        </div>
                                                         <!---- ajuste aqui----->
        <a href="pagina_mapa.php?sala_id=<?= $sala['id'] ?>&bloco=<?= $bloco ?>"
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


<!----  
git config --global user.email alex9030@gmail.com
git config --global user.name alex9030

--->
