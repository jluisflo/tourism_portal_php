<?php
require '../conexion.php';
$con = conectar();
session_start();

$id = $_POST['id'];
$nombre  = $_POST['nom'];
$apellido  = $_POST['ape'];
$usuario  = $_POST['user'];
$clave  = $_POST['pass'];


		$sqlModificar = mysqli_query($con, "UPDATE tb_usuarios SET u_nombre='$nombre', u_apellido='$apellido', 
										u_usuario='$usuario', u_clave='$clave' WHERE idUsuario='$id'");
		$_SESSION['nomCliente']=$nombre;

	header("Location: ../../user/cuenta.php");

?>