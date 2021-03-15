<?php
require("fpdf/fpdf.php");
require("../script/conexion.php");
$conexion = conectar();

$pdf= new FPDF();
$pdf->addpage("P","Letter");
$pdf->setfont("Arial","B","12");
$pdf->settextcolor(0,0,0);
$pdf->ln(5);
$pdf->cell(196, 10, "Reporte de Formulario de contacto",0,0,"C");
$pdf->ln(20);
$pdf->SetFillColor(62, 127, 212);
$pdf->cell(15, 10, "ID",0,0,"L",1);
$pdf->cell(25, 10, "nombre",0,0,"L",1);
$pdf->cell(40, 10, "email",0,0,"L",1);
$pdf->cell(40, 10, "Asunto",0,0,"L",1);
$pdf->cell(60, 10, "Mensaje",0,0,"L",1);
$pdf->ln(10);

$res=mysqli_query($conexion,"SELECT * from tb_contacto");
if($res)
{
	$pdf->setfont("Courier","","11");
	while($fila=mysqli_fetch_array($res))
	{
		$pdf->cell(15, 10, $fila['idContacto'],0,0,"L");
		$pdf->cell(25, 10, $fila['con_nombre'],0,0,"L");
		$pdf->cell(40, 10, $fila['con_email'],0,0,"L");
		$pdf->cell(40, 10, $fila['con_asunto'],0,0,"L");
		$pdf->cell(60, 10, $fila['con_mensaje'],0,0,"L");
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