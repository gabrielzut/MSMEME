<?php require "conn.php";

    header('Content-Type: text/html; charset=utf-8');
    session_start();

    $emailEnvio = $_POST["emailConversa"];

    $conexao = conectar();
    $sql = "SELECT M.conteudoMensagem, DATE_FORMAT(M.dataEnvio, '%e/%m/%Y %H:%i:%s') as dataEnvio, M.tipoMensagem as tipoMensagem, UP.email AS emailUP, UP.nickname as nicknameUP, US.nickname as nicknameUS FROM (Mensagem M JOIN Usuario UP ON M.emailEnvio = UP.email) JOIN Usuario US ON M.emailRecebimento = US.email WHERE (M.emailEnvio='" . $_SESSION['email'] . "' AND M.emailRecebimento='" . $emailEnvio . "') OR (M.emailRecebimento='" . $_SESSION['email'] . "' AND M.emailEnvio='" . $emailEnvio . "');";
    $resultado = executar_sql($conexao, $sql);
    $arrayResultado = lerResultado($resultado);

    $retorno = "";
    $conversa = [];

    for($i=0;$i<count($arrayResultado);$i++){
        $conversa[$i]['conteudoMensagem'] = $arrayResultado[$i]['conteudoMensagem'];
        $conversa[$i]['dataenvio'] = $arrayResultado[$i]['dataEnvio'];
        $conversa[$i]['tipoMensagem'] = $arrayResultado[$i]['tipoMensagem'];

        if($arrayResultado[$i]['emailUP'] == $_SESSION['email']){
            $conversa[$i]['nickname'] = $arrayResultado[$i]['nicknameUS'];
            $retorno .= "
            <div class='row mb-3'>
                <div class='col'>
                    <p>[" . $conversa[$i]['dataenvio'] . "] <b>Você</b> diz:</p>
                    <p class='ml-3'>";
                    if($conversa[$i]['tipoMensagem'] == 0){
                        $retorno .= $conversa[$i]['conteudoMensagem'] . "</p>";
                    }else{
                        $retorno .= "<img src='./imgConversa/" . $conversa[$i]['conteudoMensagem'] . "' width='200px'></p>";
                    }
                $retorno .= "</div>
            </div>";
        }else{
            $conversa[$i]['nickname'] = $arrayResultado[$i]['nicknameUP'];
            $retorno .= "
            <div class='row mb-3'>
                <div class='col'>
                    <p>[" . $conversa[$i]['dataenvio'] . "] <b>" . $conversa[$i]['nickname'] . "</b> diz:</p>
                    <p class='ml-3'>";
                    if($conversa[$i]['tipoMensagem'] == 0){
                        $retorno .= $conversa[$i]['conteudoMensagem'] . "</p>";
                    }else{
                        $retorno .= "<img src='./imgConversa/" . $conversa[$i]['conteudoMensagem'] . "' width='200px' '></p>";
                    }
                $retorno.= "</div>
            </div>";
        }
    }

    echo $retorno;
?>