<?php
require '../script/conexion.php';
require 'config.php';
$con = conectar();
if (isset($_SESSION['cart'])) {
  $cart=$_SESSION['cart'];
}

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

  <h4 class="center blue-text light">Carrito de compras</h4>

  <?php
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
  ?>
      <table class="striped center">
        <thead>
          <tr class="blue white-text">
              <th class="center" colspan="2">Opciones</th>
              <th class="center">ID</th>
              <th class="center">Producto</th>
              <th class="center">Cantidad</th>
              <th class="center">precio Unitario</th>
              <th class="center">Precio Total</th>
              
          </tr>
        </thead>

        <tbody>
        <?php

        $totalpagar=0;
          foreach ($cart as $c) {
            $query=mysqli_query($con,"select * from tb_paquetes where idPaquete='".$c['id']."'");
            $row=mysqli_fetch_array($query);
            $totalpagar=$totalpagar+($row['pa_precio']*$c['cant']);
            $input="cant".$c['id']."";
        ?>          


            <tr>
              <td class="center"><a href="#" onclick="actualizar('<?php echo $input;?>','<?php echo $c['id'];?>');">Actualizar</a></td>
              <td class="center"><a href="../script/user/deleteItem.php?id=<?php echo $c['id']; ?>">Eliminar</a></td>
              <td class="center"><?php echo $c['id']; ?></td>
              <td class="center"><?php echo $row['pa_titulo']; ?></td>
              <td class="center"><input id="cant<?php echo $c['id']; ?>" style="width: 60px" type="number" min="1" step="1" value="<?php echo $c['cant']; ?>" onkeypress="return isNumberKey(event)"></td>
              <td class="center">$<?php echo $row['pa_precio']; ?></td>
              <td class="center">$<?php echo $row['pa_precio']*$c['cant']; ?></td>
              
            </tr>

        <?php
          }
        ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td class="blue darken-3 white-text center">Total a pagar:</td>
          <td class="blue darken-3 white-text center">$<?php echo $totalpagar; ?></td>
        </tr>
        </tbody>

      </table>
      <div class="center section">
        <a href="procesarcompra.php" class="btn btn-large amber"><i class="fa fa-check left"></i>Precesar Compra</a>
      </div>

    <?php
      }else{ 
    ?>
      <h3 class="section center blue-text blue lighten-4">Aun no hay agregado a su carrito de compras :)</h3>
    <?php
    }
    ?>
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