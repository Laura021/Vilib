
       <?php 
	   			include ("conexion.php");
	   			
				$patronNombre="((\w)+)";
				$patronDescripcion="(((\w)+(\s)+)+)";
				$nombre=$_POST['txtNombre'];
				$dpto=$_POST['listaDpto'];
				$cat=$_POST['listaCat'];
				$descr=$_POST['txtDescripcion'];
				$id=$_POST['txtID'];
				$bien=1;
				
				if(!preg_match($patronNombre, $nombre)){
					
					echo "Por favor introduce un nombre válido.";
					$bien=0;
					
				}
				
				if(!preg_match($patronDescripcion, $descr)){
					
					echo "Por favor agrega una descripción para tu archivo.";
					$bien=0;
					
				}
				
				if($bien==1){
				$qry="UPDATE documentos 
					  SET Nombre='$nombre', Id_Dpto =$dpto, Id_Cat = $cat , Descripcion ='$descr' 				                      WHERE Id_Doc =$id ";
				
				$conexion=mysqli_connect($host,$user,$password,$dbname) 
						or die("no se pudo contectar al servidor");
			
				$resultado=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));
				
				header ("Location: index.php");
				}
				
				header("Location: index.php");
				
//				$registro=mysqli_fetch_array($resultado);
				
				
	   ?>