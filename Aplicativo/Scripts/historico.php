<?php
	// Este script manda todos os dados armazenados
	// do banco de dados para o aplicativo.
	$servidor='localhost';
	$banco='measurer';
	$usuario='root';
	$senha='';
	// Conectando e consutando o banco de dados.
	$conn = new mysqli($servidor, $usuario, $senha, $banco);
	if ($conn->connect_error) {
		die("Conexão falhou!: " . $conn->connect_error);
	}
	// Criação de um vetor para armazenar os dados.
	$medidas = array();
	// Selecionando os valores do banco de dados.
	$sql = "SELECT horario, vazao, energia FROM medidas;";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($horario, $vazao, $energia);
	while($stmt->fetch()){
		$temp = [
		'horario'=>$horario,
		'vazao'=>$vazao,
		'energia'=>$energia
		];
 		array_push($medidas, $temp);
	}
 	// Armazenando os valores em JSON (JavaScript Object Notation - Notação de Objetos JavaScript).
	echo json_encode($medidas);
	//Encerrando a conexão.
	$conn->close();
?>