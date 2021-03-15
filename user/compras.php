<?php
require '../script/conexion.php';
require 'config.php';
$con = conectar();

$sql = "Select * FROM tb_factura as f INNER JOIN tb_pago as p on f.fa_idPago=p.idPago WHERE f.fa_idCliente='".$_SESSION['idCliente']."'";

$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Turismo - Cotizacion de Usuario</title>
	
	<link rel="stylesheet" type="text/css" href="../css/materialize.css"> 
	<link rel="stylesheet" type="text/css" href="../css/style.css"> 
	<link rel="stylesheet" href="../css/font-awesome.min.css">

</head>
<body>
  <?php
    include 'inc/navbar.inc';
  ?>
  

<div class="container">
<div class="section">
  <h4 class="center blue-text light">Mis Compras</h4>
</div>  
<div class="row">
<?php
  while ($row = mysqli_fetch_array($query)) {
?>


    <div class="col s12 m6">
      <div class="card cyan darken-1">
        <div class="card-content white-text">
          <span class="card-title"><strong>Monto: $<?php echo $row['pag_monto']; ?></strong></span>
          <p><i class="fa fa-calendar"></i> <?php echo $row['fa_fecha']; ?></p>
        </div>
        <div class="card-action">
          <a href="compraefectuada.php?fac=<?php echo $row['idFactura']; ?>" class="btn btn amber">Ver detalles</a>
        </div>
      </div>
    </div>

            
<?php
  }
?>

      </div>
  </div>

  <footer class="page-footer blue-grey darken-3">
    <div class="container center padding-foot">
      <i class="fa fa-heart fa-2x grey-text text-lighten-1"></i><br>
      <h5 class="light blue-grey-text text-lighten-3">Made in El Salvador</h5>
    <hr width="80%">
    <hr width="80%">
    <h5 class="light blue-grey-text text-lighten-2">Proyecto en desarrollo con la iniciativa de alumnos UTEC con fines académicos</h5>
    <hr width="80%">
    <hr width="80%">
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2017 Desarrolo web
      <a class="grey-text text-lighten-4 right" href="http://www.utec.edu.sv">Utec</a>
      </div>
    </div>
  </footer>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>
    <script type="text/javascript" src="../js/init.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.js"></script>

<script type="text/javascript">
  jQuery.validator.setDefaults({
      errorClass: "invalid",
      pendingClass: "pending",
      validClass: "valid",
      errorElement: "span",
  });
  $("#cotizar").validate({
    rules: {
      nombre:{
        required: true
      },
      apellido:{
        required: true
      },
      tel:{
        required: true,
        number: true,
        minlength: 8
      },
      email: {
        required: true,
        email: true
      },
      servicio: {
        required: true
      },
      detalle:{
        required: true
      }
    }
  });
</script>
</body>
</html>