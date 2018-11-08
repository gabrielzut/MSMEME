<?php 
    require "conn.php";

    session_start();
    header('Content-Type: text/html; charset=utf-8');

    $conexao = conectar();
    $sql = "SELECT * FROM Amizades A JOIN Usuario U ON A.emailUsuario1 = U.email WHERE A.emailUsuario2='" . $_SESSION['email'] . "' AND A.pedido = 1;";
    $resultado = executar_sql($conexao, $sql);
    $arrayResultado = lerResultado($resultado);
    
    $retorno = "";
    $numPedidos = count($arrayResultado);

    if($numPedidos > 0){
        for($i=0;$i<$numPedidos;$i++){
            $retorno .= "
                <div class='card w-100 my-2'>
                    <div class='card-body'>
                        <div class='row text-center text-md-left'>
                            <div class='col-12 col-md-9'>
                                <h3 class='card-title'>" . $arrayResultado[$i]['nickname'] . "</h3>
                            </div>
                            <div class='col-12 col-md-3'>
                                <form method='POST' action='aceitarPedido.php'>
                                    <input type='hidden' id='emailPedido' name='emailPedido' value='" . $arrayResultado[$i]['email'] . "'>
                                    <button class='btn btn-success my-1' type='submit' name='envio' value='1'>Aceitar</button>
                                    <button class='btn btn-danger my-1' type='submit' name='envio' value='0'>Rejeitar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";
        }
    }else{
        $retorno = "<h4>Você não tem pedidos de amizade pendentes!</h4>";
    }

    echo $retorno;
?>