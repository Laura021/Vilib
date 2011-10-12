<?php
session_start();

//valida si existe una sesi�n, si no regresa a la pagina de login
	if(empty($_SESSION['access']))
	{
		header("Location: index.php");
			
	}
	
	include ("restriccion.php");
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="style2.css" media="screen"/>
		<title>Ver Documento</title>
	</head>
	
    <body>
	<!--aqui estaba la conexion-->
	<?php include("conexion.php");?>

		<div id="container">
			<?php include("cabecera.php");?>
			<?php include("lateral.php");?>
            
			<div id="main">

		<form action="" method="post" name="form1" id="form1">
			<div class="busqueda">
			  <label>Nombre a buscar </label>
  			
   			  <input name="criterio" type="text" id="criterio" value="" size="50" class= "busquedaTxt"/>
			  
              <input type="submit" id="btbuscar" value="Buscar" class="menu_button blue"/>
              </div><!--- fin del div de busqueda-->
				     <br />
                     <br />
              <label>
    				<input type="radio" name="GpoBsqda" value="nombre" id="GpoBsqda_0" checked/>
				    Nombre
			  </label>
            
              <label>
			    	<input type="radio" name="GpoBsqda" value="nControl" id="GpoBsqda_1" />
				    N�mero Control
			  </label>
              
  		</form>

		<!--<table width="600" border="0" cellspacing="0" cellpadding="0">-->
        <ul>
  			<?php
				if(isset($_POST['criterio']))
				{
					$criterio = $_POST['criterio'];
					
					$tipo = $_POST['GpoBsqda'];	
					
										
					if($tipo =="nombre")
					{
							$query = "SELECT N_Control,Nombre,Paterno,Materno 
										FROM usuarios WHERE Nombre like '$criterio%'
										OR Paterno like '$criterio%'
										OR Materno like '$criterio%'
										ORDER BY nombre ASC";	
					}
					else if($tipo == "nControl")
					{
						    $query = "SELECT N_Control,Nombre,Paterno,Materno
										FROM usuarios WHERE N_Control like '%$criterio%' 
											ORDER BY nombre ASC";
					}
					//Aqui iba result.
			    	$result = mysqli_query($conexion,$query) 
							or die("no se pudo realizar la consulta");
							
					mysqli_close($conexion);
				}// fin de if criterio es set.
				
				//aqui meteremos el resto de la consulta que escribe los resultados.
				if(isset($_POST['criterio']))
				{
				//Ciclo para evitar que te muestre los warnings
  					while ($row = mysqli_fetch_assoc($result)) 
					{	
			?>
			<!--<tr>
			    <td>-->
					<li>
                    	<a href="asignaPermisos.php?id=<?php echo $row['N_Control']?>">
							<?php echo "".$row['N_Control']."\t
							\t".$row['Nombre']." ".$row['Paterno']." ".$row['Materno']. "<hr>"?>
                    	</a>
                    </li>
                <!--</td>
    		</tr>-->
  			<?php     
					} //fin del while
					
        		}//fin del if
			?>
            </ul>
<!--</table>-->

			</div><!-- fin de div = main -->
		</div><!-- fin de div = container-->


</body>
</html>
