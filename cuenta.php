<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head> <!--Se abre el encabezado-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AxolotlShop - Cuenta</title> <!-- Se agrega el título -->
        <link rel="shortcut icon" href="img/favicon(1).ico" type="image/x-icon"> <!-- Se coloca un icono -->
        <link rel="icon" href="img/favicon1.png"> <!-- Se coloca la misma imagen del icono pero en formato png -->
        <link rel="stylesheet" href="Css/style.css" /> <!-- Llamamos a la hoja de estilo para el diseño -->
       
      
    </head> <!-- Se cierra el encabezado -->
<?php include 'navbar.php'?> <!-- En código php mandamos a traer el archivo que contiene la barra de navegación -->

<body>
<main class="contenedor"> <!-- Se crea la main class contenedor -->
    <article style="height:750px;"> <!--  Se crea un artículo -->
    <section>
    <div class="about-box-main" style="margin-top: -40px;">
        <div class="container">
        <?php
            include 'database.php';
            $ver= $_SESSION['email'];
            $query = "SELECT * FROM usuario WHERE correo='".$ver."'";
            $result = mysqli_query($connection, $query);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
                $row = mysqli_fetch_assoc($result);
                ?><div>
                    <form id="modi" action="modificar-usuario.php" method="POST">
                    <img src='img/AJRosa.png' style='display:block; margin-left:auto; margin-right:auto; width:35vh; height:25vh;'>
                    <table id="tabla" style='width:100%; height: 500px; padding:60px 30px;'>
                        <tr>
                            <td align="center">
                                <label for="nombre" style="font-weight:bold; font-size: 16pt;">Nombre: </label>
                                <input style='font-size:12pt; border: 1px solid blue; border-radius: 5px;' maxlength="75" type="text" id="Dnombre" name="Dnombre" required value="<?php echo $row['nombre'] ?>">
                            </td>
                            <td align="center">
                                <label for="nombre" style="font-weight:bold; font-size: 16pt;">Password: </label>
                                <input style='font-size:12pt; border: 1px solid blue; border-radius: 5px;' minlength="4" maxlength="8" type="password" name="Dpass" id="Dpass" required value="<?php echo $row['pass'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <label for="nombre" style="font-weight:bold; font-size: 16pt;">Correo: </label>
                                <input style='font-size:12pt; border: 1px solid blue; border-radius: 5px;' type="text" name="Dmail" id="Dmail" value="<?php echo $row['correo'] ?>" readonly="readonly" required>
                            </td>
                            <td align="center">
                                <label for="nombre" style="font-weight:bold; font-size: 16pt;">Número: </label>
                                <input style='font-size:12pt; border: 1px solid blue; border-radius: 5px; margin-left: 25px;' type="text" minlength="10" maxlength="10" name="Dcel" id="Dcel" value="<?php echo $row['numero'] ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <button type="submit" name="modi" class="registrar">
                                    Modificar
                                </button>
                            </td>
                    </form>
                            <td align="center">
                                <form action="sCerrar.php" method="POST">
                                    <button type="submit" name="cerrarS" class="registrar">Cerrar sesión</button>  
                                </form>
                            </td>
                        </tr>
                    </table>
                </div><?php
            }
        ?>
        </div>
    </div>
<!-- Se crea una tabla para así colocar correctamente las imágenes del equipo de trabajo -->

     
</main> <!-- Se cierra la main class-->
</body> <!-- Se cierra el cuerpo -->
<?php include 'footer.html'?>
<script src="Js/script.js"></script> <!-- Se manda a llamar un archivo script para algunas funciones  -->
<script src="Js/db.js"></script>
</html>

<img src='img/AJRosa.png' style='display:block; margin-left:auto; margin-right:auto; width:30vh; height:20vh;'>
<table style='width:100%; padding:30px;'>
    <tr>
        <td><p><span style='font-weight:bold; font-size:20px;'>Nombre: </span>".$row['nombre']."</p></td>
        <td><p><span style='font-weight:bold; font-size:20px;'>Password: </span>".$row['pass']."</p></td>
    </tr>
    <tr>
        <td><p><span style='font-weight:bold; font-size:20px;'>Correo: </span>".$row['correo']."</p></td>
        <td><p><span style='font-weight:bold; font-size:20px;'>Teléfono: </span>".$row['numero']."</p></td>
    </tr>
</table>

