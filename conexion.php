<?php


/**
 * mysql_connect está en uso
 * usando mysqli_connect en su lugar
 */

$databaseHost = 'localhost';
$databaseName = 'bd_guitarmusicshop_gonzalez';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	
?>
