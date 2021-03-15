<?php
require '../conexion.php';
$con = conectar();

$id = $_POST['id'];
$nombre  = $_POST['nombre'];

switch ($_POST['operacion']){
	case 'Insertar':
		
		$sqlAgregar = mysqli_query($con, "INSERT INTO tb_categoria(cat_nombre) VALUES('$nombre')");

		break;	
	case 'Modificar':

		$sqlModificar = mysqli_query($con, "UPDATE tb_categoria SET cat_nombre='$nombre' WHERE idCategoria='$id'");
		
		break;
	case 'Eliminar':
		$sqlEliminar = mysqli_query($con, "DELETE FROM tb_categoria WHERE idCategoria='$id'");
		break;
}

	header("Location: ../../admin/categorias.php");


?>