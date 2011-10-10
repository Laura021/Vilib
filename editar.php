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
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="style2.css" media="screen"/>
		<title>Editar documento :)</title>
	</head>
	
    <body>

		<div id="container">
			<?php include ("cabecera.php");?>
            <?php include ("lateral.php"); ?>
            <?php include("conexion.php");?>
        
		<?php $valor = $_GET['nombre'];
		 
				$qry="SELECT * FROM documentos WHERE Nombre = '$valor';";
				
				$conexion=mysqli_connect($host,$user,$password,$dbname) 
						or die("no se pudo contectar al servidor");
			
				$resultado=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));
				
				$registro=mysqli_fetch_array($resultado);
			 
		?>
        
        <div id="upload_form">
        
	  
		<form action='editarSucio.php' method='post' enctype="multipart/form-data" name="formulario" 
        	id="formulario">

			<input type="hidden" name='txtID' id='txtID' value="<?php echo $registro['Id_Doc']?>"/>
            
			<label name='Nombre'> Nombre </label>
            
			<input name='txtNombre' id='txtNombre' type='text' maxlength='50' 
            			value="<?php echo $registro['Nombre']?>"/>
			<br />
            <br />

		<?php
		//Aqui van los departamentos
		
				$qry="SELECT Id_Dpto, Nombre FROM departamento;";
				
				$conexion=mysqli_connect($host,$user,$password,$dbname) 
						or die("no se pudo contectar al servidor");
			
				$result=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));

				echo "<label name='Dpto'> Departamento </label>";
				echo "<select name='listaDpto'>";

				while($row=mysqli_fetch_array($result))
				{
					
					if($row["Id_Dpto"] == $registro["Id_Dpto"])
					{
						echo " <option value='".$row["Id_Dpto"]."' selected='selected'> "  
										.$row["Nombre"]. 
							 " </option> ";
					}
					else
					{echo " <option value='".$row["Id_Dpto"]."'> "  
										.$row["Nombre"]. 
							     " </option> ";				
					}
				}
				
				echo "</select>";
				echo "<br />";
				echo "<br />";


		//Aqui para categoria

				$qry="SELECT Id_Cat, Nombre FROM categoria_doc;";
			
				$result=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));

				echo "<label name ='Categorias'> Categoria </label>";
				echo "<select name='listaCat'>";

				while($row=mysqli_fetch_array($result))
				{
					if($row["Id_Cat"] == $registro["Id_Cat"])
					{
						echo "<option value='".$row["Id_Cat"]."' selected='selected'>"
								.$row["Nombre"].
						     "</option>";
					}
					else
					{
						echo "<option value='".$row["Id_Cat"]."'>"
								.$row["Nombre"].
							 "</option>";
					}
				}

				echo "</select>";
				
				mysqli_close($conexion);
		?>
		<br />
		<br />

		<label name='descripcion'>Descripcion</label>
		
        <textarea name='txtDescripcion' cols='' rows='10' >
        <?php echo $registro['Descripcion']?>
		</textarea>
		<br />
		<br />
		
        <input name='btnCambio' type='submit' id='btnCambio' class='menu_button blue' 
        	   value="Cambiar"  />
	   </form>
    
			
    	 </div>
		
		</div><!--fin del div = container -->

</body>
</html>
	  

		

		
	
	  
