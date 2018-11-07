<?php 
    require "conn.php";
    function getPedidos(){
        header('Content-Type: text/html; charset=utf-8');

        $conexao = conectar();
        $sql = "SELECT * FROM Amizades A JOIN Usuario U ON A.emailUsuario1 = U.email WHERE A.emailUsuario2='" . $_SESSION['email'] . "' AND A.pedido = 1;";
        $resultado = executar_sql($conexao, $sql);
        $arrayResultado = lerResultado($resultado);

        return $arrayResultado;
    }
?>