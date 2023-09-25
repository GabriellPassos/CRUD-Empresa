<?php 
  include "../validacao.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    $pesquisa = $_POST['busca'] ?? '';
    include "../conexao.php";

    $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";
    $dados = mysqli_query($conn, $sql);
    ?>

    <div class="container">
        <h1>Pesquisar</h1>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <form class="d-flex" role="search" action="pesquisar.php" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Nome" name="busca" aria-label="Search" autofocus>
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Data de Nascimento</th>

                </tr>
            </thead>
            <tbody>
                <?php
                while ($linha = mysqli_fetch_assoc($dados)) {
                    $codigo =  higenizarTexto($conn, $linha['codigo']);
                    $nome =  higenizarTexto($conn, $linha['nome']);
                    $endereco =  higenizarTexto($conn, $linha['endereco']);
                    $telefone =  higenizarTexto($conn, $linha['telefone']);
                    $email =  higenizarTexto($conn, $linha['email']);
                    $data_nascimento =  higenizarTexto($conn, formatarData($linha['data_nascimento']));
                    $foto = $linha['foto'];
                    echo "<tr>
                            <th ><img class='exibicao_foto' src='img/$foto'></th>
                            <th scope='row'>$nome</th>
                            <td>$endereco </td>
                            <td>$telefone</td>
                            <td>$email </td>
                            <td>$data_nascimento</td>
                            <td>
                                <a href='cadastro_edit.php?codigo=$codigo' class='btn btn-primary'>Editar</a>
                                <a class='btn btn-danger' 
                                data-toggle='modal' 
                                data-target='#modal_confirma' 
                                onClick=" . '"' . "pegar_dados('$nome', $codigo)" . '"' . ">Excluir</a>
                            </td>
                        </tr>";
                }
                
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-info">Voltar para o inicio</a>
    </div>
    <div class="modal fade" id="modal_confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Exclusão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="excluir_script.php">
                    <input type="hidden" id="codigo-pessoa" name="codigo" value="">

            
                    <div class="modal-body">

                        <p>Deseja realmente excluir?</p>
                        <b id="nome-pessoa" >"Pessoa"</b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
                        <input type="submit" class="btn btn-secondary" value="Excluir">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    function pegar_dados(nome, codigo){
        document.getElementById("nome-pessoa").innerHTML = nome;
        document.getElementById("codigo-pessoa").value = codigo;
        
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>