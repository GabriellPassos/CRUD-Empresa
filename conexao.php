<?php
    $server = "localhost";
    $user = "root";
    $pass = "password";
    $bd = "empresa";

    if($conn = mysqli_connect($server, $user, $pass, $bd)){
    }else{
        echo "nao conecatado";
    }
    function mensagem($texto, $tipo){
        echo "<div class='alert alert-$tipo' role='alert'>$texto</div>";
    }
    function formatarData($data){
        $data_info = explode('-', $data);
        return "$data_info[2]/$data_info[1]/$data_info[0]";
    }
    function  armazenar_foto($vetor_foto){
        try {
            $tipoArquivo = explode('/', $vetor_foto['type']);
            $tipo = $tipoArquivo[0];
            $extensao = $tipoArquivo[1];
                if((!$vetor_foto['error'])  &&  $tipo == 'image' ){
                    $novo_nome_foto = date("Ymdhms").".$extensao";
    
                    move_uploaded_file($vetor_foto['tmp_name'], "img/" . $novo_nome_foto);
                    return $novo_nome_foto;
                }else{
                   throw new Exception('Arquivo nulo ou inválido.');
                }
        } catch (Exception $e) {
            //throw $th;
        }

    }
?>