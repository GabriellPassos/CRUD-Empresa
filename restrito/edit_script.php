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
                $nome =  higenizarTexto($conn, $_POST['nome']);
                $endereco =  higenizarTexto($conn, $_POST['endereco']);
                $telefone =  higenizarTexto($conn, $_POST['telefone']);
                $email =  higenizarTexto($conn, $_POST['email']);
                $data_nascimento = $_POST['data_nascimento'];
                if(isset($_FILES['foto'])){
                    $foto = $_FILES['foto'];
                    $nome_foto = armazenar_foto($foto);
                    $sql = "UPDATE `pessoas`  SET
                    `nome` = '$nome', `endereco` = '$endereco', `telefone` = '$telefone', `email` = '$email', `data_nascimento`= '$data_nascimento', `foto`= '$nome_foto' WHERE codigo = '$codigo'";
                }else{
                    $sql = "UPDATE `pessoas`  SET
                    `nome` = '$nome', `endereco` = '$endereco', `telefone` = '$telefone', `email` = '$email', `data_nascimento`= '$data_nascimento' WHERE codigo = '$codigo'";
                }

                if (mysqli_query($conn, $sql)) {
                    echo mensagem("Pessoa editada com sucesso", "success");
                } else {
                    echo mensagem("Falha na Edição", "danger");
                }
                ?>
                <a class="btn btn-primary" href="pesquisar.php">Voltar</a>
            </div>
        </div>
    </div>
</body>

</html>