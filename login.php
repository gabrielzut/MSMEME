<?php require "conn.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

$conexao = conectar();
$sql = "SELECT * FROM Usuario WHERE email='" . $email . "' AND senha='" . $password . "';";
$resultado = executar_sql($conexao, $sql);
$arrayResultado = lerResultado($resultado);

if(sizeof($arrayResultado) > 0){
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['username'] = $arrayResultado[0]['username'];
    $_SESSION['nickname'] = $arrayResultado[0]['nickname'];
    $_SESSION['frase'] = $arrayResultado[0]['frase'];
    $_SESSION['status'] = $arrayResultado[0]['status'];
    header('location:contatos.php');
}else{
    session_destroy();
    header('location:index.php?msg=erro');
}
?>