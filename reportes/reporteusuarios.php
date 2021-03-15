<?php
require("fpdf/fpdf.php");
require("../script/conexion.php");
$conexion = conectar(); 

$pdf= new FPDF();
$pdf->addpage("P","Letter");
$pdf->setfont("Arial","B","12");
$pdf->settextcolor(0,0,0);
$pdf->ln(5);
$pdf->cell(196, 10, "Reporte de Usuarios Registrados",0,0,"C");
$pdf->ln(20);
$pdf->SetFillColor(62, 127, 212);
$pdf->cell(35, 10, "idUsuario",0,0,"C",1);
$pdf->cell(35, 10, "Nombre",0,0,"C",1);
$pdf->cell(50, 10, "Apellido",0,0,"C",1);
$pdf->cell(60, 10, "Fecha de Registro",0,0,"C",1);
$pdf->ln(10);

$res=mysqli_query($conexion,"SELECT * from tb_usuarios where u_tipoCuenta='administrador'");
if($res)
{
	$pdf->setfont("Courier","","11");
	while($fila=mysqli_fetch_array($res))
	{
		$pdf->cell(35, 10, $fila['idUsuario'],0,0,"C");
		$pdf->cell(35, 10, $fila['u_nombre'],0,0,"C");
		$pdf->cell(50, 10, $fila['u_apellido'],0,0,"C");
		$pdf->cell(50, 10, $fila['u_fechaRegistro'],0,0,"C");
		$pdf->ln(5);		
	}	
}
else
{
	$pdf->cell(196, 10, "No hay datos en la consulta",0,0,"C");
}

$pdf->Output('DOCU.pdf','I'); 
$pdf->output();
?>