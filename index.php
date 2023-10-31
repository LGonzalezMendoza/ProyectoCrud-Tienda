<?php session_start(); ?>
<html>
<head>
	<title>Index</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido A Mi Pagina!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
				Bienvenido <?php echo $_SESSION['nombre'] ?> ! <a href='cerrar_sesion.php'>Cerrar Sesion</a><br/>
		<br/>
		<a href='ver.php'>Ver Y Añadir Productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Debe iniciar sesión para ver esta página..<br/><br/>";
		echo "<a href='iniciar_sesion.php'>Iniciar Sesion</a> | <a href='registrar.php'>Registrarse</a>";
	}
	?>
	<div id="footer">
		
		Creado Por <a href="https://lgonzalezmendoza.github.io/Proyecto-Musical-DOS/webmaster.html" title="Master">Leonardo Gonzalez</a>
	</div>
</body>
</html>
