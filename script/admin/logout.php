<?php
session_start();

unset($_SESSION['idAdmin']); 
unset($_SESSION['nomAdmin']); 

header("Location: ../../login.html");
?>