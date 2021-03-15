<?php
require("fpdf/fpdf.php");
require("../script/conexion.php");
$con = conectar();

$fac=$_GET['fac'];

$sqlEncabezado = mysqli_query($con, "select * from tb_factura as f INNER JOIN tb_pago as p on f.fa_idPago=p.idPago where f.idFactura='".$fac."'");
$encabezado=mysqli_fetch_array($sqlEncabezado);

$sqlDetalle = mysqli_query($con, "select * from tb_detalle as d INNER JOIN tb_paquetes as p on d.de_idProducto=p.idPaquete where d.de_idFactura='".$fac."'");


class MIPDF Extends FPDF
{
	function Header(){
		$this-> Setfont('Arial', 'B', '14');
		$this-> cell(80);
		$this-> cell(50,10,'Reporte de Compra',1,0,'C');
		$this-> ln(30);	
	}
	

}
$pdf = new MIPDF('P', 'mm', 'Letter');
$pdf-> AddPage('P');
$pdf-> Setfont ('Arial','I',8);


$pdf->SetFillColor(255, 255, 255);
$pdf->cell(25, 10, "Codigo",0,0,"C",1);
$pdf->cell(10, 10, $encabezado['idFactura'],1,0,"C");

$pdf->cell(25, 10, "Cliente",0,0,"C",1);
$pdf->cell(25, 10, $encabezado['fa_idCliente'],1,0,"C");

$pdf->cell(40, 10, "Metodo de Pago",0,0,"C",1);
$pdf->cell(40, 10, "Tarjeta de Credito",1,0,"C");
$pdf->ln(15);

$pdf->SetFillColor(255, 255, 255);
$pdf->cell(25, 10, "Fecha",0,0,"C",1);
$pdf->cell(40, 10, $encabezado['fa_fecha'],1,0,"C");

$pdf->cell(25, 10, "Direccion",0,0,"C",1);
$pdf->cell(60, 10, $encabezado['fa_direccion'],1,0,"C");

$pdf->ln(20);
$pdf->SetFillColor(62, 127, 212);


$pdf->cell(15, 10, "Cod",1,0,"C",1);
$pdf->cell(80, 10, "Producto",1,0,"C",1);
$pdf->cell(25, 10, "Cantidad",1,0,"C",1);
$pdf->cell(30, 10, "Prec. Unitario",1,0,"C",1);
$pdf->cell(40, 10, "Total",1,0,"C",1);

$pdf->ln(10);

while ($row=mysqli_fetch_array($sqlDetalle) ){

  $pdf->cell(15, 10, $row['de_idProducto'], 1,0,"C");
  $pdf->cell(80, 10, $row['pa_descripcion'], 1,0,"C");
  $pdf->cell(25, 10, $row['de_cantidad'], 1,0,"C");
  $pdf->cell(30, 10, $row['pa_precio'], 1,0,"C");
  $pdf->cell(40, 10, $row['de_precio'], 1,0,"C");
$pdf->ln(5);
}
$pdf->ln(10);
$pdf->SetFillColor(95,158,160);

$pdf->cell(50, 10, "Total a pagar:",1,0,"C",1);
$pdf->cell(40, 10, "$".$encabezado['pag_monto'] , 1,0,"C");

$pdf->output();
?>