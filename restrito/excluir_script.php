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
        <div class="row">
            <div class="col">
                <?php
                include "../conexao.php";
                $codigo =  higenizarTexto($conn, $_POST['codigo']);
                $sql = "DELETE FROM `pessoas` WHERE codigo = $codigo";
                if (mysqli_query($conn, $sql)) {
                    echo mensagem("Pessoa excluida com sucesso", "success");
                } else {
                    echo mensagem("Falha no excluir pessoa.", "danger");
                }
                ?>
                <a class="btn btn-primary" href="pesquisar.php">Voltar</a>
            </div>
        </div>
    </div>
</body>

</html>