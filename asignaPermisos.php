<?php
session_start();

//valida si existe una sesi�n, si no regresa a la pagina de login
	if(empty($_SESSION['access']))
	{
		header("Location: index.php");
		
	}
	include ("restriccion.php");
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style2.css" media="screen"/>
<title>Asignacion de permisos de usuarios</title>
</head>
<body>
	<?php 
	include ("conexion.php");
	
	$id=$_GET['id'];

	$query = "SELECT N_Control
                    ,usuarios.Nombre as 'Nombre'
       				,Paterno,Materno
	   				,Edad
     				,Mail
     				,usuarios.Id_tipo
      				,tipo_usuario.Nombre as 'Tipo'
      				,especialidad.Nombre as 'Especialidad'
      				,departamento.Nombre as 'Dpto'
			  FROM   usuarios
                    ,tipo_usuario
                    ,especialidad
                    ,departamento
			  WHERE usuarios.Id_tipo =tipo_usuario.Id_tipo 
                    and usuarios.Id_Esp  =especialidad.Id_Esp
                    and usuarios.Id_Dpto =departamento.Id_Dpto
                    and N_Control='$id'";

	$result = mysqli_query($conexion,$query) 
							or die("no se pudo realizar la consulta");
	 
	$row = mysqli_fetch_assoc($result);
	
	$qry2="SELECT * FROM tipo_usuario";
	
	$resultado = mysqli_query($conexion,$qry2) or die ("no se pudo realizar la consulta 2");
	
	//$row2 = mysqli_fetch_assoc($resultado);
		
	?>
    
    <form action="" name="permisos" method="post">
    	<label>Nombre: </label>
        <input type="text" id="txtNombre" value="<?php echo $row['Nombre']?>"  disabled="disabled"/>
        <br />
        <label>Paterno: </label>
        <input type="text" id="txtPaterno" value="<?php echo $row['Paterno']?>" disabled="disabled" />
        <br />
        <label>Materno: </label>
        <input type="text" id="txtMaterno" value="<?php echo $row['Materno']?>" disabled="disabled" />
        <br />
        <label>Mail: </label>
        <input type="text" id="txtMail" value="<?php echo $row['Mail']?>"  disabled="disabled"/>
        <br />
        <label>Especialidad: </label>
        <input type="text" id="txtEsp" value="<?php echo $row['Especialidad']?>" disabled="disabled"/>
        <br />
        <label>Departamento :</label>
        <input type="text" id="txtDpto" value="<?php echo $row['Dpto']?>" disabled="disabled" />
        <br>
        <label>Tipo de Usuario: </label>
        <select name="listaDptos">
        	<?php
        	
        	while($row2 = mysqli_fetch_assoc($resultado))
			
			if($row["Id_tipo"] == $row2["Id_tipo"])
					{
						echo " <option value='".$row2["Id_tipo"]."' selected='selected'> "  
										.$row2["Nombre"]. 
							 " </option> ";
					}
					else
					{echo " <option value='".$row2["Id_tipo"]."'> "  
										.$row2["Nombre"]. 
							     " </option> ";				
					}
        	
        	?>
        <!--<input type="text" id="txtTipo" value="<?php echo $row['Tipo']?>" />-->
   		</select>
   		<br />
   		<br/>
   		<label>Descripcion de los permisos</label>
   		<br />
   		<br/>
   		<?php
   		 
   		 $tipo=$_SESSION['tipo_usu'];
		 
   		 if($row['Id_tipo'] == 1)
   		 {
   		 	echo "<label>Entre al fin del jefeeeee <label/>";?>
			
			<ul id="permiiiisos :3">
				<li><input type="checkbox"  checked="checked" disabled="disabled"/>Visualizacion de documentos.</li>
				<li><input type="checkbox"  checked="checked" disabled="disabled" />Edicion de documentos.</li>
				<li><input type="checkbox"  checked="checked" disabled="disabled" />Compartir documentos</li>
				<li><input type="checkbox"  checked="checked" disabled="disabled" />Eliminar documentos</li>
				<li><input type="checkbox"  checked="checked" disabled="disabled" />Asignar permisos a usuarios</li>
			</ul>
			
   		 <?php }
		 if($row['Id_tipo'] == 2)
   		 {
   		 	echo "<label>Entre al fin del docente <label/>";?>
   		 	<ul id="permiiiisos :3">
				<li><input type="checkbox"  checked="checked" disabled="disabled"/>Visualizacion de documentos.</li>
				<li><input type="checkbox"  checked="checked" disabled="disabled" />Edicion de documentos.</li>
				<li><input type="checkbox"  checked="checked" disabled="disabled" />Compartir documentos</li>
				<li><input type="checkbox"  checked="checked" disabled="disabled" />Eliminar documentos de su departamento</li>
				<li><input type="checkbox"  checked="checked" disabled="disabled" />Asignar permisos a usuarios de menor rango</li>
			</ul>
			
			
   		 <?php }
		 if($row['Id_tipo'] == 3)
   		 {
   		 	echo "<label>Entre al fin del alumno <label/>";?>
   		 		
   		 	<ul id="permiiiisos :3">
				<li><input type="checkbox"  checked="checked" disabled="disabled"/>Visualizacion de documentos.</li>
				<li><input type="checkbox"   disabled="disabled" />Edicion de documentos.</li>
				<li><input type="checkbox"   disabled="disabled" />Compartir documentos</li>
				<li><input type="checkbox"   disabled="disabled" />Eliminar documentos</li>
				<li><input type="checkbox"   disabled="disabled" />Asignar permisos a usuarios</li>
			</ul>
			
			
   		 <?php }
		 /*Debemos tener la descripcion de los permiso*/
		
   		?> 
    </form>

</body>
</html>

