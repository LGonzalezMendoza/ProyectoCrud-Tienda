<?php session_start(); ?>
<html>
<head>
	<title>Iniciar Sesion</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['submit'])) {
	$usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
	$clave = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($usuario == "" || $clave == "") {
		echo "El Usuario O La Contraseña Es Invalida.";
		echo "<br/>";
		echo "<a href='iniciar_sesion.php'>Reintentar</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE usuario='$usuario' AND password=md5('$clave')")
					or die("No se pudo ejecutar la consulta de selección.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validusuario = $row['usuario'];
			$_SESSION['valid'] = $validusuario;
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Contraseña Invalida.";
			echo "<br/>";
			echo "<a href='iniciar_sesion.php'>Reintentar</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Inicio Sesion</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Usuario</td>
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
