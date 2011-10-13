<?php
    
	$usu = $_SESSION['tipo_usu'];
	
	if($usu == 3)
	{
		header("Location: faltaPermisos.php");
	}
	
?>