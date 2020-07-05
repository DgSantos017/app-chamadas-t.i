<?php require_once "seguranca.php" ?>
<?php 
    // chamados
    $chamados = array();

    //abrir arquivo
    $arquivo = fopen('arquivo.txt', 'r');

    // enquanto houver reistros a serem recuperados
    while(!feof($arquivo)){  // feof - testa pelo fim de um arquivo
      $registro = fgets($arquivo);
      $chamados[] = $registro; 
    }
    // fechar o arquivo aberto!
    fclose($arquivo);
 ?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="encerrar.php"> SAIR </a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <?php foreach($chamados as $chamado) {  ?>

              <?php 

                $chamado_dados = explode('#', $chamado);
                if($_SESSION['perfil'] == 2){// só vai exibir os chamados de quem o proprio chamou
                  if($_SESSION['id'] != $chamado_dados[0]){
                    continue;
                  }
                }

                if(count($chamado_dados) < 3){
                  continue;
                }
               ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamado_dados[1]; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2]; ?></h6>
                  <p class="card-text"><?= $chamado_dados[3]; ?></p>

                </div>
              </div>
            <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>