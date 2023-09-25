<?php 
  include "../validacao.php";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Cadastro Pessoas</h1>
        <p class="col-md-8 fs-4">CRUD de pessoas. Projeto de estudos da linguagem php e framework bootstrap.</p>
        <a href="cadastro.php" class="btn btn-primary btn-lg" type="button">Cadastrar</a>
        <a href="pesquisar.php" class="btn btn-primary btn-lg" type="button">Pesquisar</a>
        <a class="btn btn-secondary btn-lg" href="../logout.php">Sair</a>
      </div>
    </div>
  </div>
</body>

</html>