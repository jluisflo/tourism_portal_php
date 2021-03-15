<?php
require("fpdf/fpdf.php");
require("../script/conexion.php");
$conexion = conectar();

$pdf= new FPDF();
$pdf->addpage("P","Letter");
$pdf->setfont("Arial","B","12");
$pdf->settextcolor(0,0,0);
$pdf->ln(5);
$pdf->cell(196, 10, "Reporte de Categorias",0,0,"C");
$pdf->ln(20);
$pdf->SetFillColor(62, 127, 212);
$pdf->cell(26, 10, "Codigo",1,0,"C",1);
$pdf->cell(125, 10, "Nombre",1,0,"C",1);
$pdf->ln(10);
//Extraer los datos de la tabla clientes
$res=mysqli_query($conexion,"SELECT * from tb_categoria order by idCategoria");
$total=mysqli_num_rows($res);
if($res)
{
	$pdf->setfont("Courier","","11");
	while($fila=mysqli_fetch_array($res))
	{
		$pdf->cell(26, 10, $fila['idCategoria'],0,0,"C");
		$pdf->cell(125, 10, $fila['cat_nombre'],0,0,"C");
		$pdf->ln(5);		
	}
	//Imprimir el total
	$pdf->ln(25);
	$pdf->setfont("Arial","B","16");
	$pdf->settextcolor(55,100,25);
	$pdf->cell(196, 10, "Total: ".$total,1,0,"L");
}
else
{
	$pdf->setfont("Arial","B","10");
	$pdf->settextcolor(55,100,45);
	$pdf->cell(196, 10, "No hay datos en la consulta",0,0,"C");
}

$pdf->Output('DOCU.pdf','I'); 
$pdf->output();
?>