<?php
require 'script/conexion.php';

if(!isset($_GET['d']) || empty($_GET['d']))
{
  header("Location: busqueda.php");
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
	
	<link rel="stylesheet" type="text/css" href="css/materialize.css"> 
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="stylesheet" href="css/font-awesome.min.css">
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


<ul id="dropEntregaLarge" class="dropdown-content">
        <li><a href="historia.html">Historia</a></li>
        <li><a href="equipo.html">Equipo</a></li>
        <li><a href="plataformas.html">Plataformas Web</a></li>
        <li><a href="estructuras.html">Estructuras Web</a></li>
        <li><a href="maquetacion.html">Maquetacion Web</a></li>
        <li><a href="info.html">Otra Información</a></li>
        <li><a href="glosario.html">Glosario</a></li>
    </ul>
    <ul id="dropEntregaMobile" class="dropdown-content">
      <li><a href="#">Atras <span class="fa fa-angle-left right"> </span></a></li>
        <li><a href="historia.html">Historia</a></li>
        <li><a href="equipo.html">Equipo</a></li>
        <li><a href="plataformas.html">Plataformas Web</a></li>
        <li><a href="estructuras.html">Estructuras Web</a></li>
        <li><a href="maquetacion.html">Maquetacion Web</a></li>
        <li><a href="info.html">Otra Información</a></li>
        <li><a href="glosario.html">Glosario</a></li>
    </ul> 

  <nav class="blue-grey darken-2">
      <div class="nav-wrapper container">
          <a href="index.html" class="brand-logo amber-text">Turis<span class="cyan-text text-accent-3">go</span></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars"></i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="busqueda.php"><i class="fa fa-search right"> </i> Destinos</a></li>
            <li><a href="cotizacion.php"> Cotizar</a></li>
            <li><a href="encuesta.html">Encuesta</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropEntregaLarge">Primera Entrega <i class="fa fa-caret-down right"></i></a></li>
            <li><a href="contactenos.html">Contactenos</a></li>
            <li><a href="login.html">Iniciar Sesión | Registrarme</a></li>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a href="busqueda.php"><i class="fa fa-search right"> </i> Destinos</a></li>
            <li><a href="cotizacion.php"> Cotizar</a></li>
            <li><a href="encuesta.html">Encuesta</a></li>
            <li><a class="dropdown-button" href="#" data-activates="dropEntregaMobile">1° Entrega <i class="fa fa-caret-down right"> </i></a></li>
            <li><a href="contactenos.html">Contactenos</a></li>
            <li><a href="login.html">Iniciar Sesión | Registrarme</a></li>
          </ul>
          
      </div>
    </nav>
</div>

    <div class="parallax-container valign-wrapper" style="height: 400px">
      <div class="row center">
      <h1 class="white-text light section"><?php echo $destino['des_nombre']; ?></h1>
      </div>
      <div class="parallax">
      <img src="img/destinos/<?php echo $destino['des_imagen']; ?>">
      </div>
      <div class="filtro"></div>
    </div>

  <div class="container">
    <div class="row">

    <?php
      while ($row=mysqli_fetch_array($query)) {

    ?>
        <div class="col s12 m4 l4">
          <div class="card cyan white-text">
            <div class="card-content">
            <span class="card-title"><strong><?php echo $row['pa_titulo']; ?></strong></span>
              <p><?php echo $row['pa_descripcion']; ?></p>
            </div>
            <div class="card-action center">
              <a href="carritoinfo.html" class="btn blue">Agregar a Carrito</a>
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
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/init.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>

</body>
</html>