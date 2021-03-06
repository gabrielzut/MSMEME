<?php

define('S_SERVIDOR', 'localhost');
define('BD_USUARIO', 'root');
define('BD_SENHA', '');
define('BD_BASEDEDADOS', 'msmeme');

function conectar(){
	$conexao_sgbd = mysqli_connect(S_SERVIDOR, BD_USUARIO, BD_SENHA);
	if(!$conexao_sgbd)
		die('Erro: ' . mysqli_error ($conexao_sgbd));

	$conexao_base = mysqli_select_db($conexao_sgbd, BD_BASEDEDADOS);
	if(!$conexao_base)
		die('Erro: ' . mysqli_error ($conexao_sgbd));

	mysqli_set_charset($conexao_sgbd,"utf8mb4");
	mysqli_query($conexao_sgbd,"SET NAMES 'utf8mb4'");
	
	return $conexao_sgbd;
}

function desconectar($conexao){
	mysqli_close($conexao);
}

function executar_SQL($conexao, $SQL){
	$conexao = conectar();
	$resultado = mysqli_query($conexao, $SQL);
	if(!$resultado)
		die('Erro: ' . mysqli_error($conexao));
	return $resultado;
}

function lerResultado($resultado){
	$arrayResultado = [];
	for($i=0;$i<mysqli_num_rows($resultado);$i++){
		$arrayResultado[$i] = mysqli_fetch_assoc($resultado);
	}
    mysqli_free_result($resultado);
	return $arrayResultado;
}

?>
