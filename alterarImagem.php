<?php
    require "conn.php";
    header('Content-Type: text/html; charset=utf-8');
    $imagem = $_FILES['imagem'];

    if($imagem['type'] == "image/jpg" || $imagem['type'] == "image/jpeg" || $imagem['type'] == "image/png" || $imagem['type'] == "image/gif" || $imagem['type'] == "image/bmp"){
        $nomeTemp = $imagem['tmp_name'];
        $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);

        session_start();
        $conexao = conectar();

        $nomeImagem = $_SESSION['email'] . "." . $extensao;

        $sql = "UPDATE Usuario SET imagem = '" . $nomeImagem . "' WHERE email = '" . $_SESSION['email'] . "';";
        $resultado = executar_sql($conexao, $sql);

        move_uploaded_file($nomeTemp, './img/' . $nomeImagem);

        $_SESSION['imagem'] = $nomeImagem;

        header('Location:perfil.php');
    } else {
        header('Location:perfil.php?msg=erroimagem');
    }
?>