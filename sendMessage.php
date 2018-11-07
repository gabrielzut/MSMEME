<?php require "conn.php";
#have no idea
$emailEnvio = $_POST["email"];
$emailRecebimento = $_POST["malone"];
$conteudo = $_POST["robsu"];
$dataEnvio = date("Y-m-d H:i:s");

$conexao = conectar();
$sql = "INSERT INTO mensagem (emailEnvio, emailRecebimento, conteudoMensagem , dataEnvio) VALUES ('" . $emailEnvio . "','" . $emailRecebimento . "','" . $conteudo . "','" . $dataEnvio . "');";
$resultado = executar_sql($conexao, $sql);
desconectar($conexao);

header('Location:index.php?msg=sucesso');
?>