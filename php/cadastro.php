<?php require "conn.php";
header('Content-Type: text/html; charset=utf-8');
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmar = $_POST["confirmar"];

if(($username != "")&&($email != "")&&($password != "")&&($confirmar != "")){
    if($confirmar == $password){
        $conexao = conectar();
        $sqlConfirma = "SELECT * FROM Usuario WHERE (email='" . $email . "') OR (username='" . $username . "');";
        $resultado = executar_sql($conexao, $sqlConfirma);
        $arrayResultado = lerResultado($resultado);

        if(count($arrayResultado) > 0){
            header('Location:../index.php?msg=errocadastro');
            exit;
        }

        $sql = "INSERT INTO Usuario (email,username,senha,nickname,status) VALUES ('" . $email . "','" . $username . "','" . $password . "','" . $username . "',0);";
        $resultado = executar_sql($conexao, $sql);
        desconectar($conexao);
        
        header('Location:../index.php?msg=sucesso');
    }else{
        header('Location:../index.php?msg=errocadastro');
    }
}else{
    header('Location:../index.php?msg=errocadastro');
}
?>