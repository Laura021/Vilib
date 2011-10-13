<?php
	
	include ("conexion.php");
	
    $id= $_POST['txtId'];
	
	$tipo =$_POST['listaDptos'];
	
				$qry="UPDATE usuarios
					  SET Id_Tipo='$tipo'
					  WHERE N_Control ='$id'";
				
				$conexion=mysqli_connect($host,$user,$password,$dbname) 
						or die("no se pudo contectar al servidor");
			
				$resultado=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));
				
				header("Location: BuscarUsuario.php");
?>