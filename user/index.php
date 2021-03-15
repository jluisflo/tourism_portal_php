<?php
require '../script/conexion.php';
require 'config.php';

$con = conectar();

$categorias="";
 $sql_categorias = mysqli_query($con, "Select * from tb_categoria");
  while ($row = mysqli_fetch_array($sql_categorias)) {
      $categorias .= "<option value='".$row['idCategoria']."'>".$row['cat_nombre']."</option>";
  }

if(isset($_GET['c']) && !empty($_GET['c'])){
  $sql="select * from tb_destinos as d inner join tb_categoria as c on d.des_idCategoria=c.idCategoria 
  where d.des_idCategoria='".$_GET['c']."'";
}else{
  $sql="select * from tb_destinos";
}

$destinos=mysqli_query($con, $sql);
?>
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
  
<form method="GET" action="index.php" class=" indigo lighten-1">
  <div class="container">
  <div class="row">
    <div class="col s12 m6 l6 offset-m3 offset-l3">
      <div class="input-field">
        <h5 class="white-text center">Categoria</h5>
        <select name="c" class="white">
          <option value="" selected>Seleccione Categorias</option>
          <?php echo $categorias; ?>
        </select>
      </div>
    </div>
  </div>
  <div class="center section">
    <input type="submit" class="btn btn-large orange" name="buscar" value="Buscar">
  </div>
  </div>
</form>

  <div class="container">
    <div class="row">
    <h3 class="thin">Todos los Destinos:</h3>
    <div class="section center">
    <!--  <a href="../reporteDestinos.php" class="btn blue-grey center" target="popup" onClick="window.open(this.href, this.target, 'width=700,height=420'); return false;"><i class="fa fa-print"></i> Generar Reporte</a>
    --> 
      </div>


    <?php
      if(mysqli_num_rows($destinos)==0)
      {
    ?>
      <h1 class="section center blue-text blue lighten-4">No hay destinos :)</h1>
    <?php
      }
    ?>
    <?php
      while ($row = mysqli_fetch_array($destinos)) {
        
    ?>

         <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image">
              <img src="../img/destinos/<?php echo $row['des_imagen'];?>" height="169">
            </div>
            <div class="card-content">
              <p class="truncate uppercase content">
              <?php echo $row['des_nombre'];?><br>               
              </p>
            </div>
            <div class="card-action center">
              <a href="paquetesdestino.php?d=<?php echo $row['idDestino'];?>" class="btn blue">Paquetes Turisticos</a>
            </div>
          </div>
        </div>

    <?php
      }
    ?>
   
  </div>
  </div>

  <?php
    include 'inc/footer.inc';
  ?>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/init.js"></script>

</body>
</html>