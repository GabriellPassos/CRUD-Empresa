<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
    }else{
        session_destroy();
        header("location: ../login.php?msg='Acesso negado'");
    }
?>