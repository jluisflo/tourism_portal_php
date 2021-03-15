<?php 
    session_start();
    require "conexion.php";
    $con=conectar();

    $nombre=$_POST['nombres'];
    $apellido=$_POST['apellidos'];
    $usuario=$_POST['email'];
    $clave=$_POST['contraseña'];

    $consulta=mysqli_query($con,"Insert into tb_usuarios(u_nombre, u_apellido, u_usuario, u_clave, u_tipoCuenta) 
    							 values('$nombre','$apellido','$usuario','$clave','normal')");
    $id=mysqli_insert_id($con);

    if($consulta){
        $usuario = mysqli_query($con,"SELECT * FROM tb_usuarios WHERE idUsuario='$id'");
        $row = mysqli_fetch_array($usuario);
        $_SESSION['idCliente'] = $row['idUsuario'];
        $_SESSION['nomCliente'] = $row['u_nombre'];
    	header("Location: ../user/index.php");
    }else{
    	echo "<p>Ha ocurrido un error, por favor vuelva a intentarlo. </p>";
    	echo "<a href='registrar.html'>Volver a intentar</a>";
    }
    
?>