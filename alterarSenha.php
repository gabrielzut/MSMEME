<?php require "conn.php";
header('Content-Type: text/html; charset=utf-8');
$antiga = $_POST["antiga"];
$nova = $_POST["nova"];
$confirmar = $_POST["confirmar"];

session_start();

if(($_SESSION['password'] == $antiga) && ($nova == $confirmar)){
    $conexao = conectar();
    $sql = "UPDATE Usuario SET senha = '" . $nova . "' WHERE email = '" . $_SESSION['email'] . "';";
    $resultado = executar_sql($conexao, $sql);
    desconectar($conexao);

    $_SESSION['password'] = $nova;
    header('Location:perfil.php?msg=sucessosenha');

}else{
    header('Location:perfil.php?msg=errosenha');
}
?>