<?php 
    require "../script/admin/configuracion.php";
    $con=conectar();
    $destinos = "";

    $query_paquetes= "select * from tb_factura as f INNER JOIN tb_pago as p on f.fa_idPago = p.idPago";
    
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

    <title>Ventas - Administrador</title>

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
                        <h1 class="page-header">Ventas Realizadas</h1>
                        <div class="panel panel-default">
                            <div class="panel-heading">Funciones</div>
                            <div class="panel-body">
                                <div class="form-inline section">
             
                                  <div class="form-group">
                                    <button id="btnModi" onclick="habilitar_modificar()" class="btn btn-warning" disabled>Modificar</button>
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
                        <table class="table table-bordered" id="resultados" style="display: block; overflow-x: auto;"> 
                        <thead> 
                        <tr class="info"> 
                            <th>Seleccionar</th>
                            <th>Codigo de factura</th> 
                            <th>ID Cliente</th> 
                            <th>Fecha</th> 
                            <th>Monto</th>
                            <th>Departamento</th>
                            <th>Ciudad</th>
                            <th>Direccion</th>
                            <th>Pais</th>

                        </tr> 
                        </thead> 
                        <tbody>
                        <?php
                            while($row=mysqli_fetch_array($sql_paquetes)){ 
                        ?>
                        <tr> 
                        <td>
                            <input type="radio" name="selectReg" 
                                onclick="pasarDatos('<?php echo $row['idFactura']; ?>', '<?php echo $row['fa_idPago']; ?>')">
                        </td>
                        <td><?php echo $row['idFactura']; ?></td> 
                        <td><?php echo $row['fa_idCliente']; ?></td> 
                        <td><?php echo $row['fa_fecha']; ?></td> 
                        <td><?php echo $row['pag_monto']; ?></td> 
                        <td><?php echo $row['fa_departamento']; ?></td>
                        <td><?php echo $row['fa_ciudad']; ?></td>
                        <td><?php echo $row['fa_direccion']; ?></td>
                        <td><?php echo $row['fa_pais']; ?></td>

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
<input type="text" id="id" style="display: none;">
<input type="text" id="pago" style="display: none;">
    </div><!-- /#wrapper -->

    <script type="text/javascript">

        function habilitar_modificar() {
            var id = document.getElementById('id').value;
            location.href ="modificarventa.php?id="+id;
        }
        function habilitar_eliminar() {
            var id = document.getElementById('id').value;
            var pago = document.getElementById('pago').value;
            location.href ="../script/admin/eliminarventa.php?id="+id+"&idpago="+pago;
        }
        function pasarDatos(id, pago){

            document.getElementById('btnModi').disabled=false;
            document.getElementById('btnElim').disabled=false;

            document.getElementById('id').value=id;
            document.getElementById('pago').value=pago;
        }
        
    </script>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/metisMenu.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../js/doSearch.js"></script>
</body>

</html>
