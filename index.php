<?php session_start();
//valida si existe una sesión, si no regresa a la pagina de login
	if(!empty($_SESSION['access']))
	{
		header("Location: Inicio.php");
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="style.css" media="screen"/>
		<title>Pagina LogIn</title>
	</head>
    
	<body>
    	<div id="container">
	    <div id="header">
    
		<?php 
		error_reporting(0);

		$cosa=$_POST['txtUsuario'];

		if($cosa != "")
		{
	  		$host="localhost:3306";
	  		$userDB="root";
	  		$passwordDB="";
	  		$dbname="vilib";
			
	 		
//			include ("conexion.php");
			
	  		$usuario=$_POST['txtUsuario'];
	  		$pass=$_POST['txtContraseña'];
	  
			$qry="SELECT N_Control,Pass FROM usuarios WHERE N_Control='$usuario' and Pass='$pass'";
	  		$cxn= mysqli_connect($host,$userDB,$passwordDB,$dbname)
				 or die ("No se pudo conectar al servidor");

			$result=mysqli_query($cxn,$qry) or die(mysqli_error($cxn));

	  		$row=mysqli_fetch_assoc($result);
	  
	 		// mysqli_close($cxn);
			//if($_POST['usuario']==$row['usuario'] && $_POST['password']==$row['password']){
	  
		}
			if(count($row))
			{
	  		
				$qry="SELECT Nombre,Paterno FROM usuarios WHERE N_Control='$usuario'";
				$result=mysqli_query($cxn,$qry) or die(mysqli_error($cxn));
				$row=mysqli_fetch_assoc($result);
		  	 
	  			$_SESSION['access'] = true;
				$_SESSION['usuario']=$row['Nombre']." ".$row['Paterno'];
	  
			  	header("Location: Inicio.php");
	
 	  		}else{
				if(!empty($_POST['txtUsuario']))
					{
					echo "<div id=\"username\">Su computadora explotara en 5,4,3,2,1... nahh la verdad es que pusiste mal el password o el usuario</div>";
					}
				}
		?> 
    </div>

	<div id="formulario">
    <form name="form1" method="post" action="index.php">
     
     <label id="titles">Usuario</label><br />
     <input  class="loginbox" name="txtUsuario" type="text" id="txtUsuario" />
     <br />
     <br />
     <label id="titles">Contraseña</label><br />
     <input class="loginbox" name="txtContraseña" type="password" id="txtContraseña" />
     <br />
     <br />
     
     <button  type="submit" name="entrar" id="entrar" value="entrar" class="menu_button blue medium" content="content"/>Entrar</button>
     
    </form>
    
    
    <br />
    <a class="registroTXT" href="registro.php">¡Regístrate aquí!</a>
    
   </div>
    
	</div>
	</body>
</html>