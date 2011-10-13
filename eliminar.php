<?php session_start(); 
		echo "He iniciado sesion";
		
	if(empty($_SESSION['access']))
	{
		header("Location: index.php");
	}
	
	$usu=$_SESSION['tipo_usu'];
	echo "<br/>";
	echo "tipo de usuario ".$usu;
	echo "<br/>";
	
	if($usu == 3)
	{
		echo "estoy entrando al if";
		header("Location: faltaPermisos.php");
	}
	else
    {
		
	
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
				$criterio = $_GET['criterio'];
			
        	    $qry="Delete FROM documentos WHERE Nombre ='$valor';";
				
				$conexion=mysqli_connect($host,$user,$password,$dbname) 
						or die("no se pudo contectar al servidor");
			
				$result=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));
				
				$_SESSION['verCriterio'] = $criterio;
				
				//echo $criterio;
		//		header("Location: Ver.php");
        
        ?>
   		</div><!--fin del div = main-->
		</div><!--fin del div = container -->

</body>
</html>

<?php }?>