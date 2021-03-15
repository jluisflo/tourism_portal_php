<?php
require '../script/conexion.php';
require 'config.php';
$con = conectar();
if (!isset($_GET['fac'])) {
  header("location: index.php");
}

$fac=$_GET['fac'];

$sqlEncabezado = mysqli_query($con, "select * from tb_factura as f INNER JOIN tb_pago as p on f.fa_idPago=p.idPago where f.idFactura='".$fac."'");
$encabezado=mysqli_fetch_array($sqlEncabezado);

$sqlDetalle = mysqli_query($con, "select * from tb_detalle as d INNER JOIN tb_paquetes as p on d.de_idProducto=p.idPaquete where d.de_idFactura='".$fac."'");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Compra Realizada</title>
	
	<link rel="stylesheet" type="text/css" href="../css/materialize.css"> 
	<link rel="stylesheet" type="text/css" href="../css/style.css"> 
	<link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body>
  <?php
    include 'inc/navbar.inc';
  ?>
  
  <div class="container center">
<div class="section">
  <h4 class="center blue-text light">Detalle por compra</h4>
  <br>
  <a href="../reportes/reportecompra.php?fac=<?php echo $fac;?>" class="btn btn-primary" target="_blank" onClick="window.open(this.href, this.target, 'width=800,height=600'); return false;">Imprimir Factura</a>
  </div>
<br><br>
  <section>
      <div class="row">
        <div class="col s12 m3 l3">
          Codigo factura: <strong><?php echo $encabezado['idFactura']; ?></strong> 
        </div>
        <div class="col s12 m3 l3">
          Codigo de cliente: <strong><?php echo $encabezado['fa_idCliente']; ?></strong>
        </div>
        <div class="col s12 m3 l3">
          Metodo de pago: <strong>Tarjeta de Credito</strong>
        </div>
        <div class="col s12 m3 l3">
          Fecha: <strong><?php echo $encabezado['fa_fecha']; ?></strong> 
        </div>
      </div>
      <div class="row">
        <div class="col s12 m6 l6">
          Dirección:
          <strong><?php echo $encabezado['fa_direccion']; ?>, <?php echo $encabezado['fa_ciudad']; ?>,
          <?php echo $encabezado['fa_departamento']; ?>, <?php echo $encabezado['fa_pais']; ?></strong> 
          </div>
      </div>
  </section>

      <table class="striped center">
        <thead>
          <tr class="blue white-text">
          
              <th class="center">ID Producto</th>
              <th class="center">Producto</th>
              <th class="center">Cantidad</th>
              <th class="center">precio Unitario</th>
              <th class="center">Precio Total</th>
              
          </tr>
        </thead>

        <tbody>
        <?php
            while ($row=mysqli_fetch_array($sqlDetalle) ){
        ?>          


            <tr>
              <td class="center"><?php echo $row['de_idProducto']; ?></td>
              <td class="center"><?php echo $row['pa_descripcion']; ?></td>
              <td class="center"><?php echo $row['de_cantidad']; ?></td>
              <td class="center"><?php echo $row['pa_precio']; ?></td>
              <td class="center"><?php echo $row['de_precio']; ?></td>
            </tr>

        <?php
          }
        ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td class="blue darken-3 white-text center">Monto</td>
          <td class="blue darken-3 white-text center">$<?php echo $encabezado['pag_monto']; ?></td>
        </tr>
        </tbody>

      </table>
      <div class="center section">
        <a href="compras.php" class="btn btn-large amber"><i class="fa fa-check left"></i>Ver todas mis compras</a>
      </div>
      </div>

  <?php
    include 'inc/footer.inc';
  ?>


<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/init.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript">
  function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if ((charCode < 48 || charCode > 57))
        return false;

    return true;
}
</script>

<script type="text/javascript">
    function actualizar(input, id){
       var cant = document.getElementById(input).value;
       location.href ="../script/user/updateItem.php?id="+id+"&cant="+cant+"";
    }
  </script>
<script type="text/javascript">
  jQuery.validator.setDefaults({
      errorClass: "invalid",
      pendingClass: "pending",
      validClass: "valid",
      errorElement: "span",
  });
  $("#login").validate({
    rules: {
      email: {
        required: true,
        email: true
      },
      contraseña: {
        required: true
      }
    }
  });

</script>
</body>
</html>