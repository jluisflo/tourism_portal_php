<?php
require '../script/conexion.php';
require 'config.php';

if(!isset($_GET['d']) || empty($_GET['d']))
{
  header("Location: index.php");
}
else
{
  $con = conectar();
  $sqldestino=mysqli_query($con, "SELECT * FROM tb_destinos where idDestino='".$_GET['d']."'");
  $destino=mysqli_fetch_array($sqldestino);

  $sql="SELECT * FROM tb_paquetes WHERE pa_idDestino='".$_GET['d']."'";
  $query = mysqli_query($con, $sql);
}

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
    <div class="parallax-container valign-wrapper" style="height: 400px">
      <div class="row center">
      <h1 class="white-text light section"><?php echo $destino['des_nombre']; ?></h1>
      </div>
      <div class="parallax">
      <img src="../img/destinos/<?php echo $destino['des_imagen']; ?>">
      </div>  
      <div class="filtro"></div>    
    </div>

  <div class="container">
    <div class="row">
    <br>

    <?php
      while ($row=mysqli_fetch_array($query)) {
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
          <div class="card indigo lighten-1 white-text">       
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