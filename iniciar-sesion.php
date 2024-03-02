<?php 
  
  session_start();

  require('database.php');

  $correo = $_POST["correo"];
  $pass = $_POST["password"];

  $query = mysqli_query($connection,"SELECT * FROM usuario WHERE correo = '".$correo."' and pass = '".$pass."'");
  $nr = mysqli_num_rows($query);

  if ($nr == 1) {
    $_SESSION['email'] = $correo;
    header("Location: index.php");
    unset($_SESSION['carrito']);
  }elseif ($nr == 0) {
    header("Location: registro.php");
  }

?>