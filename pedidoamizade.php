<?php require "conn.php";
header('Content-Type: text/html; charset=utf-8');
session_start();

if(!(isset($_SESSION['email']) && isset($_SESSION['password']))){
    header('location:index.php?msg=erro');
}

$emailpedido = $_POST["emailpedido"];
$conexao = conectar();
$sql = "SELECT * FROM amizades WHERE (emailUsuario1='" . $_SESSION['email'] . "' AND emailUsuario2='" . $emailpedido . "') OR (emailUsuario1='" . $emailpedido . "' AND emailUsuario2='" . $_SESSION['email'] . "');";
$resultado = executar_sql($conexao, $sql);
$arrayResultado = lerResultado($resultado);

if(count($arrayResultado) == 0){
    $sql = "INSERT INTO amizades (emailUsuario1,emailUsuario2,pedido) VALUES ('" . $_SESSION['email'] . "','" . $emailpedido . "',1);";
    $resultado = executar_sql($conexao, $sql);
    header('Location:contatos.php?msg=envio');
}else{
    header('Location:contatos.php?msg=erro');
}
?>