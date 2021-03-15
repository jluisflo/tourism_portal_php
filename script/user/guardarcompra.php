<?php 
    session_start();
    require "../conexion.php";
    $con=conectar();

    $depar=$_POST['depar'];
    $ciu=$_POST['ciu'];
    $dir=$_POST['dir'];
    $pais=$_POST['pais'];
    $numero=$_POST['numero'];
    $banco=$_POST['banco'];
    $ccv=$_POST['ccv'];
    $venci=$_POST['venci'];
    $cart = $_SESSION['cart'];
    $idCliente=$_SESSION['idCliente'];
	$pagar=0;
	$idpago=0;
  
	  foreach ($cart as $c) {
	    $query = mysqli_query($con, "select pa_precio from tb_paquetes where idPaquete='".$c['id']."'");
	    $item = mysqli_fetch_array($query);
	    $pagar = $pagar+($c['cant']*$item['pa_precio']);
	  }

    $pago=mysqli_query($con,"Insert into tb_pago(pag_monto, pag_tarjeta, pag_nombre, pag_ccv, pag_expira) 
    							 values('$pagar','$numero','$banco','$ccv','$venci')");

    $idpago= mysqli_insert_id($con);

    $factura=mysqli_query($con,"Insert into tb_factura(fa_idCliente, fa_idPago, fa_departamento, fa_ciudad, fa_direccion,fa_pais) values('$idCliente','$idpago','$depar','$ciu','$dir', '$pais')");

    $idfactura= mysqli_insert_id($con);


	foreach ($cart as $c) {

		$sqlprecio=mysqli_query($con,"select * from tb_paquetes where idPaquete='".$c['id']."'");
		$row=mysqli_fetch_array($sqlprecio);
		 $detalle=mysqli_query($con,"Insert into tb_detalle(de_idFactura, de_idProducto, de_cantidad, de_precio) values('".$idfactura."','".$c['id']."','".$c['cant']."','".$row['pa_precio']*$c['cant']."')");
	}

	unset($_SESSION['cart']);
    
    header("Location: ../../user/compraefectuada.php?fac=".$idfactura."");
?>