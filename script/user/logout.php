<?php
session_start();

unset($_SESSION['idCliente']); 
unset($_SESSION['nomCliente']); 

header("Location: ../../index.html");
?>