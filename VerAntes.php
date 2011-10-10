<?php
session_start();

//valida si existe una sesión, si no regresa a la pagina de login
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

	if(isset($_POST['criterio']))
	{
		$criterio = $_POST['criterio'];

		$query = "SELECT nombre,Descripcion
					 FROM documentos WHERE nombre like '$criterio%' ORDER BY nombre ASC";
	
		$result = mysqli_query($conexion,$query) or die("no se pudo realizar la consulta");
	
		mysqli_close($conexion);
	}
?>

	<body>

		<div id="container">
				<?php include("cabecera.php");?>
				<?php include("lateral.php") ;?>

				<form action="" method="post" name="form1" id="form1">
				<div class="busqueda">
					
                      <label>Nombre del Archivo</label>
					  <input name="criterio" type="text" id="criterio" value="" size="50" />
					  <input type="submit" id="btbuscar" value="Buscar" />
						   <br />
						   <br />
				</form>

				<table width="600" border="0" cellspacing="0" cellpadding="0">
  
	<?php  
		if(isset($_POST['criterio']))
		{  
  			while ($row = mysqli_fetch_assoc($result)) 	
			{
	?>
  					<tr>
    					<td colspan="5">
							<?php //echo "<a align=\"left\"  href=\"docs/".$row['nombre']."\"> "
									//					.$row['nombre']." <a /><br />"."<hr>"; 
																	
								echo "<a align=\"left\">"
									.$row['nombre']." <a /><br />"."<hr>";
									
								echo "Descripcion: ".$row['Descripcion'];
							?>                        
                         </td>
                         
   					</tr>                    
                    <tr>
                    	<td><img src="images/icono_compartir.png" >     </td>
	                    <td><img src="images/icono_descargar.png" >     </td>
    	                <td><a href="editar.php?nombre=<?php echo $row['nombre']?>">
                        	<img src="images/icono_editar.png" ></a>    </td>
        	            <td><a href="eliminar.php?nombre=<?php echo $row['nombre']?>">
                        	<img src="images/icono_eliminar.png" > </a> </td>
            	        <td><a href="docs/<?php echo $row['nombre']?>"> 
                        	<img src="images/icono_ver.png" ></a>       </td>
                   
                    </tr>
                    
  	<?php    } //fin del while
        }//fin del if
	?>
    
				</table>

			</div><!--fin del div = main-->
		</div><!-- fin del div = container-->


</body>
</html>
