<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php");	

//este es solo una prueba 
?>