<html>
<head>
	<title>Registr5ar</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$clave = $_POST['password'];

	if($usuario == "" || $clave == "" || $nombre == "" || $correo == "") {
		echo "Todos los campos deben ser rellenados. Uno o varios campos están vacíos.";
		echo "<br/>";
		echo "<a href='registrar.php'>Reintentar</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(nombre, correo, usuario, password) VALUES('$nombre', '$correo', '$usuario', md5('$clave'))")
			or die("No se pudo ejecutar la consulta de inserción.");
			
		echo "Registro exitoso";
		echo "<br/>";
		echo "<a href='iniciar_sesion.php'>Iniciar Sesion</a>";
	}
} else {
?>
	<p><font size="+2">Registrarse</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre Completo</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Correo</td>
				<td><input type="text" name="correo"></td>
			</tr>			
			<tr> 
				<td>Usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Enviar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
