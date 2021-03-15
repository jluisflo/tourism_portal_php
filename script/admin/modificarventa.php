<?php
require '../conexion.php';
$con = conectar();

$idfactura = $_POST['idfactura'];
$idcliente=$_POST['idcliente'];
$dep = $_POST['dep'];
$ciu=$_POST['ciu'];
$pais=$_POST['pais'];
$dir=$_POST['dir'];

$idpago=$_POST['idpago'];
$tarjeta=$_POST['tarjeta'];
$nombre=$_POST['nombretarjeta'];
$ccv=$_POST['ccv'];
$venci=$_POST['venci'];

$producto = $_POST['producto'];
$cant = $_POST['cant'];

	 
$total=0;
$montonuevo=0;
foreach($producto as $key => $p ) {
  print "The ID is ".$p." and cantidad is ".$cant[$key].", thank you\n";
  $getPrecio = mysqli_query($con, "SELECT pa_precio from tb_paquetes where idPaquete='".$p."'");
  $precio = mysqli_fetch_array($getPrecio);
  $montonuevo = $precio['pa_precio']*$cant[$key];
  $total=$total+$montonuevo;

$guardarDetalle= mysqli_query($con, "UPDATE tb_detalle SET de_idProducto='$p', de_cantidad='".$cant[$key]."', de_precio='$montonuevo' WHERE de_idFactura='$idfactura' AND de_idProducto='$p'");
}

$guardarPago= mysqli_query($con, "UPDATE tb_pago SET pag_monto='$total', pag_tarjeta='$tarjeta', 
	pag_nombre='$nombre', pag_ccv='$ccv', pag_expira='$venci' WHERE idPago='$idpago'");

$guardarFactura= mysqli_query($con, "UPDATE tb_factura SET fa_departamento='$dep',
	fa_ciudad='$ciu', fa_direccion='$dir', fa_pais='$pais' WHERE idfactura='$idfactura'");

header("Location: ../../admin/ventas.php")
?>