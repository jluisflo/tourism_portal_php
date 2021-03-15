<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Adminstrador</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['nomAdmin']; ?> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-user fa-fw"></i> Perfil de Usuario</a>
                </li>
                <li class="divider"></li>
                <li><a href="../script/admin/logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Tablero</a>
                </li>
                <li>
                    <a href="destinos.php"><i class="fa fa-tags fa-fw"></i> Destinos</a>
                </li>
                <li>
                    <a href="paquetes.php"><i class="fa fa-map fa-fw"></i> Paquetes Turisticos</a>
                </li>
                <li>
                    <a href="ventas.php"><i class="fa fa-money fa-fw"></i> Ventas</a>
                </li>
                <li>
                    <a href="categorias.php"><i class="fa fa-table fa-fw"></i> Categorias</a>
                </li>
                <li>
                    <a href="clientes.php"><i class="fa fa-users fa-fw"></i> Clientes</a>
                </li>
                <li>
                    <a href="cotizaciones.php"><i class="fa fa-pencil fa-fw"></i> Cotizaciones</a>
                </li>
                <li>
                    <a href="contactos.php"><i class="fa fa-comments fa-fw"></i> Contactos</a>
                </li>
                <li>
                    <a href="encuestas.php"><i class="fa fa-check-circle-o fa-fw"></i> Encuesta</a>
                </li>
                <li>
                    <a><i class="fa fa-cog fa-fw"></i> Administración<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="active" href="administradores.php">Usuarios administradores</a>
                        </li>
                        <li>
                            <a class="active" href="diagrama.php">Diagrama de Base de Datos</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="../script/admin/logout.php"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
<?php
$queryPerfil = mysqli_query($con, "SELECT * FROM tb_usuarios WHERE idUsuario='".$_SESSION['idAdmin']."'");
$row = mysqli_fetch_array($queryPerfil);
?>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Perfil de Administrador</h4>
      </div>
      <div class="modal-body">
        <div class="list-group">
          <div class="list-group-item">
            <h4 class="list-group-item-heading">ID:</h4>
            <p class="list-group-item-text"><?php echo $row['idUsuario']; ?></p>
          </div>
          <div class="list-group-item">
            <h4 class="list-group-item-heading">Nombre completo:</h4>
            <p class="list-group-item-text"><?php echo $row['u_nombre']." ".$row['u_apellido']; ?></p>
          </div>
          <div class="list-group-item">
            <h4 class="list-group-item-heading">Usuario de Cuenta:</h4>
            <p class="list-group-item-text"><?php echo $row['u_usuario']; ?></p>
          </div>
          <div class="list-group-item">
            <h4 class="list-group-item-heading">Fecha en que se registro:</h4>
            <p class="list-group-item-text"><?php echo $row['u_fechaRegistro']; ?></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>