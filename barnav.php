
<!--Validamos el tipo de archivo-->
<!DOCTYPE html>
<!--Colocamos el lenguaje predeterminado en inglés-->
<html lang="en">
<head>
    <!--Colocamos los metadatos que utilizara la página, dentro colocamos el charset para validar lo
    los caracteres especiales y acentos, tomamos el ancho del viewport para que lo utilicemos en proóximas mediciones.
    Además, agregamos la relación entre nuestr página y los estilos en cascada (CSS).-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Css/style.css">
</head>

<body>
    <!--Abrimos la barra de navegación de nuestra página con los atributos de menu y el identificador
    del mismo nombre para posteriormente utilizarlo en otra funciones-->
    <nav class="menu" id="menu">
        <a href="index.php">
            <image src="img/AJblanco.png" style="position:absolute; width:65px; height:40px; left:30px; top:10px;"></image>
        </a>
        <!--Creamos un contenedor para alinear los botones dentro de la barra. Creamos dos botones que serán utilizados
        cuando la página sea demasiado pequeña para todo lo demás, uno abre el menú y el otro lo cierra.-->
        <div class="contenedor contenedor-botones-menu">
            <button id="btn-menu-barras" class="btn-menu-barras"><i class="fas fa-bars"></i></button>
            <button id="btn-menu-cerrar" class="btn-menu-cerrar"><i class="fas fa-times"></i></button>
        </div>
        <!--Esta división contiene básicamente el texto que se muestra en la barra de navegación, al poner el cursor
        encima de este se desplegarán las categorías de los productos-->
        <div class="contenedor contenedor-enlaces-nav">
            <div class="btn-departamentos" id="btn-departamentos">
                <p>Todos los <span>Departamentos</span></p>
                <i class="fas fa-caret-down"></i>
            </div>
            <!--Se colocan los vínculos a otras ventanas-->
            <div class="enlaces">
            <nav>
                <table>
                <tr>
                    <ul>
                        <form>
                            <td>
                                <input type="search" id="RDnav" placeholder="Ingresar producto">
                            </td>
                            <td>
                                <button type="submit" id="Rnavegador">
                                    Buscar
                                </button>
                            </td>
                        </form>
                    </ul>
                    <td>
                        <a href="shop.php">Explorar</a>
                    </td>
                    <td>
                    <?php if(isset($_SESSION['email'])){ ?> <a href="carrito.php"><p style="position:absolute;"><?php echo '('.count($_SESSION['carrito']).')'?></p><img src="https://image.flaticon.com/icons/svg/34/34627.svg" width="20px" height="20px"></a>
                    <?php } ?>
                    </td>
                    <td>
                        <a href="AboutUs.php">¿Quiénes somos?</a>
                    </td>
                    <td>
                        <?php
                            if(!isset($_SESSION['email'])){
                                echo "<a href='registro.php'>Iniciar Sesión</a>";
                            } else {
                                echo "<a href='cuenta.php'>Cuenta</a>";
                            }

                        ?>
                    </td>
                </tr>
                </table>
            </nav>
            </div>
        </div>
        <!--A partir de aqui comenzamos con las categorías y las subcategorías de los productos presentes en la página 
            hasta el momento. Se incluyen los vínculos a cada una de estas además de una vista previa de imágenes sleccionadas
            relacionada a esta misma.
        -->
        <div class="contenedor contenedor-grid">
            <!--Además de lo mencionado anteriormente, se utilizan las funciones de css grid en el que creamos una especie
            de plantilla con la que organizamos todos los elementos
        -->
            <div class="grid" id="grid">
                <div class="categorias">
                    <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                    <h3 class="subtitulo">Categorias</h3>
                    <!--Categorías principales-->
                    <a href="shop.php?category=pintura" data-categoria="pinturas"> Pinturas  <i class="fas fa-angle-right"></i></a>
                    <a href="shop.php?category=figura" data-categoria="figuras">Figuras <i class="fas fa-angle-right"></i></a>
                    <a href="shop.php?category=accesorio" data-categoria="accesorios">Accesorios <i class="fas fa-angle-right"></i></a>
                    <a href="shop.php?category=bordado" data-categoria="bordados">Bordados <i class="fas fa-angle-right"></i></a>
                    <a href="shop.php?category=recuerdos" data-categoria="recuerditos">Recuerditos <i class="fas fa-angle-right"></i></a>
                </div>
                <!--En esta parte colocamos una subcategoría relacionada a la categoría principal de pinturas, además de las imágenes
                    de referencia
                -->
                <div class="contenedor-subcategorias">
                    <div class="subcategoria " data-categoria="pinturas">
                        <div class="enlaces-subcategoria">
                            <button class="btn-regresar"><i class="fas fa-arrow-left"></i>Regresar</button>
                            <h3 class="subtitulo"> Pinturas </h3>
                            <a href="shop.php?category=pintura&sub=oleo">Al óleo</a>
                        </div>

                        <div class="banner-subcategoria">
                            <a>
                                <img src="img/categorias/pintura1.jpg" alt="">
                            </a>
                        </div>

                        <div class="galeria-subcategoria">
                            <a>
                                <img src="img/categorias/pintura2.jpg" alt="">
                            </a>
                            <a>
                                <img src="img/categorias/pintura3.jpg" alt="">
                            </a>
                            <a>
                                <img src="img/categorias/pintura3.jpg" alt="">
                            </a>
                            <a>
                                <img src="img/categorias/pintura2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!--En esta parte colocamos 4 subcategorías relacionadas a la categoría principal de figuras, además de las imágenes
                    de referencia
                     -->
                    <div class="subcategoria" data-categoria="figuras">
                        <div class="enlaces-subcategoria">
                            <button class="btn-regresar"><i class="fas fa-arrow-left"></i>Regresar</button>
                            <h3 class="subtitulo">Figuras</h3>
                            <a href="shop.php?category=figura&sub=ceramica">Cerámica</a>
                            <a href="shop.php?category=figura&sub=barro">Barro</a>
                            <a href="shop.php?category=figura&sub=cristal">Cristal</a>
                            <a href="shop.php?category=figura&sub=madera">Madera tallada</a>
                        </div>
                        <div class="banner-subcategoria">
                            <a>
                                <img src="img/categorias/cristal2.jpeg" alt="">
                            </a>
                        </div>

                        <div class="galeria-subcategoria">
                            <a>
                                <img src="img/categorias/barro1.jpg" alt="">
                            </a>
                            <a>
                                <img src="img/categorias/madera1.jpg" alt="">
                            </a>
                            <a>
                                <img src="img/categorias/ceramica1.jpeg" alt="">
                            </a>
                            <a>
                                <img src="img/categorias/ceramica2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!--
                        En esta parte colocamos 2 subcategorías relacionadas a la categoría principal de accesorios, además de las imágenes
                        de referencia
                    -->
                    <div class="subcategoria" data-categoria="accesorios">
                        <div class="enlaces-subcategoria">
                            <button class="btn-regresar"><i class="fas fa-arrow-left"></i>Regresar</button>
                            <h3 class="subtitulo">Accesorios</h3>
                            <a href="shop.php?category=accesorio&sub=pulsera">Pulseras</a>
                            <a href="shop.php?category=accesorio&sub=collar">Collares</a>
                        </div>

                        <div class="banner-subcategoria">
                            <a>
                                <img src="img/categorias/pulsera1.jpg" alt="">
                            </a>
                        </div>

                        <div class="galeria-subcategoria">
                            <a>
                                <img src="img/categorias/collar_1.jpg" alt="">
                            </a>
                            <a>
                                <img src="img/categorias/pulsera2.jpg" alt="">
                            </a>
                            <a>
                                <img src="img/categorias/pulsera3.jpg" alt="">
                            </a>
                            <a>
                                <img src="img/categorias/pulsera1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!--
                        En esta parte colocamos 3 subcategorías relacionadas a la categoría principal de bordados, además de las imágenes
                        de referencia
                    -->
                    <div class="subcategoria" data-categoria="bordados">
                        <div class="enlaces-subcategoria">
                            <button class="btn-regresar"><i class="fas fa-arrow-left"></i>Regresar</button>
                            <h3 class="subtitulo">Bordados</h3>
                            <a href="shop.php?category=bordado&sub=mantel">Manteles</a>
                            <a href="shop.php?category=bordado&sub=servilleta">Servilletas</a>
                            <a href="shop.php?category=bordado&sub=blusa">Blusas</a>
                        </div>

                        <div class="banner-subcategoria">
                            <a>
                                <img src="img/categorias/mantel_1.jpg" alt="">
                            </a>
                        </div>

                        <div class="galeria-subcategoria">
                            <a>
                                <img src="img/categorias/servilleta_1.jpg" alt="">
                            </a>
                            <a>
                                <img src="img/categorias/blusa_1.jpg" alt="">
                            </a>
                            <a>
                                <img src="img/categorias/mantel_2.jpg" alt="">
                            </a>
                            <a>
                                <img src="img/categorias/blusa_2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!--   
                        En esta parte colocamos 3 subcategorías relacionadas a la categoría principal de recuerditos, además de las imágenes
                        de referencia
                    -->
                    <div class="subcategoria" data-categoria="recuerditos">
                        <div class="enlaces-subcategoria">
                            <button class="btn-regresar"><i class="fas fa-arrow-left"></i>Regresar</button>
                            <h3 class="subtitulo">Recuerditos</h3>
                            <a href="shop.php?category=recuerdos&sub=llavero">Llaveros</a>
                            <a href="shop.php?category=recuerdos&sub=alebrije">Alebrijes</a>
                            <a href="shop.php?category=recuerdos&sub=muneca">Muñecas</a>
                        </div>

                        <div class="banner-subcategoria">
                            <a href="#">
                                <img src="img/categorias/llavero_1.jpg" alt="">
                            </a>
                        </div>

                        <div class="galeria-subcategoria">
                            <a href="#">
                                <img src="img/categorias/alebrije_1.jpg" alt="">
                            </a>
                            <a href="#">
                                <img src="img/categorias/muñeca_1.jpg" alt="">
                            </a>
                            <a href="#">
                                <img src="img/categorias/llavero_2.jpg" alt="">
                            </a>
                            <a href="#">
                                <img src="img/categorias/alebrije_2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--Agregamos los scripts necesarios para hacer funcionar la barra de navegación, incluídas las fuentes de fontawesome-->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
    <script src="Js/main.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="Js/db.js"></script>
</body>
</html>
<!--Hecho por Diego Sánchez Luna-->