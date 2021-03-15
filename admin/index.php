<?php 
    require "../script/admin/configuracion.php";
    $con = conectar();

    $sqlDestinos = mysqli_query($con, "SELECT COUNT(*) FROM tb_destinos ");
    $sqlClientes = mysqli_query($con, "SELECT COUNT(*) FROM tb_usuarios WHERE u_tipoCuenta='normal' ");
    $sqlCotizaciones = mysqli_query($con, "SELECT COUNT(*) FROM tb_cotizacion ");
    $sqlEncuentas = mysqli_query($con, "SELECT COUNT(*) FROM tb_encuesta ");

    $grafica = mysqli_query($con, "SELECT c.cat_nombre, COUNT(d.des_idCategoria) fROM tb_destinos as d, tb_categoria as c WHERE d.des_idCategoria = c.idCategoria GROUP BY c.idCategoria");
    
    $cantDestinos = mysqli_fetch_array($sqlDestinos);
    $cantClientes = mysqli_fetch_array($sqlClientes);
    $cantCotizaciones = mysqli_fetch_array($sqlCotizaciones);
    $cantEncuestas = mysqli_fetch_array($sqlEncuentas);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tablero - Administrador</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            <?php 
            while($row = mysqli_fetch_array($grafica)){ 
            ?>
                ['<?php echo $row[0]; ?>', <?php echo $row[1]; ?>],
            <?php
            }
            ?>
        ]);

        // Set chart options
        var options = {'title':'Porcentaje de destinos por categoria',
                       'pieHole': 0.4,
                   };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>


</head>

<body>

    <div id="wrapper">

        <?php
            include 'inc/menu.inc';
        ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">     

                <h1 class="page-header">Tablero de Control</h1>
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $cantDestinos[0]; ?></div>
                                        <div>Total de Destinos!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="destinos.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $cantClientes[0]; ?></div>
                                        <div>Clientes Registrados!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="clientes.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $cantCotizaciones[0]; ?></div>
                                        <div>Cotizaciones!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="cotizaciones.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $cantEncuestas[0]; ?></div>
                                        <div>Encuestas!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="encuestas.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div><!-- /.row -->

                <div class="panel panel-default">
                    <div class="panel-heading">
                    Estadisticas de destinos
                    </div>
                    <div class="panel-body">
                        <div id="donutchart" style="width: 100%; height: 400px"></div>
                    </div>

                </div>
                        
                
            </div><!-- /.container-fluid -->

        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/metisMenu.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
</body>

</html>
