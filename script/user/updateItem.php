<?php
session_start();

$id=$_GET['id'];
$cant=$_GET['cant'];

$cart=$_SESSION['cart'];
$new = array();

foreach($cart as $c){
    if($c['id'] == $id){
    	$c['cant']=$cant;
	}
	$new[] = $c;

}

$_SESSION['cart']=$new;

header("Location: ../../user/carrito.php");
?>