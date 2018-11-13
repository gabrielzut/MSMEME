<?php 
    require "conn.php";

    header('Content-Type: text/html; charset=utf-8');
    session_start();

    $busca = $_POST['pesquisa'];

    $conexao = conectar();

    if($busca != ""){
        $sql = "SELECT A.*,UP.email AS emailUP,UP.nickname as nicknameUP,UP.frase as fraseUP,UP.status as statusUP,UP.imagem as imagemUP,US.email as emailUS,US.nickname as nicknameUS,US.frase as fraseUS,US.status as statusUS,US.imagem as imagemUS FROM (Amizades A JOIN Usuario UP ON A.emailUsuario1 = UP.email) JOIN Usuario US ON A.emailUsuario2 = US.email WHERE (A.emailUsuario1='" . $_SESSION['email'] . "' OR A.emailUsuario2='" . $_SESSION['email'] . "') AND A.pedido = 0 AND ((UPPER(US.nickname) LIKE UPPER('%" . $busca . "%')) OR (UPPER(UP.nickname) LIKE UPPER('%" . $busca . "%')));";
    }else{
        $sql = "SELECT A.*,UP.email AS emailUP,UP.nickname as nicknameUP,UP.frase as fraseUP,UP.status as statusUP,UP.imagem as imagemUP,US.email as emailUS,US.nickname as nicknameUS,US.frase as fraseUS,US.status as statusUS,US.imagem as imagemUS FROM (Amizades A JOIN Usuario UP ON A.emailUsuario1 = UP.email) JOIN Usuario US ON A.emailUsuario2 = US.email WHERE (A.emailUsuario1='" . $_SESSION['email'] . "' OR A.emailUsuario2='" . $_SESSION['email'] . "') AND A.pedido = 0;";
    }
    $resultado = executar_sql($conexao, $sql);
    $arrayResultado = lerResultado($resultado);

    $amigos = [];
    $retorno = "";

    if(count($arrayResultado) > 0){
        for($i=0;$i<count($arrayResultado);$i++){
            if($arrayResultado[$i]['emailUP'] == $_SESSION['email']){
                $amigos[$i]['email'] = $arrayResultado[$i]['emailUS'];
                $amigos[$i]['nickname'] = $arrayResultado[$i]['nicknameUS'];
                $amigos[$i]['frase'] = $arrayResultado[$i]['fraseUS'];
                $amigos[$i]['status'] = $arrayResultado[$i]['statusUS'];
                $amigos[$i]['imagem'] = $arrayResultado[$i]['imagemUS'];
            }else{
                $amigos[$i]['email'] = $arrayResultado[$i]['emailUP'];
                $amigos[$i]['nickname'] = $arrayResultado[$i]['nicknameUP'];
                $amigos[$i]['frase'] = $arrayResultado[$i]['fraseUP'];
                $amigos[$i]['status'] = $arrayResultado[$i]['statusUP'];
                $amigos[$i]['imagem'] = $arrayResultado[$i]['imagemUP'];
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
    }else{
        $retorno = "<h4>Nenhum amigo encontrado!</h4>";
    }
        
    echo $retorno;
?>