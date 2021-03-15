<?php
session_start();
    require "conexion.php";
    $con=conectar();

    $user = $_POST['email'];
    $pass = $_POST['contraseña'];

    $consulta=mysqli_query($con,"SELECT * FROM tb_usuarios WHERE u_usuario='$user' AND u_clave='$pass'");

    if(mysqli_num_rows($consulta)>0){
    	$row = mysqli_fetch_array($consulta);

    	if ($row['u_tipoCuenta'] == "administrador"){
            $_SESSION['idAdmin'] = $row['idUsuario'];
            $_SESSION['nomAdmin'] = $row['u_nombre'];
    		header("Location: ../admin/index.php");
    	}else if ($row['u_tipoCuenta'] == "normal"){
            $_SESSION['idCliente'] = $row['idUsuario'];
            $_SESSION['nomCliente'] = $row['u_nombre'];
    		header("Location: ../user/index.php");
    	}

    }else{
    	header("Location: ../login.html?error=true");
    }

    mysqli_close($con);
?>