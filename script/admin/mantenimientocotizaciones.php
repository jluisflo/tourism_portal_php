<?php
require '../conexion.php';
$con = conectar();

$id = $_POST['id'];
$nombre  = $_POST['nombre'];
$email  = $_POST['email'];
$tel  = $_POST['tel']; 
$producto  = $_POST['producto'];
$detalles  = $_POST['detalles'];
$cotizante = $_POST['cotizante'];
if(empty($cotizante)){ $cotizante="anonimo";}

switch ($_POST['operacion']){
	case 'Insertar':
		
		$sqlAgregar = mysqli_query($con, "INSERT INTO tb_cotizacion(co_email,co_nombre,co_telefono,
			co_producto,co_detalles,co_cotizante)VALUES('$email','$nombre','$tel','$producto','$detalles',
			'$cotizante')");

		break;	
	case 'Modificar':

		$sqlModificar = mysqli_query($con, "UPDATE tb_cotizacion SET co_email='$email', co_nombre='$nombre', 
				co_telefono='$tel', co_producto='$producto', co_detalles='$detalles', co_cotizante='$cotizante'
										WHERE idCotizacion='$id'");
		
		break;
	case 'Eliminar':
		$sqlEliminar = mysqli_query($con, "DELETE FROM tb_cotizacion WHERE idCotizacion='$id'");
		break;
}

	header("Location: ../../admin/cotizaciones.php");

?>