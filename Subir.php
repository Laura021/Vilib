<?php

	  function obtenerExtensionFichero($str)
	  {
	  	$txt="";
	  return $txt=end(explode(".", $str));
	  }

 	  $host="localhost:3306";
	  $userDB="root";
	  $passwordDB="";
	  $dbname="Vilib";
	  
	  
$cxn= mysqli_connect($host,$userDB,$passwordDB,$dbname) or die ("No se pudo conectar al servidor");

$nombre=$_POST['txtNombre'];
$dpto=$_POST['listaDpto'];
$cat=$_POST['listaCat'];
$descr=$_POST['txtDescripcion'];
$ext=obtenerExtensionFichero($_FILES['file']['name']);

$msj= "";

//el $qry traera el nombre y l categoria del archivo.


//validar el archivo y tamaño
if ( $_FILES["file"]["size"] < 10000000)
   {
  
	  if ($_FILES["file"]["error"] > 0)
    	{
		    $msj= "Archivo demasiado grande, Tamaño Maximo 10 MB <br /> 
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
    
			if (file_exists("img/" . $_FILES["file"]["name"]) )
      			{
		    	  $msj="El archivo ". $_FILES["file"]["name"] . " - - - - > ya existe. ";
      			}
		    else
      			{
		    //nota: se deben de dar permisos a la carpeta para poder mover el archivo.
			//En Unix chmod -R 777 /ruta/nombreCarpeta/
      				move_uploaded_file($_FILES["file"]["tmp_name"],"docs/" . $nombre.".". $ext);
					$nombreFinal= $nombre;
      				$path="docs/".$nombreFinal;
		
					  //echo "Guardado en: ".$path;
	  
//echo "INSERT INTO `vilib`.`documentos` (`Id_Dpto`, `Id_Cat`, `Nombre`, `Fecha`,`Ruta` ,`Descripcion`) 
	//							VALUES ($dpto,$cat, '$nombreFinal', '2011-05-14','$path' ,'$descr')";
								
					$qry="INSERT INTO `Vilib`.`documentos` (`Id_Dpto`, `Id_Cat`, `Nombre`, `Fecha`,`Ruta` ,`Descripcion`) 
													VALUES ($dpto,$cat, '$nombreFinal', '2011-05-14','$path' ,'$descr')";

					mysqli_query($cxn,$qry) or die(mysqli_error($cxn));
					
					$msj = "Archivo :".$_FILES["file"]["name"]." subido con exito.";
					
						  
      			 }//fin else de poner en la carpeta
				 
    		}//else error
			
  	}//fin if tamaño
	else
  	{
		  $msj= "Archivo invalido";
  	}
		  //echo "<br />";
		  //echo "<a href='SubirDoc.php'>Regresar a la pagina anterior<a />";

?>

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
            
            <?php
            echo $msj;
            ?>
            </div>
            
		</div>

	</body>
</html>