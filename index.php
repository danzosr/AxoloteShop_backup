<?php session_start();?>
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
    <link rel="icon" href="img/favicon1.png" type="image/png"/>
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="Css/bootstrap.min.css">
</head>
<!--Agregamos la barra de navegación-->
<?php include 'navbar.php' ?>
<?php 
    if(isset($_GET['cr'])){
        unset($_SESSION['carrito']);
        echo '<script type="text/javascript"> window.location="index.php";</script>';
    }

?>
<body>
    <!--Se crea un contenedor que contiene la "página" en blanco para organizar el resto de los elementos-->
    <main class="contenedor">
        <!--Se define la altura que tendrá dicha página en blanco y dentro se colocan los elementos-->
        <article style="height:2000px;">
        <!--Iniciamos con un slideshow o carrusel, agregando la base home, la clase slider para las animaciones, slide active
        para las acciones con css, container para el texto y caption para darle un formato específico al texto-->
            <section class="home">
                <div class="slider">
                    <div class="slide active" style="background-image: url('img/Slide1.jpg')">
                        <div class="container">
                            <div class="caption">
                                <h1 style="font-weight:bold; color:white;">Aprovecha nuestras promociones</h1>
                                <p style="color:white; font-weight:bold;">Algunas son de tiempo limitado</p>
                            </div>
                        </div>
                    </div>
                    <!--Como se puede observar, el mismo código es repetido para agregar más y más diapositivas al carrusel-->
                    <div class="slide" style="background-image: url('img/Slide2.jpg')">
                        <div class="container">
                            <div class="caption">
                                <h1 style="font-weight:bold; color:white;">La cultura mexicana</h1>
                                <p style="font-weight:bold; color:white;">llena de colores</p>
                            </div>
                        </div>
                    </div>
                    <!--Se puede repetir una gran cantidad de veces y dichas diapositivas serán agregadas, además de que el indicador
                    se actualizará automáticamente-->
                    <div class="slide" style="background-image: url('img/Slide3.png')">
                        <div class="container">
                            <div class="caption" style="margin-left:18%;">
                                <h1 style="font-weight:bold; color:white;  font-size:60px;">#StayInside</h1>
                                <p style="color:white;">Quédate dentro de casa en esta cuarentena</p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Se añaden los controles de anterior y siguiente al carrusel para que el usuario tenga control sobre la imagen
                que observe -->
                <div class="controls">
                    <div class="prev"> < </div>
                    <div class="next"> > </div>
                </div>

                <!-- Agrega los indicadores que te permiten saber en que diapositivas vas, además de permitirte seleccionar alguna
                no adyacente -->
                <div class="indicator">
                </div>
            </section>
            <!--Terminamos con el carrusel y agregamos una sección para los productos-->
            <section>
                <!--Dividimos la nueva seccion con el div de cajas de producto idividuakes-->
                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <!--Inica la grid que será utilizada para ordenar -->
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <!--La clase row nos permite tener todo en la misma linea-->
                                    <div class="row" >
                                        <?php
                                            include 'database.php';
                                            $resultado = $connection ->query("SELECT * FROM producto ORDER BY id ASC limit 3")or die($connection->error);
                                            while($fila = mysqli_fetch_array($resultado)){
                                        ?>
                                        <!--Llamamos la clase especíica de la grid-->
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4" >
                                            <div class="products-single fix" >
                                                <!--Agregamos el efecto de hover sobre el producto además de una máscara base-->
                                                <div class="box-img-hover" >
                                                    <a href="producto.php?id=<?php echo $fila['id']?>"><img src="img/productos/<?php echo $fila['foto']?>" class="img-fluid" alt="Image" style="width:400px;height:400px;"></a>
                                                </div>
                                                <div class="why-text">
                                                    <h4><?php echo $fila['nombre']?></h4>
                                                    <p style="text-align:center; color:#737373;"><?php echo $fila['descripcion']; ?></p>
                                                    <h5><?php echo "$".$fila['precio']?></h5>
                                                </div>
                                            </div>
                                        </div>
                                            <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
            </section>
        </article>
    </main>
</body>
                    
<!--Cerramos todo el body e incluimos tanto nuestros scripts para el dinamismo de la página como el footer
html que contiene la información de contacto-->
<?php include 'footer.html' ?>
<script src="Js/script.js"></script>
</html>
<!--Comentado por Diego Sánchez Luna-->