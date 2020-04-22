<?php 

	include ("../db/conexion.php");

	$idempleados=$_REQUEST['idempleados'];

	$user= $_POST['user'];
	$pass= $_POST['pass'];

	$query="UPDATE empleados SET user='$user', pass='$pass'WHERE idempleados='$idempleados'";

	$resultado= $conexion->query($query);

	print "<img src=../../img/correcto.png>";

	echo"<script>alert('Vuelva atras y presione F5 para ver los cambios...')</script>";


?>
