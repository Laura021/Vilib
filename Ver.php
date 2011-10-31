<?php
session_start();

function obtenerExtensionFichero($str)
	  {
	  $txt="";
	  $txt= explode(".", $str);
	  $txt= end($txt);
	  return $txt;
	  }

//valida si existe una sesi�n, si no regresa a la pagina de login
	if(empty($_SESSION['access']))
	{
		header("Location: index.php");
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="style2.css" media="screen"/>
		<link rel="stylesheet" href="javascript/shadowbox/shadowbox.css" media="screen"/>
		<script type="text/javascript" src="javascript/shadowbox/shadowbox.js"></script>
		<script type="text/javascript">
		
		var sbMimeMap = { 
            img:        ['png', 'jpg', 'jpeg', 'gif', 'bmp'], 
            swf:        ['swf'], 
            flv:        ['flv'], 
            qt:         ['dv', 'mov', 'moov', 'movie', 'mp4'], 
            wmp:        ['asf', 'wm', 'wmv'], 
            qtwmp:      ['avi', 'mpg', 'mpeg'], 
            iframe:       ['asp', 'aspx', 'cgi', 'cfm', 'htm', 'html', 'pl', 'php', 
                        'php3', 'php4', 'php5', 'phtml', 'rb', 'rhtml', 'shtml', 
                        'txt', 'vbs', 'java','cs','xml','pdf'] 
		}
		
		Shadowbox.init( 
						{ 
                        loadingImage:"loading.gif" 
                       , handleUnsupported:  'notsupported()' 
                       , ext: sbMimeMap 
                       }
			); 
		
		function notSupported()
		{
			Shadowbox.open({
        content:    '<div class="shadowBoxMessage">Documento no soportado por el visor online de archivos \n Puedes descargarlo para poder visualizarlo desde tu dispositivo.</div>',
        player:     "html",
        title:      "Visor Online Vilib",
        height:     150,
        width:      350
    });
		}	
		
		function defaultType()
		{
			Shadowbox.open({ content:  url 
                         , type:       "iframe" 
                         , title:      sbTitle
                         , height:     500
                         , width:      300 
                         });
		}	
		</script>
		<title>Ver Documento</title>
	</head>

<?php include ("conexion.php");?>

<?php
	if(isset($_POST['criterio']) || !empty($_SESSION['verCriterio']))
	{
		if(empty($_POST['criterio']))
		{
			if (!empty($_SESSION['verCriterio']))
			{
				$criterio = $_SESSION['verCriterio'];
			}
			else {
				$criterio = "%";
			}
			
		}
		else {
			$criterio = $_POST['criterio'];
		}
		
		
		$query = "SELECT nombre,Descripcion,Ruta,Id_Doc
					 FROM documentos WHERE nombre like '$criterio%' ORDER BY nombre ASC";
	
		$result = mysqli_query($conexion,$query) or die("no se pudo realizar la consulta");
	
		mysqli_close($conexion);
	}
?>

	<body>

		<div id="container">
				<?php include("cabecera.php");?>
				<?php include("lateral.php") ;?>
		
        	<div id="main">

				<form action="" method="post" name="form1" id="form1">
					
				<div class="busqueda">
                      <label>Nombre del Archivo</label>
					  <input name="criterio" type="text" id="criterio" value="" size="50" class="busquedaTxt"/>
					  <input type="submit" id="btbuscar" value="Buscar" class="menu_button blue" />
				</div>
						   <br />
						   <br />
				</form>
	<?php  
		if(isset($_POST['criterio']) || !empty($_SESSION['verCriterio']))
		{
			if (!empty($_SESSION['verCriterio']))
		{
			$_SESSION['verCriterio']="";
		}
			  
  			while ($row = mysqli_fetch_assoc($result)) 	
			{
				echo "<div class=\"docs\">";								
				echo "<span  class=\"tituloDoc\">".$row['nombre']." </span><br /><hr>";
				echo "Descripcion: ".$row['Descripcion']."<br />";
				?> 
				<div class="iconosDocs">  
				<ul class="listaDocs">                     
                    <li><a href="compartir.php?id=<?php echo $row['Id_Doc']?>">
                    	<img src="images/icono_compartir.png" ></a> </li>
	                <li><a <?php echo "href=\"".$row['Ruta']."\""; ?> >
	                	<img src="images/icono_descargar.png" > </a> </li>
    	            <li><a href="editar.php?nombre=<?php echo $row['nombre']?>">
                    	<img src="images/icono_editar.png" > </a>       </li>
        	        <li><a href="eliminar.php?nombre=<?php echo $row['nombre']."&criterio=$criterio";?>">
                      	<img src="images/icono_eliminar.png" > </a> </li>
                      	
                      	<?php
                      	$extension = obtenerExtensionFichero($row['Ruta']);
                      	if( $extension== "png" || $extension == "jpg" || $extension == "jpeg"
                      		|| $extension == "gif" || $extension == "bmp" || $extension == "swf"
                      		|| $extension == "flv" || $extension == "dv" || $extension == "mov"
                      		|| $extension == "moov" || $extension == "movie" || $extension == "mp4"
                      		|| $extension == "asf" || $extension == "wm" || $extension == "wmv"
                      		|| $extension == "avi" || $extension == "mpg" || $extension == "mpeg"
                      		|| $extension == "htm" || $extension == "html" || $extension == "xml"
                      		|| $extension == "asp" || $extension == "aspx" || $extension == "cgi"
                      		|| $extension == "pl" || $extension == "php" || $extension == "php3"
                      		|| $extension == "php4" || $extension == "php5" || $extension == "phtml"
                      		|| $extension == "rb" || $extension == "rhtml" || $extension == "shtml"
                      		|| $extension == "txt" || $extension == "vbs" || $extension == "java"
                      		|| $extension == "cs" || $extension == "pdf")
							{
								echo "<li><a rel=\"shadowbox\" onClick=\"defaultType()\" href=\"".$row['Ruta']."\" >";
							}
						else
							{
								echo "<li><a rel=\"shadowbox\" onClick=\"notSupported()\" href=\"".$row['Ruta']."\" >";
							}
                      	?>

                       	<img src="images/icono_ver.png" ></a>       </li>
                </ul></div></div>
                <br />
                    
  	<?php    } //fin del while
        }//fin del if
	?>
    
				</table>
			

			</div><!--fin del div = main-->
		</div><!-- fin del div = container-->


</body>
</html>
