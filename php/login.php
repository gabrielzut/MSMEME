<?php require "conn.php";
    header('Content-Type: text/html; charset=utf-8');
    session_start();

    $email = $_POST["email"];
    $password = $_POST["password"];

    $conexao = conectar();
    $sql = "SELECT * FROM Usuario WHERE email='" . $email . "' AND senha='" . $password . "';";
    $resultado = executar_sql($conexao, $sql);
    $arrayResultado = lerResultado($resultado);

    if(sizeof($arrayResultado) > 0){
        $sql2 = "UPDATE Usuario SET status = 1 WHERE email = '" . $arrayResultado[0]['email'] . "';";
        $resultado = executar_sql($conexao, $sql2);

        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['username'] = $arrayResultado[0]['username'];
        $_SESSION['nickname'] = $arrayResultado[0]['nickname'];
        $_SESSION['frase'] = $arrayResultado[0]['frase'];
        $_SESSION['status'] = $arrayResultado[0]['status'];
        $_SESSION['imagem'] = $arrayResultado[0]['imagem'];

        desconectar($conexao);
        header('location:../contatos.php');
    }else{
        session_destroy();
        desconectar($conexao);
        header('location:../index.php?msg=erro');
    }
?>