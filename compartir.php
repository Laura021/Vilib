<?php
    
    $idDoc=$_GET['id'];
	
	include ("conexion.php");
	 
	 $query = "UPDATE documentos 
	           SET Compartir='1'
	           WHERE Id_Doc=$idDoc";
											
	$result = mysqli_query($conexion,$query) 
							or die("no se pudo realizar la consulta");
							
?>