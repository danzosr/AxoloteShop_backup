<?php
	include'database.php';

	if ($_POST['pass']!=$_POST['conpass']) {
		echo '<p style="background-color:rgb(222, 182, 2,1); padding:15px; border:2px solid white; color:white;">Los password no coinciden.</p>';
	}else if(strlen($_POST['email'])>0&&$_POST['pass']==$_POST['conpass']) {
		$resultado = $connection ->query("SELECT * FROM usuario WHERE correo='".$email."'");
        if(mysqli_num_rows($resultado) > 0){
			echo '<p style="background-color:rgb(222, 182, 2,1); padding:15px; border:2px solid white; color:white;">Ya existe una cuenta con ese correo.</p>';
		} 	else{
				$nombre = $_POST['nombre'];
				$numero = $_POST['numero'];
				$email = $_POST['email'];
				$pass = $_POST['pass'];
				$conpass = $_POST['conpass'];
				$query = "INSERT into usuario (nombre, numero, correo, pass) VALUES ('$nombre','$numero','$email','$pass')";
				$result = mysqli_query($connection, $query);
				if($result>0){
					echo '<script type="text/javascript"> window.location="index.php";</script>';
					unset($_SESSION['carrito']);
					$_SESSION['email'] = $email;
				}else{
					echo '<p style="background-color:rgb(217, 34, 2,1); padding:15px; border:2px solid white; color:white;">Ocurrió un error en su registro.</p>';
				}
			}
		}
?>