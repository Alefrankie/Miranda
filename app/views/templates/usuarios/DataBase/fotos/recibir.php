<?php

$cedula=   $_POST['cedula'];

if($_FILES["foto"] ["error"]>0){

	echo "Error al cargar archivo";
}

else{
	$permitidos= array ("image/jpg");
	if ($permitidos) {
		
	$ruta = '../empleados/fotos/';
	$nombre = "$cedula.jpg";
	$foto = $ruta.$nombre;

	$resultado= @move_uploaded_file($_FILES["foto"] ["tmp_name"], $foto);

		if ($resultado) {

		print "<img align=center src=../../img/correcto.png border=0> ";
		

		echo"<script>alert('Vuelva atras y presione F5 para ver los cambios...')</script>";


		}else{echo "error al guardar archivo";}

	}else{echo "tipo de archivo no permitido";}
	
}


?>