<?php 
    require "conn.php";
    function getAmigos(){
        header('Content-Type: text/html; charset=utf-8');

        $conexao = conectar();
        $sql = "SELECT A.*,UP.email AS emailUP,UP.nickname as nicknameUP,UP.frase as fraseUP,UP.status as statusUP,UP.imagem as imagemUP,US.email as emailUS,US.nickname as nicknameUS,US.frase as fraseUS,US.status as statusUS,US.imagem as imagemUS FROM (Amizades A JOIN Usuario UP ON A.emailUsuario1 = UP.email) JOIN Usuario US ON A.emailUsuario2 = US.email WHERE (A.emailUsuario1='" . $_SESSION['email'] . "' OR A.emailUsuario2='" . $_SESSION['email'] . "') AND A.pedido = 0;";
        $resultado = executar_sql($conexao, $sql);
        $arrayResultado = lerResultado($resultado);

        $amigos = [];
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
        }

        return $amigos;
    }
?>