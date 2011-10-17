<?php
session_start();

function obtenerExtensionFichero($str)
	  {
	  $txt="";
	  $txt= explode(".", $str);
	  $txt= end($txt);
	  return $txt;
	  }
include ("conexion.php");

$nombre=$_POST['txtNombre'];
$dpto=$_POST['listaDpto'];
$cat=$_POST['listaCat'];
$descr=$_POST['txtDescripcion'];
$ext=obtenerExtensionFichero($_FILES['file']['name']);

$msj= "";

//validar el archivo y tamaño
if ( $_FILES["file"]["size"] < 19000000)
   {
  
	  if ($_FILES["file"]["error"] > 0)
    	{
		    $msj= "Archivo demasiado grande, Tamaño Maximo 20 MB <br /> 
		    Código de error : " . $_FILES["file"]["error"] . "<br />";
    	}
	  else
    	{
   			/*echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		    echo "Type: " . $_FILES["file"]["type"] . "<br />";
		    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
			echo "Extension: ".$ext. "<br />";*/
	//verifica si existe el archivo en la carpeta img.
    
			if (file_exists("docs/" . $_FILES["file"]["name"]) )
      			{
		    	  $msj="El archivo ". $_FILES["file"]["name"] . " - - - - > ya existe. ";
      			}
		    else
      			{
		    //nota: se deben de dar permisos a la carpeta para poder mover el archivo.
			//En Unix chmod -R 777 /ruta/nombreCarpeta/
      				move_uploaded_file($_FILES["file"]["tmp_name"],"docs/" . $nombre.".". $ext);
					$nombreFinal= $nombre.".".$ext;
      				$path="docs/".$nombreFinal;
		
					$qry="INSERT INTO `vilib`.`documentos` (`Id_Dpto`, `Id_Cat`, `Nombre`, `Fecha`,`Ruta` ,`Descripcion`) 
													VALUES ($dpto,$cat, '$nombre', '2011-05-14','$path' ,'$descr')";

					mysqli_query($conexion,$qry) or die(mysqli_error($conexion));
					
					$msj = "Archivo :".$_FILES["file"]["name"]." subido con exito.";
					
						  
      			 }//fin else de poner en la carpeta
				 
    		}//else error
			
  	}//fin if tamaño
	else
  	{
		  $msj= "Archivo demasiado grande el limite es de 20Mb";
  	}
		  //echo "<br />";
		  //echo "<a href='SubirDoc.php'>Regresar a la pagina anterior<a />";

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
            
            <?php
            echo $msj;
            ?>
            </div>
            
		</div>

	</body>
</html>