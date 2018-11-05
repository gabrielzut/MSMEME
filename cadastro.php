<?php require "conn.php";
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$conexao = conectar();
$sql = "INSERT INTO Usuario (email,username,senha,nickname,status) VALUES ('" . $email . "','" . $username . "','" . $password . "','" . $username . "',0);";
$resultado = executar_sql($conexao, $sql);

header('Location:index.php?msg=sucesso');
?>