<?php
require 'conexion.php';
$con= conectar();
if(isset($_POST['id']))
{

 $id = $_POST['id'];
 $sql=mysqli_query($con, "select * from tb_municipios where mu_idDepartamento='$id'");
 echo "<option value=''>Seleccionar</option>";
 while($row=mysqli_fetch_array($sql))
 {
 	if($_POST['sel'] == $row['idMunicipio']){
 	echo "<option value='".$row['idMunicipio']."' selected>".$row['mu_nombre']."</option>";
 	}else{
 	echo "<option value='".$row['idMunicipio']."'>".$row['mu_nombre']."</option>";
 	}
 }
 exit;
}
?>