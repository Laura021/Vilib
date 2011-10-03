<?php
	
	$host="localhost:3306";
	$user="root";
	$password="";
	$dbname="vilib";
	
	$conexion=mysqli_connect($host,$user,$password,$dbname) or die("no se pudo contectar al servidor");
	
?>
