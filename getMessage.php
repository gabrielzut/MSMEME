<?php require "conn.php";

#$emailEnvio = $_POST["email"];
#$emailRecebimento = $_POST["malone"];

function getMessage(){

        $conexao = conectar();
        $sql = "SELECT FROM mensagem (emailEnvio, emailRecebimento, conteudoMensagem , dataEnvio) VALUES ('" . $emailEnvio . "','" . $emailRecebimento . "','" . $conteudo . "','" . $dataEnvio . "') WHERE emailRecebimento = '" . $_SESSION['email'] . "';";
        $resultado = executar_sql($conexao, $sql);
        $arrayResultado = lerResultado($resultado);

        return $arrayResultado;
        desconectar($conexao);
}
?>