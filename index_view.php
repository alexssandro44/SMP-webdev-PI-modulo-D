<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    
    <!-----------------------------------------------   cabeçalho  ------------------------------------------------->
    <header class="border-bottom lh-1 py-3 p-3 mb-2 bg-primary-subtle text-primary-emphasis"> 
        <div class="row justify-content-center"> 
            <div class="col-12 text-center"> 
                <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">
                  <?php echo $titulo_principal ?>
                </a>
            </div>
        </div> 
    </header>
    <!---------------------------------------------------------------------------------------------------------------------->
    
    <!-- nav serve para agrupar os principais links -->
    <!-------------------------------------------------  MENU DE NAVEGAÇÃO  ------------------------------------------------->    
    
    <nav class="nav nav-underline justify-content-center "> 
    <a class="nav-item nav-link link-body-emphasis mx-3 " href="Bloco.php"> <?php echo $bloco_a ?></a> 
    <a class="nav-item nav-link link-body-emphasis mx-3" href="Bloco-B.php"><?php echo $bloco_b?></a> 
    <a class="nav-item nav-link link-body-emphasis mx-3" href="Bloco-C.php"><?php echo $bloco_c?></a> 
    <a class="nav-item nav-link link-body-emphasis mx-3" href="Bloco-D.php"><?php echo $bloco_d?></a> 
     
    </nav>
    <!---------------------------------------------------------------------------------------------------------------------->
    

    
    <!------------------------------- card com imagem da tela inicial ---------------------------------------------------------------------------->  
    <div class="card text-center ">
        <div class="card-header ">
         
        </div>
        <div class="logo text-center mt-1 ">
        <img src="logo-sistema.png " alt=""  style="max-width: 150px;" class="img-fluid">
        </div>
        <div class="card-body">
          <h5 class="card-title">SMP</h5>

        <!--- legenda da primeira pagina  ----->
        <p class="card-text"><?php echo $hero_titulo ?></p>
         
        </div>
        
      </div>
    
    <!-------------------------------------------- PATRIMÔNIOS CADASTRADOS  --------------------------------------------------------------------------> 

        <!-- tr cria uma linha -->
        <!-- th cria as células de cabeçalho (títulos das colunas) -->
        <!-- td cria os dados -->
              
    <section class="container my-5">
        <h3 class="mb-4 text-center"> <?php echo $patrimonios ?></h3>
      
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Item</th>
                <th>Local</th>
                <th>Bloco</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>PC</td>
                <td>Sala 1</td>
                <td>Bloco A</td>
                <td><span class="badge bg-success">Ativo</span></td>
              </tr>
              <tr>
                <td>2</td>
                <td>PC</td>
                <td>Sala 3</td>
                 <td>bloco B</td>
                <td><span class="badge bg-warning">Manutenção</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
      
    <!-------------------------------------------- MAPA GERAL DOS BLOCOS  -------------------------------------------------------------------------->

     
      <section class="container my-5">
        <h3 class="text-center mb-4">Mapa geral dos blocos</h3>
      
        <div class="row">    
          <div class="col-md-8">
          <div class="text-center bg-light mx-auto" style="height:300px; max-width:600px;">
            <img src="planta_baixa.jpg" alt="Mapa" style="width:100%; height:100%;"> <!-- ADICIONAR O MAPA -->

            </div>
          </div>
      
          <!---------------------------- LEGENDA   ----------------------------->
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"> <?php echo $legenda ?></h5>
      
                <p>
                  <span class="badge bg-success"> </span> <!-- badge cria um bloco com cor -->
                  <?php echo $legenda_verde ?>
                </p>
      
                <p>
                  <span class="badge bg-warning"> </span>
                  <?php echo $legenda_amarela ?>
                </p>
                
                <p>
                  <span class="badge bg-danger"> </span>
                  <?php  echo $legenda_vermelha ?>
                </p>
      
              </div>
            </div>
          </div>
      
        </div>
      </section>
      
    <!------------------------------- footer  --------------------------------------------------------------------------------------->
  
    <footer >
        <div class="card mt-5">
           
            <div class="card-body mt-3 text-center">
                <div class="footer text-center">
                    <img src="logo-sistema.png" alt=""  style="max-width: 70px;" class="img-fluid">
                </div>
                 <p class="card-title text-center"><?php echo $data_rodape ?></p>

                 <a href="sobre_nos.php">
                  <button class="btn btn-outline-secondary">sobre nós</button>
                 </a>
                           
                </div>

        </div>
     

    </footer>
   
    <!---------------------------------------------------------------------------------------------------------------------->
   


</body>
</html>
