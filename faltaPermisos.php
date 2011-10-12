<?php
    session_start();
	
	include ("conexion.php");
?>
<html>
	<head>
		<title>Falta de permisos</title>
	    <link rel="stylesheet" href="style2.css" media="screen"/>
	</head>
	<body>
		<div id="container">
		<?php
			
	include ("cabecera.php");
	
	include ("lateral.php");
		?>	
		<div id="main">
			
		<div class="important">
			"Usted no tiene los permisos para entrar a esta pagina :("
		</div>
			
		</div><!-- fin del main -->
			
		</div><!--fin del container -->
	</body>
</html>