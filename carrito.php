<?php session_start();?>
<?php include 'columna.php';?>
<!--Validamos el tipo de documento-->
<!DOCTYPE html>
<!--Se coloca como idioma por defecto el inglés-->
<html lang="en">
    <!--Agregamos todos los metadatos, el favicon de la pestaña y las relaciones entre los archivos de estilo en cascada y la 
página en cuestión-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AxolotlShop</title>
    <link rel="stylesheet" href="Css/style.css" />
    <link rel="stylesheet" href="Css/carrito.css" />
    <link rel="icon" href="img/favicon1.png" type="image/png"/>
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="Css/bootstrap.min.css">
</head>
<!--Agregamos la barra de navegación-->
<?php include 'navbar.php' ?>
<body>
    <!--Se crea un contenedor que contiene la "página" en blanco para organizar el resto de los elementos-->
    <main class="contenedor">
        <!--Se define la altura que tendrá dicha página en blanco y dentro se colocan los elementos-->
        <article style="height:auto;">
          <?php
              include('database.php');
              if(isset($_GET['id'])){
                  $resultado = $connection ->query("SELECT * FROM producto WHERE id=".$_GET['id'])or die($connection->error);
                  if(mysqli_num_rows($resultado) > 0){
                      $fila = mysqli_fetch_row($resultado);
                      $id = $fila['0'];
                      $_POST['ID'] = $id;
                      $nombre = $fila['1'];
                      $foto = $fila['2'];
                      $descripcion = $fila['3'];
                      $precio = $fila['4'];
                      $cantidad = 1;
                      if(!isset($_SESSION['carrito'])){
                        $producto=array(
                          'id'=>$id,
                          'nombre'=>$nombre,
                          'foto'=>$foto,
                          'descripcion'=>$descripcion,
                          'precio'=>$precio,
                          'cantidad'=>$cantidad
                        );
                        $_SESSION['carrito'][0]=$producto;
                      } 
                      else{
                        $idProd=array_column($_SESSION['carrito'],"id");  
                        if(in_array($id,$idProd)){
                            echo '<p style="font-size:50px;">Ese elemento ya se encuentra en su carrito.</p>';
                        }else{
                          $numProd=count($_SESSION['carrito']);
                          $producto=array(
                            'id'=>$id,
                            'nombre'=>$nombre,
                            'foto'=>$foto,
                            'descripcion'=>$descripcion,
                            'precio'=>$precio,
                            'cantidad'=>$cantidad
                          );
                          $_SESSION['carrito'][$numProd]=$producto;
                        }
                          
                      }
                  }
              }             
              ?>
              <?php 
              if(empty($_SESSION['carrito'])){
                  echo '<h1 style="text-align:center; margin:100px;">Su carrito está vacío.</h1>';
              } else{ ?>
                    <table style="width:100%;" border="2">
                        <tr align="center">
                            <th>Vista previa</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th style="cursor: pointer;">Eliminar</th>
                        </tr>
              <?php $total=0;?>
              <?php foreach($_SESSION['carrito'] as $indice=>$producto){?>
                    <tr style="text-align:center;">
                        <td style="width:5%;"><img src="img/productos/<?php echo $producto['foto'];?>" style="width:150px;height:150px;"></td>
                        <td style="width:15%;"><?php echo $producto['nombre']; ?></td>
                        <td style="width:50%;"><?php echo $producto['descripcion']; ?></td>
                        <td style="width:5%;">$<?php echo number_format($producto['precio'],2); ?></td>
                        <td style="width:15%;"><?php echo $producto['cantidad']; ?></td>
                        <td>
                            <form action="carFun" method="post">
                                <input type="hidden" name='bID' id="bID" value="<?php echo $producto['id'];?>">
                                <button type="submit" style="background-color:#db3721;color:white;font-size:15px;text-align:center;display: inline-block;font-weight:bold;padding:10px;" name="btnAccion" value="Eliminar">Eliminar</button>
                            </form>
                        </td>
                        <?php $total = $total+($producto['precio']*$producto['cantidad']);?>
                    </tr>
                <?php } ?>
                <td colspan="5" align=right;>Total</td>
                <td align="center">$<?php echo number_format($total,2);?></td>
            </table>
            <hr>
              <p style="float:right; display:block; font-size:25px; background-color:orange;"><a href="pago.php" style="color:white; padding:10px;">Proceder a pago: </a></p>
            <?php  } $_POST['total']=$total;?>
                
        </article>
    </main>
</body>
<!--Cerramos todo el body e incluimos tanto nuestros scripts para el dinamismo de la página como el footer
html que contiene la información de contacto-->
<?php include 'footer.html' ?>
</html>
<!--Comentado por Diego Sánchez Luna-->