<?php
require '../conexion.php';
$con = conectar();

$id = $_POST['id'];
$nombre  = $_POST['nombre'];
$apellido  = $_POST['apellido'];
$usuario  = $_POST['usuario'];
$clave  = $_POST['clave'];


switch ($_POST['operacion']){
	case 'Insertar':
		
		$sqlAgregar = mysqli_query($con, "INSERT INTO tb_usuarios(u_nombre,u_apellido,u_usuario,u_clave, u_tipoCuenta) VALUES('$nombre','$apellido','$usuario','$clave','normal')");

		break;	
	case 'Modificar':

		$sqlModificar = mysqli_query($con, "UPDATE tb_usuarios SET u_nombre='$nombre', u_apellido='$apellido', 
										u_usuario='$usuario', u_clave='$clave' WHERE idUsuario='$id'");
		
		break;
	case 'Eliminar':
		$sqlEliminar = mysqli_query($con, "DELETE FROM tb_usuarios WHERE idUsuario='$id'");
		break;
}

	header("Location: ../../admin/clientes.php");

?>