<html>
<title>Registro</title>


<head>
		
		<link rel="stylesheet" href="style2.css" media="screen"/>
		
</head>

<body>
<?php

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



$qry="INSERT INTO usuarios (N_Control, Id_tipo, Id_Esp, Id_Dpto, Pass, Nombre, Paterno, Materno, Edad, Mail) VALUES ($numC, 3, 1, 7, '$contra', '$usuario', '$paterno', '$materno', $edad, '$mail')";
$cxn= mysqli_connect($host,$userDB,$passwordDB,$dbname) or die ("No se pudo conectar al servidor");
$result=mysqli_query($cxn,$qry) or die(mysqli_error($cxn));



?>

<form action="index.php">
	
	<button  type="submit" class="menu_button blue"><span>Volver al Inicio.</span></button>
	
</form>


<a class="terminadoTXT" href="index.php">&iexclListo!<br /> Volver al inicio.</a>
</body>
</html>