<?php
require("fpdf/fpdf.php");
require("../script/conexion.php");
$conexion = conectar();


$pdf= new FPDF();
$pdf->addpage("P","Letter");
$pdf->setfont("Arial","B","12");
$pdf->settextcolor(0,0,0);
$pdf->ln(5);
$pdf->cell(196, 10, "Reporte de Cotizaciones",0,0,"C");
$pdf->ln(20);
$pdf->SetFillColor(62, 127, 212);
$pdf->cell(15, 10, "ID",0,0,"C",1);
$pdf->cell(40, 10, "nombre",0,0,"L",1);
$pdf->cell(50, 10, "email",0,0,"L",1);
$pdf->cell(30, 10, "telefono",0,0,"L",1);
$pdf->cell(55, 10, "Producto",0,0,"L",1);
$pdf->ln(10);

$res=mysqli_query($conexion,"SELECT * from tb_cotizacion");
if($res)
{
	$pdf->setfont("Courier","","11");
	while($fila=mysqli_fetch_array($res))
	{
		$pdf->cell(15, 10, $fila['idCotizacion'],0,0,"C");
		$pdf->cell(40, 10, $fila['co_nombre'],0,0,"L");
		$pdf->cell(50, 10, $fila['co_email'],0,0,"L");
		$pdf->cell(30, 10, $fila['co_telefono'],0,0,"L");
		$pdf->cell(55, 10, $fila['co_producto'],0,0,"L");
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