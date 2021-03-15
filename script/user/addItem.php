<?php
session_start();

$id=$_GET['id'];


if(!isset($_SESSION['cart'])){

	$_SESSION["cart"]=array( array("id"=>$_GET["id"],"cant"=> 1));

}else{
	$cart = $_SESSION["cart"];
	$repeated = false;
	foreach ($cart as $c) {
		// si el producto esta repetido rompemos el ciclo
		if($c["id"]==$_GET["id"]){
			$repeated=true;
			break;
		}
	}
	if($repeated==false){
		// si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
		array_push($cart, array("id"=>$_GET["id"],"cant"=> 1));
		$_SESSION["cart"] = $cart;
	}
}

echo "<script>javascript:history.back()</script>";
?>