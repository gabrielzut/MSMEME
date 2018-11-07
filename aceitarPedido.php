<?php require "conn.php";
    header('Content-Type: text/html; charset=utf-8');
    $emailPedido = $_POST["emailPedido"];
    $envio = $_POST["envio"];

    session_start();
    $conexao = conectar();

    if($envio == 1){
        $sql = "UPDATE Amizades SET pedido = 0 WHERE emailUsuario1 = '" . $emailPedido . "' AND emailUsuario2 = '" . $_SESSION['email'] . "';";
    }else{
        $sql = "DELETE FROM Amizades WHERE emailUsuario1 = '" . $emailPedido . "' AND emailUsuario2 = '" . $_SESSION['email'] . "';";
    }
    $resultado = executar_sql($conexao, $sql);
    desconectar($conexao);
    header('Location:pedidos.php');
?>