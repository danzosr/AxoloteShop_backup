<?php
    session_start();
    if(isset($_POST['btnAccion'])){
        switch($_POST['btnAccion']){
                case 'Eliminar':
                if(is_numeric($_POST['bID'])){
                    $bid = $_POST['bID'];
                    foreach($_SESSION['carrito'] as $indice=>$producto){
                        if($producto['id']==$bid){
                            unset($_SESSION['carrito'][$indice]);
                            header("Location: carrito.php");
                        }
                    }
                } 
                break;
        }

    }
?>