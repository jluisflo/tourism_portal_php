<?php 
    require "../script/admin/configuracion.php";
    $con=conectar();
    $destinos = "";

    $query_paquetes= "select * from tb_paquetes as p INNER JOIN tb_destinos as d on p.pa_idDestino = d.idDestino";
    
    $sql_paquetes = mysqli_query($con, $query_paquetes);

    $sql_destinos = mysqli_query($con, "Select * from tb_destinos");
    while ($row = mysqli_fetch_array($sql_destinos)) {
        $destinos .= "<option value='".$row['idDestino']."'>".$row['des_nombre']."</option>";
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Paquetes turisticos - Administrador</title>

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
                        <h1 class="page-header">Destinos Registrados</h1>
                        <div class="panel panel-default">
                            <div class="panel-heading">Funciones</div>
                            <div class="panel-body">
                                <div class="form-inline section">
                                  <div class="form-group">
                                    <button id="btnAgre" onclick="habilitar_agregar()" class="btn btn-info">Nuevo</button>
                                  </div>
                                  <div class="form-group">
                                    <button id="btnModi" onclick="habilitar_modificar()" class="btn btn-warning" disabled>Modificar</button>
                                  </div>
                                  <div class="form-group">
                                    <button id="btnElim" onclick="habilitar_eliminar()" class="btn btn-danger" disabled>Eliminar</button>
                                  </div>
                                  <div class="form-group">
                                  <a href="../reportes/reportepaquetes.php" class="btn btn-primary" target="_blank" onClick="window.open(this.href, this.target, 'width=800,height=600'); return false;">Generar Reporte</a>
                                  </div>
                                  <div class="form-group pull-right">
                                    <label>Buscar</label>
                                    <input type="text" name="q" id="q" class="form-control" id="search"onkeyup="doSearch();" >
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="section">
                        <table class="table table-bordered" id="resultados" style="display: block; overflow-x: auto;"> 
                        <thead> 
                        <tr class="info"> 
                            <th>Seleccionar</th>
                            <th>Codigo</th> 
                            <th>Nombre</th> 
                            <th>Descripcion</th> 
                            <th>Precio</th>
                            <th>Destino</th>
                        </tr> 
                        </thead> 
                        <tbody>
                        <?php
                            while($row=mysqli_fetch_array($sql_paquetes)){ 
                        ?>
                        <tr> 
                        <td>
                            <input type="radio" name="selectReg" 
                                onclick="pasarDatos('<?php echo $row['idPaquete']; ?>',
                                    '<?php echo $row['pa_titulo']; ?>',
                                    '<?php echo $row['pa_descripcion']; ?>',
                                    '<?php echo $row['pa_precio']; ?>',
                                    '<?php echo $row['idDestino']; ?>'
                                    );
                                ">
                        </td>
                        <td><?php echo $row['idPaquete']; ?></td> 
                        <td><?php echo $row['pa_titulo']; ?></td> 
                        <td><?php echo $row['pa_descripcion']; ?></td> 
                        <td><?php echo $row['pa_precio']; ?></td>
                        <td><?php echo $row['des_nombre']; ?></td>

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


    <form enctype="multipart/form-data" id="form-destino" action="../script/admin/MantenimientoPaquetes.php" method="POST" class="modal fade" tabindex="-1" role="dialog">
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
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Destino del paquete:</label>
                                <select id="destino" name="destino" class="form-control" required>
                                  <option value="">Seleccionar</option>
                                  <?php echo $destinos; ?>
                                </select>
                        </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Nombre del paquete:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Descripcion:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Precio del paquete por persona:</label>
                                <input type="number" class="form-control" id="precio" name="precio" min="0.00" 
                                max="10000.00" step="0.01" required/>
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
            $("select#municipio option").remove(); 
            $("#form-destino").find('.modal-title').text("Agregar Registro");
            $("#btnoperacion").val('Insertar');
            $("#form-destino").modal('show');
            $('#img').addAttr("required");
        }
        function habilitar_modificar() {
            $("#form-destino").find('.modal-title').text("Modificar Registro");
            $("#btnoperacion").val('Modificar');
            $("#form-destino").modal('show');
            $('#img').removeAttr("required");
        }
        function habilitar_eliminar() {
            $("#form-destino").find('.modal-title').text("Eiminar Registro");
            $("#btnoperacion").val('Eliminar');
            $("#form-destino").modal('show');
            $('#img').removeAttr("required");
        }
        function pasarDatos(id, titulo, descrip, precio, destino){

            document.getElementById('btnModi').disabled=false;
            document.getElementById('btnElim').disabled=false;

            document.getElementById('id').value=id;
            document.getElementById('titulo').value=titulo;
            document.getElementById('descripcion').value=descrip;
            document.getElementById('precio').value=precio;
            document.getElementById('destino').value=destino;

        }
        
        function llenarmunicipios(val, selected)
        {
            $.ajax({
            type: 'post',
            url: '../script/getmunicipios.php',
            data: {
            id:val,
            sel:selected
            },
            success: function (response) {
            document.getElementById("municipio").innerHTML=response; 
            }
            });
        }
    </script>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/metisMenu.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../js/doSearch.js"></script>
</body>

</html>
