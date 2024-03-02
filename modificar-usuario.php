<?php
	session_start();
	include 'database.php';

	if(isset($_POST['Dnombre'])){
		$nombre = $_POST['Dnombre'];
		$correo = $_POST['Dmail'];
		$numero = $_POST['Dcel'];
		$pass = $_POST['Dpass'];

		$query="UPDATE usuario SET nombre = '$nombre', numero = '$numero', pass = '$pass' WHERE correo = '$correo'";

		$result = mysqli_query($connection, $query);
		if (!$result) {
			die('Cambio fallido.').mysql_error();
		}
		header("Location: cuenta.php");
	}
?>