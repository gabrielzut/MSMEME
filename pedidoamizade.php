<?php require "conn.php";
header('Content-Type: text/html; charset=utf-8');
session_start();

if(!(isset($_SESSION['email']) && isset($_SESSION['password']))){
    header('location:index.php?msg=erro');
}

$emailpedido = $_POST["emailpedido"];
$conexao = conectar();
$sql = "SELECT * FROM pedidoamizade WHERE (emailenvio='" . $_SESSION['email'] . "' AND emailrecebimento='" . $emailpedido . "') OR (emailenvio='" . $emailpedido . "' AND emailrecebimento='" . $_SESSION['email'] . "');";
$resultado = executar_sql($conexao, $sql);
$arrayResultado = lerResultado($resultado);

$sql = "INSERT INTO Usuario (email,username,senha,nickname,status) VALUES ('" . $email . "','" . $username . "','" . $password . "','" . $username . "',0);";
$resultado = executar_sql($conexao, $sql);

header('Location:index.php?msg=sucesso');
?>