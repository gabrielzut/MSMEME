<?php require "conn.php";

$emailEnvio = $_POST["email"];
$emailRecebimento = $_POST["malone"];
$conteudo = $_POST["txArea"];
$dataEnvio = date("Y-m-d H:i:s");

$conexao = conectar();
$sql = "INSERT INTO mensagem (emailEnvio, emailRecebimento, conteudoMensagem , dataEnvio) VALUES ('" . $emailEnvio . "','" . $emailRecebimento . "','" . $conteudo . "','" . $dataEnvio . "',0);";
$resultado = executar_sql($conexao, $sql);
desconectar($conexao);

header('Location:index.php?msg=sucesso');
?>