<?php
  require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Turismo - Cuenta</title>
	
	<link rel="stylesheet" type="text/css" href="../css/materialize.css"> 
	<link rel="stylesheet" type="text/css" href="../css/style.css"> 
	<link rel="stylesheet" href="../css/font-awesome.min.css">
<style type="text/css">
  .filtroDestino{
    color: #fff;

  }
  .filtroDestino tr{
    height: 175px;
  }  
  .filtroDestino tr td{
    font-size: 3rem;
    cursor: pointer;
    text-align: center;
  }
    .filtroDestino tr td:hover{
      opacity: 0.8;
  }
</style>
</head>
<body>
  <?php
    include 'inc/navbar.inc';
  ?>
  
  <div class="container center">
    <h1 class="cyan-text">;)</h1>
  <h2 class="thin">Esta función estara pronto disponible</h2>
  </div>

  <?php
    include 'inc/footer.inc';
  ?>


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