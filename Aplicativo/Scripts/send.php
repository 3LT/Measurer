<?php
	// Este script manda os ultimos dados armazenados
	// do banco de dados para o aplicativo.
	$servidor='localhost';
	$banco='measurer';
	$usuario='root';
	$senha='';
	// Conectando e consutando o banco de dados.
	$conn = new mysqli($servidor, $usuario, $senha, $banco);
	// Checando conexão
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	//Selecionando os valores do banco de dados.
	$sql = "SELECT * FROM medidas ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row[] = $result->fetch_assoc()) {
			// Armazenando os valores em JSON (JavaScript Object Notation - Notação de Objetos JavaScript).
		    $json = json_encode($row);
		}
	} else {
		echo "0 resultados";
	}
	echo $json;
	//Encerrando a conexão.
	$conn->close();
?>
