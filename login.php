<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
</head>

<body>

    <div class="container py-5 d-flex flex-column align-items-center">
        <div class="bg-body-tertiary p-2 w-25 d-flex flex-column align-items-center">
        <h2 class="display-10 mb-4 fw-bold">Login</h2>
            <form method="POST" action="login.php">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label ">Usuário:</label>
                    <div class="col-sm-8">
                        <input type="text" name="usuario" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Senha:</label>
                    <div class="col-sm-8">
                        <input type="password" name="senha" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
            <?php
            include "conexao.php";
            if (isset($_POST['senha']) && $_POST['usuario']) {
                $usuario = $_POST['usuario'];
                $senha = $_POST['senha'];
                $sql = "SELECT * FROM `usuarios` WHERE usuario = '$usuario'";
                $resultado = mysqli_query($conn, $sql);

                if ($resultado -> num_rows > 0) {
                    $linhas = mysqli_fetch_assoc($resultado);
                    if(password_verify($senha, $linhas['senha'])){
                        session_destroy();
                        session_start();
                        $_SESSION['usuario'] = $usuario;
                        echo mensagem("Usuário conectado", "success");
                        header("location: restrito");
                    }
                }else{
                    echo mensagem("Dados inválidos", "danger");
                }
            }
            ?>
        </div>
    </div>
</body>

</html>