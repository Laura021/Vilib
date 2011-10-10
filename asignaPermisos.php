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

	$query = "SELECT N_Control
                    ,usuarios.Nombre as 'Nombre'
       				,Paterno,Materno
	   				,Edad
     				,Mail
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
        <input type="text" id="txtDpto" value="<?php echo $row['Dpto']?>" />
        <br>
        <label>Tipo de Usuario: </label>
        <input type="text" id="txtTipo" value="<?php echo $row['Tipo']?>" />
   
        
    </form>

</body>
</html>

