<?php

	$servidor='localhost';
	$banco='measurer';
	$usuario='root';
	$senha='';


		$conn = new mysqli($servidor, $usuario, $senha, $banco);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM medidas ORDER BY id DESC LIMIT 1";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

		    // output data of each row
		    while($row[] = $result->fetch_assoc()) {

		       $json = json_encode($row);


		    }
		} else {
		    echo "0 results";
		}
		echo $json;
		$conn->close();
		?>