<?php

	$servidor='localhost';
	$banco='measurer';
	$usuario='root';
	$senha='';
	$link = mysqli_connect($servidor,$usuario,$senha, $banco);
	date_default_timezone_set('America/Sao_Paulo');
	$horario = date('Y-m-d H:i:s', time());
	
	if (isset($_GET['vazao']) or isset($_GET['energia']) ) {
		
		$vazao = $_GET['vazao'];
		$energia = $_GET['energia'];

		$query = "INSERT INTO medidas(horario, vazao, energia) VALUES ('$horario','$vazao','$energia')";
	
		mysqli_query($link,$query);
		mysqli_close($link);

		echo 'DADOS INSERIDOS NO BANCO!';

	}else{


		echo 'ERRO AO GRAVAR NO BANCO DE DADOS!';
	}	
?>