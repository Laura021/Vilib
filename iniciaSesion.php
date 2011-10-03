<?php
			$host="localhost:3306";
	  		$userDB="root";
	  		$passwordDB="";
	  		$dbname="pape";
			
			$correo=$_POST['mail'];
			$contra=$_POST['pass'];
			
			$cxn= mysqli_connect($host,$userDB,$passwordDB,$dbname) or die ("No se pudo conectar al servidor");
			
			$qry="SELECT Nombre,Paterno,Mail,Password FROM cliente  WHERE  mail='$correo' and password='$contra'";
			
			$result=mysqli_query($cxn,$qry) or die(mysqli_error($cxn));
	  		
			$row=mysqli_fetch_assoc($result);
			
			
			if(($row['Mail'] == $correo)&& ($row['Password'] == $contra) )
			{
				session_start();
				$_SESSION['access'] = true;
				$_SESSION['usuario']=$row['Nombre'];
				echo "Exitoso";
				
			}
			else
			{
				echo "ERROR";
				
			}
			
			
			

?>