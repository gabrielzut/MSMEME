<?php require "conn.php";
    header('Content-Type: text/html; charset=utf-8');
    session_start();

    $conexao = conectar();
    $sql = "UPDATE Usuario SET status = 0 WHERE email = '" . $_SESSION['email'] . "';";
    $resultado = executar_sql($conexao, $sql);

    session_destroy();
    header('location:../index.php');
?>