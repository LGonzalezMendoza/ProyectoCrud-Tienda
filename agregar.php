<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciar_sesion.php');
}
?>

<html>
<head>
	<title>añadir Info</title>
</head>

<body>
<?php
//incluido el archivo de conexión a la base de datos
include_once("conexion.php");

if(isset($_POST['Submit'])) {	
	$ubicacion = $_POST['ubicacion'];
	$nombre = $_POST['nombre'];
	$num_telefono = $_POST['num_telefono'];
	$inventario = $_POST['inventario'];
	$empleados = $_POST['empleados'];
	$ventas = $_POST['ventas'];
	$color = $_POST['color'];
	$loginId = $_SESSION['id'];
		
	
// comprobando campos vacíos
	if(empty($ubicacion) || empty($nombre) || empty($num_telefono) || empty($inventario) || empty($empleados) || empty($ventas) || empty($color)) {
				
		if(empty($ubicacion)) {
			echo "<font color='red'> El campo de ubicación está vacío..</font><br/>";
		}
		
		if(empty($nombre)) {
			echo "<font color='red'> El campo de nombre está vacío..</font><br/>";
		}
		
		if(empty($num_telefono)) {
			echo "<font color='red'> El campo de num_telefono está vacío..</font><br/>";
		}

		if(empty($inventario)) {
			echo "<font color='red'> El campo de inventario está vacío..</font><br/>";
		}
		
		if(empty($empleados)) {
			echo "<font color='red'> El campo de empleados está vacío..</font><br/>";
		}
		
		if(empty($ventas)) {
			echo "<font color='red'> El campo de ventas está vacío..</font><br/>";
		}

		if(empty($color)) {
			echo "<font color='red'> El campo de color está vacío..</font><br/>";
		}
		
		//enlace a la página anterior
		echo "<br/><a href='javascript:self.history.back();'>Reintentar</a>";
	} else { 
      // si todos los campos están llenos (no vacíos)

      //insertar datos a la base de datos
		$result = mysqli_query($mysqli, "INSERT INTO tienda(ubicacion, nombre, num_telefono, inventario, empleados, ventas, color, login_id) VALUES('$ubicacion','$nombre','$num_telefono','$inventario','$empleados','$ventas','$color', '$loginId')");

		echo "<font color='green'>Datos agregados correctamente.";
		echo "<br/><a href='ver.php'>Ver Resultado</a>";
	}
}
?>
</body>
</html>
