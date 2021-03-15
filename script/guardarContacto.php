<?php
session_start();
require 'conexion.php';
$con = conectar();

//recuperando datos del formulario
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];

$contacto = "";
if($_POST['contactenospublico']){
	$contacto = "anonimo";
}elseif($_POST['contactenosprivado']){
	$contacto =  $_SESSION['idCliente'];
}

//insertando datos
$sql="insert into tb_contacto(con_nombre,con_email,con_asunto,con_mensaje, con_contactante) 
	values('$nombre','$email','$asunto','$mensaje', '$contacto')";

$result= mysqli_query($con,$sql);

if($result)
{
	if($contacto=="anonimo"){ 
 		header("Location: ../gracias.html");
 	}else{
 		header("Location: ../user/gracias.html");
 	}
}
else
{
 echo "Ha ocurrido un error vuelva a intentarlo";
}
mysqli_close($con);
?>