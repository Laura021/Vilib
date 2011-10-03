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
			<title>Bienvenido a Vilib</title>
        
		<link rel="stylesheet" href="style2.css" media="screen"/>
	</head>

	<body>       
        <div id="container">
        	<?php include ("cabecera.php");?>

			<?php include ("lateral.php");?>
            
        	<div id="main">
            
            </div>
            
		</div>

	</body>
</html>
