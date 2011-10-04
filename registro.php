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
		
		$terminado=1;
		$numC=$_POST['txtNC'];
		$contra=$_POST['txtContraseñaRegistro'];
		$usuario=$_POST['txtUsuarioRegistro'];
		$paterno=$_POST['txtPaternoRegistro'];
		$materno=$_POST['txtMaternoRegistro'];
		$edad=$_POST['txtEdad'];
		$mail=$_POST['txtMail'];
		$host="localhost:3306";
		$userDB="root";
		$passwordDB="";
		$dbname="Vilib";


		$qry="INSERT INTO usuarios (N_Control, Id_tipo, Id_Esp, Pass, Nombre, Paterno, Materno, Edad, Mail) VALUES ($numC, 3, 1,'$contra', '$usuario', '$paterno', '$materno', $edad, '$mail')";
		$cxn= mysqli_connect($host,$userDB,$passwordDB,$dbname) or die ("No se pudo conectar al servidor");
		$result=mysqli_query($cxn,$qry) or die(mysqli_error($cxn));
		
		
	}else{
		
	
	
?>
<div id="formaRegistro">
<form name="formaRegistro" method="post" action="">
     
     <label id="registro">Usuario: </label><br />
     <input  class="loginbox" name="txtUsuarioRegistro" type="text" id="txtUsuarioRegistro" />
     <br />
     <br />
     <label id="registro">Apellido Paterno: </label><br />
     <input  class="loginbox" name="txtPaternoRegistro" type="text" id="txtPaternoRegistro" />
     <br />
     <br />
     <label id="registro">Apellido Materno: </label><br />
     <input  class="loginbox" name="txtMaternoRegistro" type="text" id="txtMaternoRegistro" />
     <br />
     <br />
     <label id="titles">Contrase&ntildea:</label><br />
     <input class="loginbox" name="txtContraseñaRegistro" type="password" id="txtContraseñaRegistro" />
     <br />
     <br />
     <label id="titles">N&uacutemero de Control:</label><br />
     <input class="loginbox" name="txtNC" type="text" id="txtNumC" />
     <br />
     <br />
     <label id="titles">Edad:</label><br />
     <input class="loginbox" name="txtEdad" type="text" id="txtEd" />
     <br />
     <br />
     <label id="titles">Mail:</label><br />
     <input class="loginbox" name="txtMail" type="text" id="txtMa" />
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