<?php 

	include ("../db/conexion.php");

	$idadmin=$_REQUEST['idadmin'];

	$user= $_POST['user'];
	$pass= $_POST['pass'];
	$cedula= $_POST['cedula'];
	$nombres= $_POST['nombres'];
	$apellidos= $_POST['apellidos'];

	$query="UPDATE admin SET user='$user', pass='$pass', cedula='$cedula', nombres='$nombres', apellidos='$apellidos'WHERE idadmin='$idadmin'";

	$resultado= $conexion->query($query);

	print "<img src=../../img/correcto.png>";

	echo"<script>alert('Vuelva atras y presione F5 para ver los cambios...')</script>";

	?>