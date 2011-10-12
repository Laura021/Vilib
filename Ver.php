<?php
session_start();

//valida si existe una sesi�n, si no regresa a la pagina de login
	if(empty($_SESSION['access']))
	{
		header("Location: index.php");
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="style2.css" media="screen"/>
		<title>Ver Documento</title>
	</head>

<?php include ("conexion.php");?>

<?php

	if(isset($_POST['criterio']) || !empty($_SESSION['verCriterio']))
	{
		if(empty($_POST['criterio']))
		{
			if (!empty($_SESSION['verCriterio']))
			{
				$criterio = $_SESSION['verCriterio'];
			}
			else {
				$criterio = "%";
			}
			
		}
		else {
			$criterio = $_POST['criterio'];
		}
		
		
		$query = "SELECT nombre,Descripcion,Ruta
					 FROM documentos WHERE nombre like '$criterio%' ORDER BY nombre ASC";
	
		$result = mysqli_query($conexion,$query) or die("no se pudo realizar la consulta");
	
		mysqli_close($conexion);
	}
?>

	<body>

		<div id="container">
				<?php include("cabecera.php");?>
				<?php include("lateral.php") ;?>
		
        	<div id="main">

				<form action="" method="post" name="form1" id="form1">
					
				<div class="busqueda">
                      <label>Nombre del Archivo</label>
					  <input name="criterio" type="text" id="criterio" value="" size="50" class="busquedaTxt"/>
					  <input type="submit" id="btbuscar" value="Buscar" class="menu_button blue" />
				</div>
						   <br />
						   <br />
				</form>
	<?php  
		if(isset($_POST['criterio']) || !empty($_SESSION['verCriterio']))
		{
			if (!empty($_SESSION['verCriterio']))
		{
			$_SESSION['verCriterio']="";
		}
			  
  			while ($row = mysqli_fetch_assoc($result)) 	
			{
				echo "<div class=\"docs\">";								
				echo "<span  class=\"tituloDoc\">".$row['nombre']." </span><br /><hr>";
				echo "Descripcion: ".$row['Descripcion']."<br />";
				?> 
				<div class="iconosDocs">  
				<ul class="listaDocs">                     
                    <li><img src="images/icono_compartir.png" >     </li>
	                <li><img src="images/icono_descargar.png" >     </li>
    	            <li><a href="editar.php?nombre=<?php echo $row['nombre']?>">
                    	<img src="images/icono_editar.png" > </a>       </li>
        	        <li><a href="eliminar.php?nombre=<?php echo $row['nombre']."&criterio=$criterio";?>">
                      	<img src="images/icono_eliminar.png" > </a> </li>
            	    <li><a href="<?php echo $row['Ruta']?>"> 
                       	<img src="images/icono_ver.png" ></a>       </li>
                </ul></div></div>
                <br />
                    
  	<?php    } //fin del while
        }//fin del if
	?>
    
				</table>
			

			</div><!--fin del div = main-->
		</div><!-- fin del div = container-->


</body>
</html>
