<?php
session_start();

//valida si existe una sesión, si no regresa a la pagina de login
	if(empty($_SESSION['access']))
	{
		header("Location: index.php");
	}
		include ("restriccion.php");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="style2.css" media="screen"/>
		<title>Eliminar documento :)</title>
	</head>
	
    <body>

		<div id="container">
			<?php include ("cabecera.php");?>
            <?php include ("lateral.php"); ?>
            <?php include ("conexion.php");?>
         <div id="main">
		
        <?php
				$valor= $_GET['nombre'];
			
        	    $qry="Delete FROM documentos WHERE Nombre ='$valor';";
				
				$conexion=mysqli_connect($host,$user,$password,$dbname) 
						or die("no se pudo contectar al servidor");
			
				$result=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));
        
        ?>
   		</div><!--fin del div = main-->
		</div><!--fin del div = container -->

</body>
</html>
	  

		

		
	
	  


















