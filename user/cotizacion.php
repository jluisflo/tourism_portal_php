<?php
require '../script/conexion.php';
require 'config.php';
$con = conectar();

$sql = "select * from tb_cotizacion where co_cotizante='".$_SESSION['idCliente']."'";
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
  

   <div class="row">
   <div class="container">
    <div class="col s12 center">
      <ul class="tabs">
        <li class="tab col s6"><a class="active" href="#test1">Mis cotizaciones</a></li>
        <li class="tab col s6"><a  href="#test2">Nueva Cotizacion</a></li>
      </ul>
    </div>
    </div>
    <div id="test1" class="col s12">
       <div class="container">
  <div class="row">
<?php
  while ($row = mysqli_fetch_array($query)) {
?>


    <div class="col s12 m8">
      <div class="card blue accent-4">
        <div class="card-content white-text">
          <span class="card-title yellow-text"><strong> <?php echo $row['co_producto']; ?></strong></span>
          <p><?php echo $row['co_detalles']; ?>.</p>
        </div>
        <div class="card-action white-text">
          <i class="fa fa-calendar"></i> <?php echo $row['co_fecha']; ?><br>
          <i class="fa fa-phone"></i> <?php echo $row['co_telefono']; ?><br>
          <i class="fa fa-envelope"></i> <?php echo $row['co_email']; ?>
        </div>
      </div>
    </div>

            
<?php
  }
?>
  </div>
       </div>
    </div>
    <div id="test2" class="col s12">
    <div class="container">
      <h2 class="thin center"> Cotiza lo que desees</h2>
    <form id="cotizar" method="POST" class="col s12 m6 l8 offset-m2 offset-l2" action="../script/guardarCotizacion.php">
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="nombre">
          <label>Nombre o Empresa:</label>
        </div>
      </div> 
      <div class="row">
        <div class="input-field col s12 m6 l6">
          <input type="text" name="tel">
          <label>Telefono </label>
        </div>
        <div class="input-field col s12 m6 l6">
          <input type="email" name="email">
          <label>Email </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="servicio">
          <label>Servicio a cotizar:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea name="detalle" class="materialize-textarea"></textarea>
          <label>Detalle de cotizacion</label>
        </div>
      </div>
      
      <div class="center">
        <input type="submit" class="btn btn-large cyan accent-3" name="cotizacionprivada" value="Cotizar">
      </div>
    </form>
    </div>
    </div>
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