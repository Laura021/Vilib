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
		<title>Subir documento :)</title>
	</head>
	
    <body>

		<div id="container">
			<?php include ("cabecera.php");?>
            <?php include ("lateral.php"); ?>
        
		
        <div id="upload_form">
	  
		<form action='Subir.php' method='post' enctype="multipart/form-data" name="formulario" 
        	id="formulario">

			<label>Seleccione un documento para continuar</label>
					<br />
					<br />

			<label name='Nombre'> Nombre </label>
			<input name='txtNombre' id='txtNombre' type='text' maxlength='50' />
			<br />
			
			<?php include("conexion.php");?>

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
					echo "<option value='".$row["Id_Dpto"]."'>".$row["Nombre"]."</option>";
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
					echo "<option value='".$row["Id_Cat"]."'>".$row["Nombre"]."</option>";
				}

				echo "</select>";
				
				mysqli_close($conexion);
		?>
		<br />
		<br />

		<label name='descripcion'>Descripcion</label>
		
        <textarea name='txtDescripcion' cols='' rows=''></textarea>
		<br />
		<br />
        
		<input name='file' type='file' id='file'  value='Selecciona un Archivo'  />
		<br />
		<br />
		
        <input name='btnSubir' type='submit' id='btnSubir' class='menu_button blue' value="Subir"  />
	</form>
			
            </div>
		
		</div><!--fin del div = container -->

</body>
</html>
	  

		

		
	
	  