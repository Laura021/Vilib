<html>
<title>Registro</title>

<head>
		
		<link rel="stylesheet" href="style2.css" media="screen"/>
		
</head>

<body>
	
<div id="header"></div>
</br>
</br>
<?php  
	$terminado=0;
	
	
	
	if(isset($_POST['txtNC'])){
		$ningunError=true;
		//i_t_93@hotmail.com
		$patron= "(^((\w)*(([a-z]+[A-Z]+[\d]+)|([A-Z]+[a-z]+[\d]+)|([\d]+[a-z]+[A-Z]+)|([\d]+[A-Z]+[a-z]+))(\w)*))";
		$patronNumeros="([\d]+)";
		$patronEdad="([\d]{2})";
		$numC=$_POST['txtNC'];
		$contra=$_POST['txtContraseñaRegistro'];
		$usuario=$_POST['txtUsuarioRegistro'];
		$paterno=$_POST['txtPaternoRegistro'];
		$materno=$_POST['txtMaternoRegistro'];
		$edad=$_POST['txtEdad'];
		$mail=$_POST['txtMail'];
		
		require 'conexion.php';

		if(strlen($usuario)<=1){
			echo "<div class = \"registroExitoso\">Tu nombre de usuario es muy corto. D:";
			?>
			<a href="registro.php" class="menu_button blue">Volver al formulario.</a>
			</div>
			<?
			$ningunError=false;
		}else
		if(strlen($paterno)<=1){
			echo "<div class = \"registroExitoso\">Tu apellido paterno es muy corto. D:";
			?>
			<a href="registro.php" class="menu_button blue">Volver al formulario.</a>
			</div>
			<?
			$ningunError=false;
		}else
		if(strlen($materno)<=1){
			echo "<div class = \"registroExitoso\">Tu apellido materno es muy corto. D:";
			?>
			<a href="registro.php" class="menu_button blue">Volver al formulario.</a>
			</div>
			<?
			$ningunError=false;
		}else
		if(strlen($contra)<8){
			echo "<div class = \"registroExitoso\">Tu contraseña es muy corta. Debe contener al menos 8 caracteres.";
			?>
			<a href="registro.php" class="menu_button blue">Volver al formulario.</a>
			</div>
			<?
			$ningunError=false;
		}else
		if (!preg_match($patron, $contra)) {
    		echo "<div class = \"registroExitoso\">Tu contraseña no cumple con las normas de seguridad (al menos una mayúscula, una minúscula y un número).";
			?>
			<a href="registro.php" class="menu_button blue">Volver al formulario.</a>
			</div>
			<?
			$ningunError=false;
		}else
		if(!preg_match($patronNumeros, $numC)){
			echo "<div class = \"registroExitoso\">Por favor, utiliza solo números para tu número de control.";
			?>
			<a href="registro.php" class="menu_button blue">Volver al formulario.</a>
			</div>
			<?
			$ningunError=false;
		}else
		if(strlen($numC)!=8){
			echo "<div class = \"registroExitoso\">Tu número de control debe contener 8 números.";
			?>
			<a href="registro.php" class="menu_button blue">Volver al formulario.</a>
			</div>
			<?
			$ningunError=false;
		}else
		if(!preg_match($patronEdad, $edad)){
			echo "<div class = \"registroExitoso\">Por favor, utiliza solo números para tu número de control.";
			?>
			<a href="registro.php" class="menu_button blue">Volver al formulario.</a>
			</div>
			<?
			$ningunError=false;
		}
		
		if($ningunError){
		$qry="INSERT INTO usuarios (N_Control, Id_tipo, Id_Esp, Id_Dpto, Pass, Nombre, Paterno, Materno, Edad, Mail) VALUES ($numC, 3, 1, 7,'$contra', '$usuario', '$paterno', '$materno', $edad, '$mail')";
		$result=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));
		$terminado=1;
		}
		}else{
		
	
	
?>
<div id="formaRegistro">
<form name="formaRegistro" method="post" action="">
	
     <label id="titles">N&uacutemero de Control:</label><br />
     <input required  placeholder="Utiliza solo numeros." maxlength="8" class="loginbox" name="txtNC" type="text" id="txtNumC" pattern="[\d]{8}" />
     <br />
     <br />
     <label id="registro">Nombre: </label><br />
     <input class="loginbox" name="txtUsuarioRegistro" pattern="[a-zA-Z&ntilde&Ntilde\s]+[a-zA-Z&ntilde&Ntilde\s]+" type="text"  id="txtUsuarioRegistro" required placeholder="Min 2,Max. 30."/>
     <br />
     <br />
     <label id="registro">Apellido Paterno: </label><br />
     <input required placeholder="Max. 30 caracteres." class="loginbox" name="txtPaternoRegistro" type="text" pattern="[a-zA-Z&ntilde&Ntilde\s]+[a-zA-Z&ntilde&Ntilde\s]+" id="txtPaternoRegistro" />
     <br />
     <br />
     <label id="registro">Apellido Materno: </label><br />
     <input required placeholder="Max. 30 caracteres." class="loginbox" name="txtMaternoRegistro" type="text" pattern="[a-zA-Z&ntilde&Ntilde\s]+[a-zA-Z&ntilde&Ntilde\s]+" id="txtMaternoRegistro" />
     <br />
     <br />
     <label id="titles">Contrase&ntildea</label><br />
     <input  required placeholder="Letras, num, mayusculas." maxlength="18" pattern="(^((\w)*(([a-z]+[A-Z]+[\d]+)|([A-Z]+[a-z]+[\d]+)|([\d]+[a-z]+[A-Z]+)|([\d]+[A-Z]+[a-z]+))(\w)*))" class="loginbox" name="txtContraseñaRegistro" type="password" id="txtContraseñaRegistro" />
     <br />
     <br />
     <label id="titles">Edad:</label><br />
     <input required placeholder="Utiliza solo numeros" maxlength="2" class="loginbox" name="txtEdad" type="text" id="txtEd" pattern="[\d]{2}"/>
     <br />
     <br />
     <label id="titles">Mail:</label><br />
     <input required placeholder="ej@dominio.com" class="loginbox" name="txtMail" type="email" id="txtMa" pattern="^(.+\@.+\..+)$" />
     <br />
     <br />
     
     <button  type="submit" name="entrar" id="entrar" value="entrar" class="menu_button blue"><span>Registrar</span></button>
     
</form>
</div>
<?php
}


if($terminado==1){
?>
<div class="registroExitoso">Registro Exitoso </br>
	Presiona el boton para regresar al menu de inicio. :)</br>
<a href="index.php" class="menu_button blue">Volver al Inicio.</a>
</div>

<?php
}
?>
</body>
</html>