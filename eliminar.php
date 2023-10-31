<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciar_sesion.php');
}
?>

<?php
//incluido el archivo de conexión a la base de datos
include("conexion.php");

//obteniendo la identificación de los datos de la URL
$id = $_GET['id'];

//eliminando la fila de la tabla
$result=mysqli_query($mysqli, "DELETE FROM tienda WHERE id=$id");


//redireccionando a la página de visualización (ver.php en nuestro caso)
header("Location:ver.php");
?>

