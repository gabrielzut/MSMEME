<?php require "conn.php";
header('Content-Type: text/html; charset=utf-8');
$nickname = $_POST["nickname"];
$frase = $_POST["frase"];

if($nickname == ""){
    $nickname = "N̡̲͔̳a̻m̬e͙l̠͔̥ͅe̷̹͍̯s̖͇͖̥͕͈͇s̡̝̣";
}

session_start();

$conexao = conectar();
$sql = "UPDATE Usuario SET nickname = '" . $nickname . "', frase = '" . $frase . "' WHERE email = '" . $_SESSION['email'] . "';";
$resultado = executar_sql($conexao, $sql);
desconectar($conexao);

$_SESSION['frase'] = $frase;
$_SESSION['nickname'] = $nickname;

header('Location:perfil.php?msg=sucessousuario');
?>