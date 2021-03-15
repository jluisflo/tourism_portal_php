<?php 
    require "../script/admin/configuracion.php";
    $con=conectar();
    $categorias = "";
    $departamentos = "";

    $query_destinos= "select * from tb_destinos as d INNER JOIN tb_municipios as m INNER JOIN tb_departamentos as dp INNER JOIN tb_categoria as c on d.des_idMunicipio=m.idMunicipio AND m.mu_idDepartamento = dp.idDepartamento AND d.des_idCategoria = c.idCategoria";
    
    $sql_destinos = mysqli_query($con, $query_destinos);

    $sql_categorias = mysqli_query($con, "Select * from tb_categoria");
    while ($row = mysqli_fetch_array($sql_categorias)) {
        $categorias .= "<option value='".$row['idCategoria']."'>".$row['cat_nombre']."</option>";
    }

    $sql_departamentos = mysqli_query($con, "Select * from tb_departamentos");
    while ($row = mysqli_fetch_array($sql_departamentos)) {
        $departamentos .= "<option value='".$row['idDepartamento']."'>".$row['dep_nombre']."</option>";
    }
    
    function limpiar($texto)
    {
		$textolimpio = str_replace("'","",$texto);
		$textolimpio = str_replace('"',"",$texto);
		return $textolimpio;
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Destinos - Administrador</title>

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
                                    <button id=btnAgre class="btn btn-info" onclick="habilitar_agregar()">Nuevo</button>
                                  </div>
                                  <div class="form-group">
                                    <button id=btnModi class="btn btn-warning" onclick="habilitar_modificar();" disabled>Modificar</button>
                                  </div>
                                  <div class="form-group">
                                    <button id=btnElim class="btn btn-danger" onclick="habilitar_eliminar();" disabled>Eliminar</button>
                                  </div>
                                  <div class="form-group">
                                    <a href="../reportes/reportedestinos.php" class="btn btn-primary" target="popup" onClick="window.open(this.href, this.target, 'width=700,height=420'); return false;" >Generar Reporte</a>
                                  </div>
                                  <div class="form-group pull-right">
                                    <label>Buscar</label>
                                    <input type="text" class="form-control" id="search">
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="section">
                        <table class="table table-bordered" style="display: block; overflow-x: auto;"> 
                        <thead> 
                        <tr class="info"> 
                            <th>Seleccionar</th>
                            <th>Codigo</th> 
                            <th>Nombre</th> 
                            <th>Descripcion</th> 
                            <th>Categoria</th>
                            <th>Municipio</th>
                            <th>Departamento</th>
                            <th>Direccion</th>
                            <th>Imagen</th>
                        </tr> 
                        </thead> 
                        <tbody>
                        <?php
                            while($row=mysqli_fetch_assoc($sql_destinos)){ 
                        ?>
                        <tr> 
                        <td>

                            <input type="radio" name="selectReg" 
                                onclick="pasarDatos('<?php echo $row['idDestino']; ?>',
                                    '<?php echo limpiar($row['des_nombre']); ?>',
                                    '<?php echo limpiar($row['des_descripcion']); ?>',
                                    '<?php echo $row['des_idCategoria']; ?>',
                                    '<?php echo $row['des_idMunicipio']; ?>',
                                    '<?php echo $row['idDepartamento']; ?>',
                                    '<?php echo limpiar($row['des_dirEspecifica']); ?>'
                                    )" />
                        </td>
                        <td><?php echo $row['idDestino']; ?></td> 
                        <td><?php echo $row['des_nombre']; ?></td> 
                        <td><?php echo $row['des_descripcion']; ?></td> 
                        <td><?php echo $row['cat_nombre']; ?></td>
                        <td><?php echo $row['mu_nombre']; ?></td>
                        <td><?php echo $row['dep_nombre']; ?></td>
                        <td><?php echo $row['des_dirEspecifica']; ?></td>
                        <td><img src="../img/destinos/<?php echo $row['des_imagen']; ?>" width="50px"></td>
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


    <form enctype="multipart/form-data" id="form-destino" action="../script/admin/MantenimientoDestinos.php" method="POST" class="modal fade" tabindex="-1" role="dialog">
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
                                <label>Nombre del destino:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
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
                                <label>Categoria:</label>
                                <select id="categoria" name="categoria" class="form-control" required>
                                  <option value="">Seleccionar</option>
                                  <?php echo $categorias; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Departamento:</label>
                                <select id="departamento" name="departamento" class="form-control" onchange="llenarmunicipios(this.value)" required>
                                  <option value="">Seleccionar</option>
                                  <?php echo $departamentos; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Municipio:</label>
                                <select id="municipio" name="municipio" class="form-control" required>
                                  <option value="">Seleccionar</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Direccion:</label>
                                <textarea class="form-control" id="direccion" name="direccion" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Imagen:</label>
                                <input type="file" id="img" name="img" required>
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

        function pasarDatos(id, nombre, descrip, idcat, muni, depar, dir){
 
            document.getElementById('btnModi').disabled=false;
            document.getElementById('btnElim').disabled=false;

            document.getElementById('id').value=id;
            document.getElementById('nombre').value=nombre;
            document.getElementById('descripcion').value=descrip;
            document.getElementById('categoria').value=idcat;
            document.getElementById('departamento').value=depar;
            llenarmunicipios(depar, muni);
            document.getElementById('direccion').value=dir;

        }

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
</body>

</html>
