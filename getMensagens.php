<?php require "conn.php";

header('Content-Type: text/html; charset=utf-8');
session_start();

$emailEnvio = $_POST["emailConversa"];

function getMessage(){

        $conexao = conectar();
        $sql = "SELECT M.conteudoMensagem, DATE_FORMAT(M.dataEnvio, '%e/%M/%Y %H:%i:%s') as dataEnvio, UP.email AS emailUP, UP.nickname as nicknameUP, US.email as emailUS, US.nickname as nicknameUS FROM (Mensagem M JOIN Usuario UP ON M.emailEnvio = UP.email) JOIN Usuario US ON M.emailRecebimento = US.email WHERE (M.emailEnvio='" . $_SESSION['email'] . "' AND M.emailRecebimento='" . $emailEnvio . "') OR (M.emailRecebimento='" . $_SESSION['email'] . "' AND M.emailEnvio='" . $emailEnvio . "');";
        $resultado = executar_sql($conexao, $sql);
        $arrayResultado = lerResultado($resultado);

        $retorno = "";
        $conversa = [];

        for($i=0;$i<count($arrayResultado);$i++){
            if($arrayResultado[$i]['emailUP'] == $_SESSION['email']){
                $conversa[$i]['email'] = $arrayResultado[$i]['emailUS'];
                $conversa[$i]['nickname'] = $arrayResultado[$i]['nicknameUS'];
            }else{
                $conversa[$i]['email'] = $arrayResultado[$i]['emailUP'];
                $conversa[$i]['nickname'] = $arrayResultado[$i]['nicknameUP'];
            }
            $retorno .= "
                <form action='conversa.php' method='post' target='_blank'>
                    <div class='row contatos' onclick='this.parentNode.submit()'>
                        <input type='hidden' id='emailConversa' name='emailConversa' value='" . $amigos[$i]['email'] . "'>
                        <div class='col-md-1 col-xs-12'>
                            <p><img src='./img/" . $amigos[$i]['imagem'] . "' class='rounded border ";
                            if($amigos[$i]['status'] == 0){
                                $retorno .= "border-secondary";
                            }else if($amigos[$i]['status'] == 1){
                                $retorno .= "border-success";
                            }
                            $retorno .= " status rounded mt-3' width='40px' height='40px'></p>
                        </div>
                        <div class='col-md-11 col-xs-12'>
                            <h4 class='mt-2'>" . $amigos[$i]['nickname'] . "</h4>
                            <h6>" . $amigos[$i]['frase'] . "</h6>
                        </div>
                        <div class='col-12'>
                            <hr>
                        </div>
                    </div>
                </form>
            ";
        }

        return $arrayResultado;
        desconectar($conexao);
}
?>