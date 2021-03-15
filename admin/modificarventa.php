<?php 
    require "../script/admin/configuracion.php";
    $con=conectar();
    $fac= $_GET['id'];

 $sqlEncabezado = mysqli_query($con, "select * from tb_factura as f INNER JOIN tb_pago as p on f.fa_idPago=p.idPago where f.idFactura='".$fac."'");
$datos=mysqli_fetch_array($sqlEncabezado);

$sqlDetalle = mysqli_query($con, "select * from tb_detalle as d INNER JOIN tb_paquetes as p on d.de_idProducto=p.idPaquete where d.de_idFactura='".$fac."'");

$sqlPaquetes = mysqli_query($con, "select * from tb_paquetes");
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
                <form action="../script/admin/modificarventa.php" method="POST">
                    <div class="col-lg-12">
                        <h1 class="page-header">Modificar venta</h1>

                        <div class="section">
                        
                        <h4 class="bg-primary">Datos de Cliente</h4> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ID Factura:</label>
                                        <input readonly type="text" class="form-control" value="<?php echo $datos['idFactura']; ?>" name="idfactura" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ID Cliente:</label>
                                        <input type="text" class="form-control" value="<?php echo $datos['fa_idCliente']; ?>" name="idcliente" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Departamento:</label>
                                        <input type="text" class="form-control" value="<?php echo $datos['fa_departamento']; ?>" name="dep" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ciudad:</label>
                                        <input type="text" class="form-control" value="<?php echo $datos['fa_ciudad']; ?>" name="ciu" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pais:</label>
                                        <input type="text" class="form-control" value="<?php echo $datos['fa_pais']; ?>" name="pais" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Direccion:</label>
                                        <input type="text" class="form-control" value="<?php echo $datos['fa_direccion']; ?>" name="dir" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section">
                        <h4 class="bg-primary">Datos de Pago</h4> 
                            <div class="row">
                            <input type="text" name="idpago" value="<?php echo $datos['fa_idPago'];?>" style="display: none;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Numero de Tarjeta:</label>
                                        <input type="text" class="form-control" value="<?php echo $datos['pag_tarjeta'];?>" name="tarjeta" maxlength="16" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <input type="text" class="form-control" value="<?php echo $datos['pag_nombre'];?>" name="nombretarjeta" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CCV:</label>
                                        <input type="text" class="form-control" value="<?php echo $datos['pag_ccv'];?>" name="ccv" minlength="3" maxlength="3" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Vencimiento:</label>
                                        <input type="text" class="form-control" value="<?php echo $datos['pag_expira'];?>" name="venci" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section">
                        <h4 class="bg-primary">Detalle de compra</h4> 
                            <table>
                            <?php
                                while($row = mysqli_fetch_array($sqlDetalle)){ 
                            ?>

                            <tr width="100%">
                                <td width="80%">
                                    <label>Producto:</label>
                                    <select name="producto[]" class="form-control" required>
                                    <?php
                                     mysqli_data_seek($sqlPaquetes, 0);
                                        while ($pa = mysqli_fetch_array($sqlPaquetes)) {
                                            if($pa['idPaquete'] == $row['de_idProducto']){
                                                echo "<option value='".$row['de_idProducto']."' selected>".$pa['pa_titulo']."</option>";
                                            }else{
                                                echo "<option value='".$row['de_idProducto']."'>".$pa['pa_titulo']."</option>";
                                            }
                                        }
                                    ?>
                                    </select>
                                </td>
                                 <td>
                                    <label>Cantidad:</label>
                                    <input type="number" class="form-control" value="<?php echo $row['de_cantidad'];?>" name="cant[]" required>
                                </td> 
                            </tr> 
                            <?php
                                }
                            ?>                                                       
                            </table>
                        </div>
                    </div>               

                    <div class="text-center">

                    <input type="submit" class="btn btn-primary btn-lg" value="Guardar"> 
                    </div>

                    </form>
                </div>

                <!-- /.row -->
                
<br>
<br>
<br>
<br>
<br>
            </div><!-- /.container-fluid -->

        </div><!-- /#page-wrapper -->

    <script type="text/javascript">
 
        
    </script>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/metisMenu.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../js/doSearch.js"></script>
</body>

</html>
