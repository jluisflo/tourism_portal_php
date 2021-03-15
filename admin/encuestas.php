<?php 
    require "../script/admin/configuracion.php";
    $con=conectar();
    $consulta=mysqli_query($con,"select * from tb_encuesta");
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Encuestas - Administrador</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <?php
            include 'inc/menu.inc';
        ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Encuestas Registradas</h1>
                        <div class="panel panel-default">
                            <div class="panel-heading">Funciones</div>
                            <div class="panel-body">
                                <div class="form-inline section">
                                  <div class="form-group">
                                    <button id="btnAgre" onclick="habilitar_agregar()" class="btn btn-info">Nuevo</button>
                                  </div>
                                  <div class="form-group">
                                    <button id="btnElim" onclick="habilitar_eliminar()" class="btn btn-danger" disabled>Eliminar</button>
                                  </div>
                                  <div class="form-group pull-right">
                                    <label>Buscar</label>
                                    <input type="text" name="q" id="q" class="form-control" id="search"onkeyup="doSearch();" >
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="section">
                        <table class="table table-bordered" id="resultados"  style="display: block; overflow-x: auto;"> 
                        <thead> 
                        <tr class="info"> 
                            <th>Seleccionar</th>
                            <th>Codigo</th> 
                            <th>Pregunta 1</th>
                            <th>Pregunta 2</th>
                            <th>Pregunta 3</th>
                            <th>Pregunta 4</th>
                            <th>Pregunta 5</th>
                            <th>Pregunta 6</th>
                            <th>Pregunta 7</th>
                            <th>Pregunta 8</th>
                            <th>Pregunta 9</th>
                            <th>Pregunta 10</th>
                            <th>Pregunta 11</th>
                            <th>Pregunta 12</th>
                            <th>Pregunta 13</th>
                            <th>Pregunta 14</th>
                            <th>Pregunta 15</th> 
                            <th>Pregunta 16</th> 
                        </tr> 
                        </thead> 
                        <tbody>
                        <?php
                            while($row=mysqli_fetch_array($consulta)){ 
                        ?>
                        <tr> 
                        <td>
                            <input type="radio" name="selectReg" 
                            onclick="pasarDatos('<?php echo $row['idEncuesta']; ?>')"/>
                        </td>
                        <td><?php echo $row['idEncuesta'];  ?></td> 
                        <td><?php echo $row['pregunta1']; ?></td> 
                        <td><?php echo $row['pregunta2']; ?></td> 
                        <td><?php echo $row['pregunta3']; ?></td> 
                        <td><?php echo $row['pregunta4']; ?></td> 
                        <td><?php echo $row['pregunta5']; ?></td> 
                        <td><?php echo $row['pregunta6']; ?></td> 
                        <td><?php echo $row['pregunta7']; ?></td> 
                        <td><?php echo $row['pregunta8']; ?></td> 
                        <td><?php echo $row['pregunta9']; ?></td> 
                        <td><?php echo $row['pregunta10']; ?></td> 
                        <td><?php echo $row['pregunta11']; ?></td> 
                        <td><?php echo $row['pregunta12']; ?></td> 
                        <td><?php echo $row['pregunta13']; ?></td> 
                        <td><?php echo $row['pregunta14']; ?></td> 
                        <td><?php echo $row['pregunta15']; ?></td> 
                        <td><?php echo $row['pregunta16']; ?></td> 
                        </tr> 
                        <?php
                            }
                        ?>
                         </tbody> 
                         </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->

        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
    <form enctype="multipart/form-data" id="form-destino" action="../script/admin/mantenimientoencuesta.php" method="POST" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                                <label>Id:</label>
                                <input type="text" class="form-control" id="id" name="id" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" name="operacion" id="btnoperacion" value="Insertar">
                </div>
          </div>
      </div>
    </form>
    <script type="text/javascript">

        function habilitar_agregar() {
            document.getElementById("form-destino").reset();
            window.open("encuesta.html","Ingresar Encuesta", 'width=600, height=600');
        }
        function habilitar_eliminar() {
            $("#form-destino").find('.modal-title').text("Eiminar Registro");
            $("#btnoperacion").val('Eliminar');
            $("#form-destino").modal('show');
        }
        function pasarDatos(id){
            document.getElementById('btnElim').disabled=false;
            document.getElementById('id').value=id;
        }
    </script>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/metisMenu.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../js/doSearch.js"></script>
</body>

</html>
