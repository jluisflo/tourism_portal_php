<?php
require '../conexion.php';
$con = conectar();

$id = $_POST['id'];
$titulo  = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$destino = $_POST['destino'];

switch ($_POST['operacion']){
	case 'Insertar':
		
		$sqlAgregar = mysqli_query($con, "INSERT INTO tb_paquetes(pa_titulo, pa_descripcion, pa_precio, pa_idDestino) 
				VALUES('$titulo','$descripcion','$precio','$destino')");

		break;	
	case 'Modificar':

			$sqlAgregar = mysqli_query($con, "UPDATE tb_paquetes SET pa_titulo='$titulo', pa_descripcion='$descripcion', pa_precio='$precio', pa_idDestino='$destino' WHERE idPaquete='$id'");

		break;
	case 'Eliminar':
		$sqlEliminar = mysqli_query($con, "DELETE FROM tb_paquetes WHERE idPaquete='$id'");
		break;
}

	header("Location: ../../admin/paquetes.php");


?>