
       <?php 
	   			include ("conexion.php");
	   			
				$nombre=$_POST['txtNombre'];
				$dpto=$_POST['listaDpto'];
				$cat=$_POST['listaCat'];
				$descr=$_POST['txtDescripcion'];
				$id=$_POST['txtID'];
				
				$qry="UPDATE documentos 
					  SET Nombre='$nombre', Id_Dpto =$dpto, Id_Cat = $cat , Descripcion ='$descr' 				                      WHERE Id_Doc =$id ";
				
				$conexion=mysqli_connect($host,$user,$password,$dbname) 
						or die("no se pudo contectar al servidor");
			
				$resultado=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));
				
				header("Location: index.php");
				
//				$registro=mysqli_fetch_array($resultado);
				
				
	   ?>