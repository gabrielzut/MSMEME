<?php 
    require "conn.php";

    session_start();
    header('Content-Type: text/html; charset=utf-8');

    $emailEnvio = $_POST["emailConversa"];

    $conexao = conectar();
    $sql = "SELECT nickname, status, imagem, frase FROM Usuario WHERE email='" . $emailEnvio . "';";
    $resultado = executar_sql($conexao, $sql);
    $arrayResultado = lerResultado($resultado);
    
    $retorno = "
        <img src='./img/" . $arrayResultado[0]['imagem'] . "' class='img-fluid rounded border ";
        if($arrayResultado[0]['status'] == 0){
            $retorno .= "border-secondary";
        }else if($arrayResultado[0]['status'] == 1){
            $retorno .= "border-success";
        }
        $retorno .= " status rounded' width='100px' height='100px'>
        <h4 class='mt-2'>" . $arrayResultado[0]['nickname'] . "</h4>
        <h6>" . $arrayResultado[0]['frase'] . "</h6>
    ";

    echo $retorno;
?>