<?php
    
	$usu = $_SESSION['tipo_usu'];
	
	if($usu == 3 || $usu == 4)
	{
		header("Location: faltaPermisos.php");
	}
	
?>