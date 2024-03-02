<?php

	include ('database.php');

	$search = $_POST['search'];

	if (!empty($search)) {
		$query = "SELECT * FROM producto WHERE nombre LIKE '$search%'";
		$result = mysqli_query($connection, $query);
		if (!$result) {
			die('Query error'.mysqli_error($connection));
		}

		$json = array();
		while ($row = mysqli_fetch_array($result)) {
			$json[] = array(
				'id' => $row['id'],
				'nombre' => $row['nombre'],
				'foto' => $row['foto'],
				'descripcion' => $row['descripcion'],
				'precio' => $row['precio'],
				'inventario' => $row['inventario']
			);
		}
		$jsonstring = json_encode($json);
		echo $jsonstring;
	}else{
		$query = "SELECT * FROM producto";
		$result = mysqli_query($connection, $query);

		$json = array();
		while ($row = mysqli_fetch_array($result)) {
			$json[] = array(
				'id' => $row['id'],
				'nombre' => $row['nombre'],
				'foto' => $row['foto'],
				'descripcion' => $row['descripcion'],
				'precio' => $row['precio'],
				'inventario' => $row['inventario']
			);
		}
		$jsonstring = json_encode($json);
		echo $jsonstring;
	}


?>