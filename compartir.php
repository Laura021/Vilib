<?php
    
    $idDoc=$_GET['id'];
	
	include ("conexion.php");
	include ("restriccion.php");
	 
	 $qry ="SELECT Compartir FROM documentos WHERE Id_Doc = $idDoc ";
	 
	 $conexion=mysqli_connect($host,$user,$password,$dbname) 
						or die("no se pudo contectar al servidor");
			
	$resultado=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));
	
	//parches y mas parches
	
	while($row2 = mysqli_fetch_assoc($resultado))
	{
		if($row2[Compartir]== 0)
		{
			$query = "UPDATE documentos 
	           SET Compartir='1'
	           WHERE Id_Doc=$idDoc";
		}else
		{
			
			$query = "UPDATE documentos 
	           SET Compartir='0'
	           WHERE Id_Doc=$idDoc";
		}
	}
	
	$result = mysqli_query($conexion,$query) 
							or die("no se pudo realizar la consulta");
	
	
	header("Location: Ver.php");
							
?>