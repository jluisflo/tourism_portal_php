<?php
session_start();
    require "conexion.php";
    $con=conectar();

    $email=$_POST['email'];
    $nom=$_POST['nombre'];
    $tel=$_POST['tel'];
    $servicio=$_POST['servicio'];
    $det=$_POST['detalle'];

    $cotiza = "";
    
    if (isset($_POST['cotizacionpublica'])) {
        $cotiza = "anonimo";
    }elseif (isset($_POST['cotizacionprivada'])) {
        $cotiza = $_SESSION['idCliente'];
    }

    $consulta=mysqli_query($con,"INSERT INTO tb_cotizacion(co_email, co_nombre, co_telefono, co_producto, co_detalles, co_cotizante)  VALUES('$email','$nom', '$tel','$servicio','$det', '$cotiza')");

    if($consulta){
        if($cotiza=="anonimo"){ 
            header("Location: ../gracias.html");
        }else{
            header("Location: ../user/cotizacion.php");
        }

    }else{
        echo "<p>Ha ocurrido un error, por favor vuelva a intentarlo. </p>";
        echo "<a href='../cotizacion.php'>Volver a intentar</a>";
    }


?>