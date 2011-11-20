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
		<title>Página LogIn</title>
		
		
		<!--[if IE]>
			<link rel="stylesheet" type="text/css" href="ie.css" />
			<title>Página LogIn InternetExplorer</title>
		<![endif]-->
		
	</head>
    
	<body>
    	<div id="container">
	    <div id="header">
    
		<?php 
		error_reporting(0);

		$cosa=$_POST['txtUsuario'];

		if($cosa != "")
		{
 		
			include ("conexion.php");
			
	  		$usuario=$_POST['txtUsuario'];
	  		$pass=$_POST['txtContraseña'];
	  
			$qry="SELECT N_Control,Pass FROM usuarios WHERE N_Control='$usuario' and Pass='$pass'";
	  		
			$result=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));

	  		$row=mysqli_fetch_assoc($result);
	  
	 		// mysqli_close($cxn);
			//if($_POST['usuario']==$row['usuario'] && $_POST['password']==$row['password']){
	  
		}
			if(count($row))
			{
	  		
				$qry="SELECT Nombre,Paterno,Id_tipo,N_Control FROM usuarios WHERE N_Control='$usuario'";
				$result=mysqli_query($conexion,$qry) or die(mysqli_error($conexion));
				$row=mysqli_fetch_assoc($result);
		  	 
	  			$_SESSION['access'] = true;
				$_SESSION['usuario']=$row['Nombre']." ".$row['Paterno'];
	  			$_SESSION['tipo_usu']=$row['Id_tipo'];
				$_SESSION['control']=$row['N_Control'];
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
     <input  class="loginbox" name="txtUsuario" type="text" pattern="[0-9]*" id="txtUsuario" required />
     <br />
     <br />
     <label id="titles">Contraseña</label><br />
     <input class="loginbox" name="txtContraseña" type="password" id="txtContraseña" required />
     <br />
     <br />
     
     <button  type="submit" name="entrar" id="entrar" value="entrar" class="menu_button blue medium" content="content"/>Entrar</button>
     
    </form>
    
    
    <br />
    <a href="registro.php">¡Regístrate aquí!</a>
    
   </div>
    
	</div>
	</body>
</html>