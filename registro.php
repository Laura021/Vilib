git<html>
<title>Registro</title>

<head>
		
		<link rel="stylesheet" href="style2.css" media="screen"/>
		
		
		
		<script>
			
	$(document).ready(function(){  
    	//variables globales 
    	
    	var inputUsername = $("#txtUsuarioRegistro");    	  
    	var inputPassword1 = $("#txtContraseñaRegistro");  
    	
    function validateUsername(){  
    	//NO cumple longitud minima  
    	if(inputUsername.val().length < 4){  
       	 reqUsername.addClass("error");  
        return false;  	
    	}
    }  
    
    inputUsername.blur(validateUsername);
    inputUsername.keyup(validateUsername);
    
   )};
	
		</script>
</head>

<body>
	
<div id="header"></div>
</br>
</br>
<?php  
	$terminado=0;
	
	
	
	if(isset($_POST['txtNC'])){
		
		//i_t_93@hotmail.com
		$numC=$_POST['txtNC'];
		$contra=$_POST['txtContraseñaRegistro'];
		$usuario=$_POST['txtUsuarioRegistro'];
		$paterno=$_POST['txtPaternoRegistro'];
		$materno=$_POST['txtMaternoRegistro'];
		$edad=$_POST['txtEdad'];
		$mail=$_POST['txtMail'];
		$error = false;
		require 'conexion.php';

		/*if(strlen($usuario)<5){
			echo "Tu nombre de usuario es muy corto. D:";
			?>
			<a href="registro.php" class="menu_button blue">Volver al formulario.</a>
			<?
		}else
		if(strlen($paterno)<5){
			echo "Tu apellido paterno es muy corto. D:";
			?>
			<a href="registro.php" class="menu_button blue">Volver al formulario.</a>
			<?
		}else
		if(strlen($materno)<5){
			echo "Tu apellido materno es muy corto. D:";
			?>
			<a href="registro.php" class="menu_button blue">Volver al formulario.</a>
			<?
		}else
		if(strlen($contra)<5){
			echo "Tu apellido materno es muy corto. D:";
			?>
			<a href="registro.php" class="menu_button blue">Volver al formulario.</a>
			<?
		}else*/
			
		$qry="INSERT INTO usuarios (N_Control, Id_tipo, Id_Esp, Id_Dpto, Pass, Nombre, Paterno, Materno, Edad, Mail) VALUES ($numC, 3, 1, 7,'$contra', '$usuario', '$paterno', '$materno', $edad, '$mail')";
		$result=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));
		$terminado=1;
		
		
	}else{
		
	
	
?>
<div id="formaRegistro">
<form name="formaRegistro" method="post" action="">
     
     <label id="registro">Usuario: </label><br />
     <input class="loginbox" name="txtUsuarioRegistro" type="text" id="txtUsuarioRegistro" required placeholder="Max. 30 caracteres."/>
     <br />
     <br />
     <label id="registro">Apellido Paterno: </label><br />
     <input required placeholder="Max. 30 caracteres." class="loginbox" name="txtPaternoRegistro" type="text" id="txtPaternoRegistro" />
     <br />
     <br />
     <label id="registro">Apellido Materno: </label><br />
     <input required placeholder="Max. 30 caracteres." class="loginbox" name="txtMaternoRegistro" type="text" id="txtMaternoRegistro" />
     <br />
     <br />
     <label id="titles">Contrase&ntildea:</label><br />
     <input required placeholder="Incluye letras, num. y mayusculas." pattern="(^[0-9A-Za-z])" class="loginbox" name="txtContraseñaRegistro" type="password" id="txtContraseñaRegistro" />
     <br />
     <br />
     <label id="titles">N&uacutemero de Control:</label><br />
     <input required placeholder="Utiliza solo numeros." class="loginbox" name="txtNC" type="text" id="txtNumC" />
     <br />
     <br />
     <label id="titles">Edad:</label><br />
     <input required placeholder="Utiliza solo numeros" class="loginbox" name="txtEdad" type="text" id="txtEd" />
     <br />
     <br />
     <label id="titles">Mail:</label><br />
     <input required placeholder="What lol?" class="loginbox" name="txtMail" type="email" id="txtMa" />
     <br />
     <br />
     
     <button  type="submit" name="entrar" id="entrar" value="entrar" class="menu_button blue"><span>Registrar</span></button>
     
</form>
</div>
<?php
}


if($terminado==1){
?>

<a href="index.php" class="menu_button blue">Volver al Inicio.</a>

<?php
}
?>
</body>



</html>