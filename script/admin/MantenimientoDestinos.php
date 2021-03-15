<?php
require '../conexion.php';
$con = conectar();

$id = $_POST['id'];
$nombre  = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$id_Categoria = $_POST['categoria'];
$idMunicipio = $_POST['municipio'];
$direccion = $_POST['direccion'];

$fichero_subido = basename($_FILES['img']['name']);
move_uploaded_file($_FILES['img']['tmp_name'], "../../img/destinos/".$fichero_subido);

switch ($_POST['operacion']){
	case 'Insertar':
		
		$sqlAgregar = mysqli_query($con, "INSERT INTO tb_destinos(des_nombre, des_descripcion, des_idCategoria,  		des_idMunicipio, des_dirEspecifica, des_imagen) 
				VALUES('$nombre','$descripcion','$id_Categoria','$idMunicipio','$direccion','$fichero_subido')");

		break;	
	case 'Modificar':
		if(!empty($fichero_subido)){
			$sqlAgregar = mysqli_query($con, "UPDATE tb_destinos SET des_nombre='$nombre', des_descripcion='$descripcion', des_idCategoria='$id_Categoria', des_idMunicipio='$idMunicipio', des_dirEspecifica='$direccion', des_imagen='$fichero_subido' WHERE idDestino='$id'");
		}else{
			$sqlAgregar = mysqli_query($con, "UPDATE tb_destinos SET des_nombre='$nombre', des_descripcion='$descripcion', des_idCategoria='$id_Categoria', des_idMunicipio='$idMunicipio', des_dirEspecifica='$direccion' WHERE idDestino='$id'");
		}

		
		break;
	case 'Eliminar':
		$sqlEliminar = mysqli_query($con, "DELETE FROM tb_destinos WHERE idDestino='$id'");
		break;
}

	header("Location: ../../admin/destinos.php");


?>