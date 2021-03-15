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
  $sql="select * from tb_paquetes as p inner join tb_destinos as d on p.pa_idDestino=d.idDestino 
  where d.des_idCategoria='".$_GET['c']."'";
}else{
  $sql="select * from tb_paquetes";
}

$paquetes=mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Paquetes de Destino Turistico</title>
	
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
<form method="GET" action="paquetes.php" class="teal darken-2">
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
<br>
    <?php
      if(mysqli_num_rows($paquetes)==0)
      {
    ?>
      <h1 class="section center blue-text blue lighten-4">No hay paquetes :)</h1>
    <?php
      }
    ?>

    <?php
      while ($row=mysqli_fetch_array($paquetes)) {
        $found = false;
        if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])){
          $carrito = $_SESSION["cart"];
          foreach ($carrito as $c) {
            if($c["id"]==$row['idPaquete']){
              $found=true;
              break;
            }
          }
        }
    ?>
<div class="col s12 m6 l6">
          <div class="card teal lighten-1 white-text">       
            <div class="card-content" height="175px">
            <span class="card-title"><strong><?php echo $row['pa_titulo']; ?></strong></span>
            <span class="card-title">$<?php echo $row['pa_precio']; ?> x persona.</span>
              <p><?php echo $row['pa_descripcion']; ?></p>
            </div>
            <div class="card-action center">
            <?php
            if($found){ 
            ?>
              <a href="../script/user/deleteItem.php?id=<?php echo $row['idPaquete']; ?>" class="btn red">
              <i class="fa fa-trash left"></i>Eliminar de Carrito</a>
            <?php
            }else{
            ?>
              <a href="../script/user/addItem.php?id=<?php echo $row['idPaquete']; ?>" class="btn amber">
              <i class="fa fa-cart-plus left"></i>Agregar a Carrito</a>
            <?php
            }
            ?>
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
<script type="text/javascript" src="../js/jquery.validate.js"></script>

</body>
</html>