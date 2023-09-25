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
                $nome = higenizarTexto($conn, $_POST['nome']);
                $endereco =  higenizarTexto($conn, $_POST['endereco']);
                $telefone =  higenizarTexto($conn, $_POST['telefone']);
                $email =  higenizarTexto($conn, $_POST['email']);
                $data_nascimento =  higenizarTexto($conn,$_POST['data_nascimento']);
                if(isset($_FILES['foto'])){
                    $foto = $_FILES['foto'];
                    $nome_foto = armazenar_foto($foto);
                }else{
                    $nome_foto = '';
                }
                $sql = "INSERT INTO `pessoas`
                (`nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `foto`)
                VALUES 
                ('$nome','$endereco','$telefone','$email','$data_nascimento','$nome_foto' )";
                if (mysqli_query($conn, $sql)) {
                    echo mensagem("Pessoa cadastrada com sucesso", "success");
                } else {
                    echo mensagem("Falha no cadastro", "danger");
                }
                ?>
                <a class="btn btn-primary" href="pesquisar.php">Voltar</a>
            </div>
        </div>
    </div>
</body>

</html>