<?php
require '../conexion.php';
$con = conectar();

$id = $_POST['id'];
$nombre  = $_POST['nombre'];

switch ($_POST['operacion']){
	case 'Insertar':
		
		$sqlAgregar = mysqli_query($con, "INSERT INTO tb_tarifa(nombre) VALUES('$nombre')");

		break;	
	case 'Modificar':

		$sqlModificar = mysqli_query($con, "UPDATE tb_tarifa SET nombre='$nombre' WHERE idTarifa='$id'");
		
		break;
	case 'Eliminar':
		$sqlEliminar = mysqli_query($con, "DELETE FROM tb_tarifa WHERE idTarifa='$id'");
		break;
}

	header("Location: ../../admin/tarifas.php");


?>