<?php 

	include ("../../db/conexion.php");

	$idempleados=$_REQUEST['idempleados'];
	
	/*consulta los datos dependiendo el ID para sacar la Cudula y poder
	eliminar la foto y qr con su cedula*/
    
    $query="SELECT * FROM empleados WHERE idempleados='$idempleados'";
    $resultado= $conexion->query($query);
    $row=$resultado->fetch_assoc();

  	$cedula=$row['cedula'];
  	$rutaQR="../../empleados/qr/$cedula.png";
  	$rutafotos="../../empleados/fotos/$cedula.jpg";
  	unlink($rutaQR);
  	unlink($rutafotos);

/*elimina los datos del empleado de la DB*/
	$query="DELETE FROM empleados WHERE idempleados='$idempleados'";
	$resultado= $conexion->query($query);

	if($resultado){

		print "<img src=../../../img/correcto.png>";

		echo"<script>alert('Usuario eliminado con exito del sistema, presione F5 para ver los cambios...')</script>";
}
else{

	print "<img src=../../../img/incorrecto.png>";
	echo"<script>alert('Usuario no fue eliminado con exito del sistema...')</script>";

}
	

	?>