<?php
session_start();
require '../conexion.php';
$con = conectar();




switch ($_POST['operacion']){
	case 'Insertar':
	$pregunta1=$_POST['radioSexo'];
	$pregunta2=$_POST['radioEdad'];
	$pregunta3=$_POST['departamento'];
	$pregunta4=$_POST['radioAuto'];
	$pregunta5=$_POST['radioFrecuencia'];
	$pregunta6=implode($_POST['checkTipoTurismo'], ',');
	$pregunta7=implode($_POST['checkMedios'], ',');
	$pregunta8=$_POST['motivacion'];
	$pregunta9=$_POST['radioDiversidad'];
	$pregunta10=$_POST['dinero'];
	$pregunta11=$_POST['radioPrecio'];
	$pregunta12=$_POST['radioExtranjero'];
	$pregunta13=$_POST['radioModelo'];
	$pregunta14=$_POST['radioInversion'];
	$pregunta15=$_POST['radioSeguridad'];
	$pregunta16=$_POST['textseguridad'];
		$consulta=mysqli_query($con,"Insert into tb_encuesta(pregunta1,pregunta2,pregunta3,pregunta4,
			pregunta5,pregunta6,pregunta7,pregunta8,pregunta9,pregunta10,pregunta11,pregunta12,pregunta13,pregunta14,pregunta15,pregunta16) 
			values('$pregunta1','.$pregunta2.','$pregunta3','$pregunta4', '$pregunta5','$pregunta6','$pregunta7',
			'$pregunta8', '$pregunta9','$pregunta10','$pregunta11','$pregunta12', '$pregunta13','$pregunta14',
			'$pregunta15','$pregunta16')");
		
		echo "<script>window.close();</script>";
		break;	
	case 'Eliminar':
		$id=$_POST['id'];

		$sqlEliminar = mysqli_query($con, "DELETE FROM tb_encuesta WHERE idEncuesta='$id'");
		header("Location: ../../admin/encuestas.php");
		break;
}

?>