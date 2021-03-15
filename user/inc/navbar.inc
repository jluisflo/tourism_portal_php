<?php
$items=0;
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
  $cartItems=$_SESSION['cart'];
  foreach($cartItems as $c){  
      $items= $items+($c['cant']);
  }
}

?>

<ul id="cuenta" class="dropdown-content">
    <li><a href="#"> <i class="fa fa-close left"></i>Cerrar</a></li>
    <li><a href="cuenta.php"><i class="fa fa-user left"> </i>Mi cuenta</a></li>
    <li><a href="compras.php"><i class="fa fa-shopping-cart left"> </i>Mis compras</a></li>
    <li><a href="cotizacion.php"><i class="fa fa-edit left"> </i>Mis cotizaciones</a>
    <li><a href="../script/user/logout.php"><i class="fa fa-sign-out left"> </i>Cerrar sesión</a></li>
</ul>
<ul id="cuentaMobile" class="dropdown-content">
    <li><a href="#">Atras <i class="fa fa-angle-left right"> </i></a></li>
    <li><a href="cuenta.php"><i class="fa fa-user left"> </i>Mi cuenta</a></li>
    <li><a href="compras.php"><i class="fa fa-shopping-cart left"> </i>Mis compras</a></li>
    <li><a href="cotizacion.php"><i class="fa fa-edit left"> </i>Mis cotizaciones</a>
    <li><a href="../script/user/logout.php"><i class="fa fa-sign-out left"> </i>Cerrar sesión</a></li>
</ul> 

<nav class="blue-grey darken-2">
      <div class="nav-wrapper container">
          <a href="index.php" class="brand-logo amber-text">Turis<span class="cyan-text text-accent-3">go</span></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars"></i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="index.php">Destinos</i></a></li>
            <li><a href="paquetes.php">Todos los Paquetes</i></a></li>
            <li><a href="contactenos.php">Contactenos</i></a></li>
            <li class="amber"><a href="carrito.php"><i class="fa fa-shopping-cart left"> </i> Items: <?php echo $items;?></a></li>

            <li><a href="#" data-activates="cuenta" class="dropdown-button"><i class="fa fa-user left"></i>Hola, <?php echo $_SESSION['nomCliente']; ?> <i class="fa fa-caret-down right"></i></a></li>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a href="index.php">Destinos</i></a></li>
            <li><a href="paquetes.php">Todos los Paquetes</i></a></li>
            <li><a href="contactenos.php">Contactenos</i></a></li>
            <li class="amber"><a href="carrito.php"><i class="fa fa-shopping-cart left"> </i> Items: <?php echo $items;?></a></li>
            <li><a href="#" data-activates="cuentaMobile" class="dropdown-button"><i class="fa fa-user left"></i>Hola, <?php echo $_SESSION['nomCliente']; ?> <i class="fa fa-caret-down right"></i></a></li>
          </ul>
          
      </div>
</nav>