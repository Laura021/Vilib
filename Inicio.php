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
            	<h2>¡Bienvenido a Vilib!</h2>
            	<div class="descInicio">
            	<p>Vilib es un Repositiorio/Biblioteca Virtual que alberga
            	una gran cantidad de dodcumentos con datos interesantes
            	sobre la carrera de Ing. en Sistemas Computacionales.</p>
            	
            	<p>Su principal objetivo es proporcionar informacion de
            	calidad, categorizandola y gestionandola de una forma eficiente.</p>
            	
            	<p>Vilib cuenta con su propio visor online de archivos donde se
            		soportan diferentes formatos, como videos, documentos de texto 
            		plano, documentos PDF, imagenes y muchos mas.</p>
            		
            	<p>Vilib fue creado como un proyecto para el Instituto Tecnologico
            		de saltillo, para saber mas de la Institucion, visita el
            		siguiente enlace:</p>
            		
            		<p><a class="movingText center" href="http://www.its.mx">Instituto Tecnologico de Saltillo</a></p>
            		
            	</div>
            </div>
            
		</div>

	</body>
</html>
