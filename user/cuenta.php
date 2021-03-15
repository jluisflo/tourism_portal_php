<?php
require '../script/conexion.php';
require 'config.php';
$con = conectar();
$id = $_SESSION['idCliente'];
$datos = mysqli_query($con, "SELECT * FROM tb_usuarios WHERE idUsuario ='$id'");
$row = mysqli_fetch_array($datos);
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
</head>
<body>
  <?php
    include 'inc/navbar.inc';
  ?>
 <form method="post" action="../script/user/editarcuenta.php"> 
  <div class="container">
    <div class="card">
      <div class="section center">
        <img src="../img/user.png" class="circle"><br><br>
        <a href="#" class="waves-effect" onclick="habilitar();">Editar Perfil</a>
        <br>
        <br>
        <div class="divider"></div>
      </div>
      <div class="row">

        <input style="display: none;" type="text" id="id" name="id" value="<?php echo $row['idUsuario']; ?>" readonly>
  
        <div class="col s6">
        <div class="card-panel" style="height: 175px">
        <h6 class="thin">Nombre:</h6>
        <input type="text" id="nom" name="nom" value="<?php echo $row['u_nombre']; ?>" required="" disabled>
        <h5 class="light"></h5>
        </div>
        </div>
        <div class="col s6">
        <div class="card-panel" style="height: 175px">
        <h6 class="thin">Apellido:</h6>
        <input type="text" id="ape" name="ape" value="<?php echo $row['u_apellido']; ?>" required="" disabled>
        </div>
        </div>
        <div class="col s6">
        <div class="card-panel" style="height: 175px">
        <h6 class="thin">Usuario:</h6>
        <input type="text" id="user" name="user" value="<?php echo $row['u_usuario']; ?>" required="" disabled>
        </div>
        </div>
        <div class="col s6" id="panel-pass" style="display: none;">
        <div class="card-panel" style="height: 175px">
        <h6 class="thin">Contraseña:</h6>
        <input type="password" id="pass" name="pass" value="<?php echo $row['u_clave']; ?>" required="" disabled>
        </div>
        </div>
      </div>
      <div class="section center">
        <input type="submit" id="btnguardar" value="Guardar" class="btn btn-large cyan" style="display: none;">
      </div>
    </div>
  </div>
</form>
  <?php
    include 'inc/footer.inc';
  ?>



<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/init.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript">
  function habilitar(){
    $("#nom").removeAttr('disabled');
    $("#ape").removeAttr('disabled');
    $("#user").removeAttr('disabled');
    $("#pass").removeAttr('disabled');
    $("#nom").focus();
    $("#panel-pass").show();
    $("#btnguardar").show();
  }
</script>
</body>
</html>