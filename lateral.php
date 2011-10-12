<html>
<div id="leftside">
	<center>
<?php 
	$usu=$_SESSION['tipo_usu'];
	
	if($usu == 1)
	{?>
		<a href="Inicio.php" name="entrar" class="menu_button blue medium">Inicio</a><br /><br />
		<a href="BuscarUsuario.php" name="entrar" class="menu_button blue medium ">Busqueda de<br /> Usuario</a><br /><br />
		<a href="Ver.php" name="entrar" class="menu_button blue medium">Busqueda de<br /> Documento</a><br /> <br />
		<a href="SubirDoc.php" name="entrar" class="menu_button blue medium">Subir<br /> Documento</a><br /><br />
		
	<?php
	}
	if($usu == 2)
	{?>
		<a href="Inicio.php" name="entrar" class="menu_button blue medium">Inicio</a><br /><br />
		<a href="BuscarUsuario.php" name="entrar" class="menu_button blue medium ">Busqueda de<br /> Usuario</a><br /><br />
		<a href="Ver.php" name="entrar" class="menu_button blue medium">Busqueda de<br /> Documento</a><br /> <br />
		<a href="SubirDoc.php" name="entrar" class="menu_button blue medium">Subir<br /> Documento</a><br /><br />

	<?php		
	}
	if($usu == 3)
	{?>
		
		<a href="Inicio.php" name="entrar" class="menu_button blue medium">Inicio</a><br /><br />
		<a href="Ver.php" name="entrar" class="menu_button blue medium">Busqueda de<br /> Documento</a><br /> <br />
	

		
	<?php }
	
?>

	</center>
</div>

</html>