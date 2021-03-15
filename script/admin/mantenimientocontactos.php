<?php
require '../conexion.php';
$con = conectar();

$id = $_POST['id'];
$nombre  = $_POST['nombre'];
$email  = $_POST['email'];
$asunto  = $_POST['asunto']; 
$mensaje  = $_POST['mensaje'];
$contacta  = $_POST['contacta'];
if(empty($contacta)){ $contacta="anonimo";}

switch ($_POST['operacion']){
	case 'Insertar':
		
		$sqlAgregar = mysqli_query($con, "INSERT INTO tb_contacto(con_nombre, con_email, con_asunto, con_mensaje, con_contactante) VALUES('$nombre','$email','$asunto','$mensaje', '$contacta')");

		break;	
	case 'Modificar':

		$sqlModificar = mysqli_query($con, "UPDATE tb_contacto SET con_nombre='$nombre', con_email='$email', 
			con_asunto='$asunto', con_mensaje='$mensaje', con_contactante='$contacta'
										 WHERE idContacto='$id'");
		
		break;
	case 'Eliminar':
		$sqlEliminar = mysqli_query($con, "DELETE FROM tb_contacto WHERE idContacto='$id'");
		break;
}

	header("Location: ../../admin/contactos.php");

?>