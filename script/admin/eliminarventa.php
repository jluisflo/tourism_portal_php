<?php
require '../conexion.php';
$con = conectar();

$idfactura = $_GET['id'];
$idpago=$_GET['idpago'];
	 
$deleteDetalle = mysqli_query($con, "DELETE FROM tb_detalle WHERE de_idfactura='$idfactura'");

$deletePago = mysqli_query($con, "DELETE FROM tb_pago WHERE idPago='$idpago'");

$deletefactura = mysqli_query($con, "DELETE FROM tb_factura WHERE idFactura='$idfactura'");

header("Location: ../../admin/ventas.php")
?>