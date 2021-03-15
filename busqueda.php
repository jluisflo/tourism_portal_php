<?php
require 'script/conexion.php';
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
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PROYECTO DPWEB - Principal</title>
  
  <link rel="stylesheet" type="text/css" href="css/materialize.css"> 
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
  <link rel="stylesheet" href="css/font-awesome.min.css">

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

<form method="GET" action="busqueda.php" class="cyan">
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
      <div class="section center">
    <?php

      while ($row = mysqli_fetch_array($destinos)) {
        
    ?>

       <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image">
              <img src="img/destinos/<?php echo $row['des_imagen'];?>" height="169">
            </div>
            <div class="card-content">
              <p class="truncate uppercase content">
              <?php echo $row['des_nombre'];?><br>               
              </p>
            </div>
            <div class="card-action center">
              <a href="paquetesdestino.php?d=<?php echo $row['idDestino'];?>" class="btn cyan accent-3">Paquetes Turisticos</a>
            </div>
          </div>
        </div>

    <?php

      }

    ?>

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
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/init.js"></script>
    <script type="text/javascript" src="js/typed.js"></script>
</body>
</html>