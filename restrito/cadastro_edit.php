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

<?php
    include "../conexao.php";
    $codigo =  higenizarTexto($conn, $_GET['codigo'] ?? '');
    $sql = "SELECT * FROM pessoas WHERE codigo = $codigo";
    $dados = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Edição de Cadastro</h1>
                <form action="edit_script.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome" value=<?php echo $linha['nome']?>>
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" name="endereco" placeholder="Endereço" value=<?php echo $linha['endereco']?>>
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" placeholder="Telefone" value=<?php echo $linha['telefone']?>>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value=<?php echo $linha['email']?>>
                    </div>
                    <div class="mb-3">
                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" value=<?php echo $linha['data_nascimento']?>>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="codigo" value="<?php echo $codigo?>">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
                <a href="pesquisar.php" class="btn btn-info">Voltar para o inicio</a>
            </div>
        </div>
    </div>
</body>

</html>