<?php
session_start();

$id=$_GET['id'];
$cart=$_SESSION['cart'];
$new = array();;

foreach($cart as $c){
    if($c['id'] != $id){
    	$new[] = $c;
	}
}

$_SESSION['cart']=$new;

echo "<script>javascript:history.back()</script>";
?>