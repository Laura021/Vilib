<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asignacion de permisos de usuarios</title>
</head>
<body>
	<?php 
	include ("conexion.php");
	
	$id=$_GET['id'];

	$query = "SELECT *
			  FROM usuarios 
			  WHERE N_Control = '$id'";	

	$result = mysqli_query($conexion,$query) 
							or die("no se pudo realizar la consulta");
	 
	$row = mysqli_fetch_assoc($result);
	
	$idid=$row['Id_tipo'];
	
	$qry2="SELECT * 
		   FROM departamento
		   WHERE Id_Dpto = $idid";
		   
	$resultado= mysqli_query($conexion,$qry2) 
							or die("no se pudo realizar la consulta");
							
	$fila = mysqli_fetch_assoc($resultado);
	
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
        <input type="text" id="txtEsp" value="<?php echo $row['Id_Esp']?>" disabled="disabled"/>
        <br />
        <label>Departamento :</label>
        
        <select name="listaDpto">
        <input type="text" id="txtDpto" value="<?php echo $fila['Nombre']?>" />
        </select>
        
    </form>

</body>
</html>

