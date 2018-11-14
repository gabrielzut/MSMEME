<?php 
    require "conn.php";

    session_start();
    header('Content-Type: text/html; charset=utf-8');

    $conexao = conectar();
    $sql = "SELECT COUNT(*) AS num FROM Amizades A JOIN Usuario U ON A.emailUsuario1 = U.email WHERE A.emailUsuario2='" . $_SESSION['email'] . "' AND A.pedido = 1;";
    $resultado = executar_sql($conexao, $sql);
    $arrayResultado = lerResultado($resultado);
    
    $retorno = $arrayResultado[0]['num'];

    echo $retorno;
?>