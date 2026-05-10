<!--- conexao com o banco  ---->
<?php
$dsn = "sqlite:database.db";
$pdo = new PDO($dsn);

$sala_id = $_GET['sala_id'];

$sql = "SELECT * FROM pcs WHERE sala_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$sala_id]);
$pcs = $stmt->fetchAll();


// mostrar o nome da sala
$sql = "SELECT * FROM salas WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$sala_id]);
$sala = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Patrimônios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


     <!-- cria a cor de fundo gradiente da pagina principal ---->
    <style>
        .cabecalho-gradient{
            background: linear-gradient(90deg, #5bb0ff, #36f2f8);
        }
    </style>

  </head>

<body>

<!------------------------------------------- cabeçalho ----------------------------------------------------------------------->

<header class="border-bottom lh-1 py-3 p-3 mb-2 cabecalho-gradient text-white"> 
    <div class="col-12 text-center"> 
        <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">
            Mapa dos patrimônios - sala <?= $sala['nome'] ?>
        </a>
    </div>
</header>
<!------------------------------------------------------------------------------------------------------------------>

<!-------------------------------------------- container principal ---------------------------------------------------------->
<div class="container-fluid mt-5 px-3 px-md-5">

  <div class="row g-4">

    <!------------------------------------ COLUNA DOS PCS ------------------------------------------------------------>
    <div class="col-12 col-lg-5">

      <div class="row g-3">

        <!--  LOOP PARA CRIAR OS PCS  ----->
        <?php foreach($pcs as $pc): ?>
          
          <div class="col-6 col-md-4 col-lg-3">
            <div class="card w-100">
              <div class="card-body text-center">
                <h6>PC <?= $pc['numero'] ?></h6>
                <img src="ícone-pc-mapa..png" style="max-width: 60px;">
              </div>
            </div>
          </div>

        <?php endforeach; ?>

      </div>

    </div>

    <!------------------------------------ COLUNA DA TABELA ---------------------------------------------------------->
    <div class="col-12 col-lg-7">

      <div class="w-100">
         
      <!------------------------------- CABEÇALHO--------------------------------------------------->
      <div class="mt-4">

        <!-- TABELA RESPONSIVA COM SCROLL -->
        <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">    
  
        <table class="table table-bordered text-center table-sm">
     
        <thead class="text-center">
          <tr>
            <th>PC</th>
            <th>Modelo</th>
            <th>Patrimônio</th>
            <th>Monitor</th>
            <th>Modelo monitor</th>
            <th>P.rede</th>
            <th>Imagem</th>
            <th>Ações</th>
          </tr>
        </thead>

        <tbody class="table-group-divider text-center">

        <?php foreach($pcs as $pc): ?>

        <tr>

          <!-- Número do PC -->
          <th>PC <?= $pc['numero'] ?></th>

          <!-- Dados -->
          <td><?= $pc['modelo'] ?></td>
          <td><?= $pc['patrimonio'] ?></td>
          <td><?= $pc['monitor'] ?></td>
          <td><?= $pc['modelo_monitor'] ?></td>
          <td><?= $pc['ponto_rede'] ?></td>
          <td><?= $pc['imagem'] ?></td>

          <!-------------- AÇÕES  DA TABELA ------------------>
          <td style="white-space: nowrap;">
            <div class="d-flex justify-content-center gap-2">

              <!-- BOTÃO EDITAR -->
               <a href="CRUD-mapa-patrimonio/form-editar.php?id=<?= $pc['id'] ?>&sala_id=<?= $sala_id ?>"
                 class="btn btn-outline-primary d-flex align-items-center gap-1">
                <img src="ícone-editar.png" style="width:16px">
                Editar
              </a>

              <!-- BOTÃO DELETAR -->
              <a href="CRUD-mapa-patrimonio/deletar_pc.php?id=<?= $pc['id'] ?>&sala_id=<?= $sala_id ?>"
                 class="btn btn-outline-primary d-flex align-items-center gap-1"
                 onclick="return confirm('Tem certeza de que deseja deletar este PC?')">
                <img src="ícone-deletar.png" style="width:16px">
                Deletar
              </a>
               
            </div>
          </td>

        </tr>

        <?php endforeach; ?>

        </tbody>
        </table>

        </div>

        <!---------------- BOTÕES ------------------>
        <div class="d-flex flex-wrap gap-2 mt-3 justify-content-center justify-content-md-start">

          <!---------------- BOTÃO MODAL ------------------>
          <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAdicionar">
            <img src="ícone-adicionar.png">
            Adicionar
          </button>

         <!--- BOTAO VOLTAR -----> 
        <button class="btn btn-outline-primary" onclick="window.location.href='Bloco.php'">
           <img src="ícone-casa.png">
          Voltar
        </button>

        </div>

      </div>

    </div>

  </div>

</div>

<!-------------------------------- MODAL ------------------------------------------------------->
<div class="modal fade" id="modalAdicionar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Adicionar PC</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form action="CRUD-mapa-patrimonio/adicionar_pc.php" method="POST">

          <!--- envia o ID da sala junto com o formulário ----->
           <input type="hidden" name="sala_id" value="<?= $sala_id ?>">
          <div class="mb-2">
            <label>Número do PC</label>
            <input type="number" name="numero" class="form-control">
          </div>

          <div class="mb-2">
            <label>Modelo</label>
            <input type="text" name="modelo" class="form-control">
          </div>

          <div class="mb-2">
            <label>Patrimônio</label>
            <input type="text" name="patrimonio" class="form-control">
          </div>

          <div class="mb-2">
            <label>Modelo Monitor</label>
            <input type="text" name="monitor" class="form-control">
          </div>

          <div class="mb-2">
            <label>Patrimônio Monitor</label>
            <input type="text" name="modelo_monitor" class="form-control">
          </div>

          <div class="mb-2">
            <label>Ponto de Rede</label>
            <input type="text" name="ponto_rede" class="form-control">
          </div>

          <div class="mb-2">
            <label>Imagem</label>
            <input type="text" name="imagem" class="form-control">
          </div>

          <button type="submit" class="btn btn-success mt-2"
          onclick="this.disabled=true; this.form.submit();">
            Salvar
          </button>

        </form>
      </div>

    </div>
  </div>
</div>

</body>
</html>
