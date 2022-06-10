<?php

	$enderecoServidor = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "concessionaria";
	$conexao = mysqli_connect($enderecoServidor, $usuario, $senha, $bd);
	
	if ($conexao) {
		return $conexao;
	} else {
		echo "<h1 style='color: red'>Erro</h1>";
	}
	
	function mensagem($mensagem, $tipo) {
		echo "<div class='alert alert-$tipo mensagem' role='alert'>$mensagem</div>";
	}

?>