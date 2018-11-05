<?php
if(!defined("CONST_BASE.PHP")){
	define("CONST_BASE.PHP", "BASE.PHP importado");

define('S_SERVIDOR', 'localhost');
define('BD_USUARIO', 'root');
define('BD_SENHA', '');
define('BD_BASEDEDADOS', 'msmeme');

function conectar(){
	$conexao_sgbd = mysqli_connect(S_SERVIDOR, BD_USUARIO, BD_SENHA);
	if(!$conexao_sgbd)
		die('Erro: ' . mysql_error ());

	$conexao_base = mysqli_select_db($conexao_sgbd, BD_BASEDEDADOS);
	if(!$conexao_base)
		die('Erro: ' . mysql_error ());

	mysqli_query($conexao_sgbd,"SET NAMES 'utf8'");
	return $conexao_sgbd;
}

function desconectar($conexao){
	mysqli_close($conexao);
}

function executar_SQL($conexao, $SQL){
	$conexao = conectar();
	$resultado = mysqli_query($conexao, $SQL);
	if(!$resultado)
		die('Erro: ' . mysql_error());
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
}
?>