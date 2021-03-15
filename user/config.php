<?php
session_start();
if(empty($_SESSION['idCliente'])){
	echo "<script>alert('Lo sentimos, Debe estar registrado para ver esta seccion.');</script>'";
	echo "<script>location.href='../login.html'</script>";
}
?>