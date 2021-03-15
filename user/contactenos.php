<?php
require '../script/conexion.php';
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>PROYECTO DPWEB - Principal</title>
	
	<link rel="stylesheet" type="text/css" href="../css/materialize.css"> 
	<link rel="stylesheet" type="text/css" href="../css/style.css"> 
	<link rel="stylesheet" href="../css/font-awesome.min.css">

</head>
<body>
  <?php
    include 'inc/navbar.inc';
  ?>
  <div class="container">
   <div class="row">
   <div class="section">
   <h2 class="thin center"> Tu opinion es importante </h2>
   </div>
    <form id="contacto" class="col s12 m6 l6 offset-m3 offset-l3" method="POST" action="../script/guardarContacto.php">
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="nombre">
          <label>Nonbre o Empresa: </label>
        </div>
      </div>    
      <div class="row">
        <div class="input-field col s12">
          <input type="email" name="email">
          <label>Email: </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="asunto">
          <label>Asunto: </label>
        </div>
      </div>  
      <div class="row">
        <div class="input-field col s12">
          <textarea name="mensaje" class="materialize-textarea"></textarea>
          <label>Mensaje</label>
        </div>
      </div>
      
      <div class="center">
        <input type="submit" class="btn btn-large cyan accent-3" name="contactenosprivado" value="Enviar">
      </div>
    </form>
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
  $("#contacto").validate({
    rules: {
      nombre:{
        required: true
      },
      asunto:{
        required: true
      },
      email: {
        required: true,
        email: true
      },
      mensaje: {
        required: true
      }
    }
  });
</script>
</body>
</html>