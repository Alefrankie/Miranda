		<?php 

	include ("../../db/conexion.php");

	$idempleados=$_REQUEST['idempleados'];

	$user= $_POST['user'];
	$pass= $_POST['pass'];

	$cedula=   $_POST['cedula'];
	$nombres= $_POST['nombres'];
	$apellidos= $_POST['apellidos'];
	$n_hijos= $_POST['n_hijos'];

	$telefono= $_POST['telefono'];
	$correo= $_POST['correo'];
	$direccion= $_POST['direccion'];
	
	$departamento= $_POST['departamento'];
	$oficina= $_POST['oficina'];
	$cargo= $_POST['cargo'];
	$categoria= $_POST['categoria'];
	$condicion= $_POST['condicion'];

	$servicio= $_POST['servicio'];
	$f_ingreso= $_POST['f_ingreso'];
	$f_asignacion= $_POST['f_asignacion'];
	
	$sueldo=   $_POST['sueldo'];
	$p_profesion;
	$p_hijos;
	$p_antiguedad;
	$p_hogar=900;
	$t_asignaciones;



/*calculo de prima por profesion*/ 
/*calculo de prima por profesion*/ 
     if ($categoria=='BACHILLER'){ $p_profesion= 0; } /* 10% */
else if ($categoria=='T.S.U'){ $p_profesion= $sueldo*12/100; } /* 15% */
else if ($categoria=='UNIVERSITARIO'){ $p_profesion= $sueldo*14/100; }
else if ($categoria=='MAESTRIA'){ $p_profesion= $sueldo*18/100; }
else if ($categoria=='DOCTORADO'){ $p_profesion= $sueldo*20/100; }

/*calculo de prima por hijos*/
     if($n_hijos==0){ $p_hijos= $n_hijos; } /* validar entrada de solo numeros positivos*/
else if($n_hijos>0) { $p_hijos= $n_hijos*900; }


/*calculo de prima por antiguedad*/
	 if ($servicio==0){ $p_antiguedad= $servicio; }
else if ($servicio==1){ $p_antiguedad= $sueldo*1/100; } /* 1% */
else if ($servicio==2){ $p_antiguedad= $sueldo*2/100; } 
else if ($servicio==3){ $p_antiguedad= $sueldo*3/100; } 
else if ($servicio==4){ $p_antiguedad= $sueldo*4/100; } 
else if ($servicio==5){ $p_antiguedad= $sueldo*5/100; } 
else if ($servicio==6){ $p_antiguedad= $sueldo*6.2/100; } 
else if ($servicio==7){ $p_antiguedad= $sueldo*7.4/100; } 
else if ($servicio==8){ $p_antiguedad= $sueldo*8.6/100; }
else if ($servicio==9){ $p_antiguedad= $sueldo*9.8/100; } 
else if ($servicio==10){ $p_antiguedad= $sueldo*11/100; } 
else if ($servicio==11){ $p_antiguedad= $sueldo*12.4/100; } 
else if ($servicio==12){ $p_antiguedad= $sueldo*13.8/100; } 
else if ($servicio==13){ $p_antiguedad= $sueldo*15.2/100; } 
else if ($servicio==14){ $p_antiguedad= $sueldo*16.6/100; }
else if ($servicio==15){ $p_antiguedad= $sueldo*18/100; } 
else if ($servicio==16){ $p_antiguedad= $sueldo*19.6/100; }
else if ($servicio==17){ $p_antiguedad= $sueldo*21.2/100; } 
else if ($servicio==18){ $p_antiguedad= $sueldo*22.8/100; } 
else if ($servicio==19){ $p_antiguedad= $sueldo*24.4/100; } 
else if ($servicio==20){ $p_antiguedad= $sueldo*26/100; } 
else if ($servicio==21){ $p_antiguedad= $sueldo*27/100; }
else if ($servicio==22){ $p_antiguedad= $sueldo*29.6/100; } 
else if ($servicio>=23){ $p_antiguedad= $sueldo*30/100; }

/*calculo total de asignaciones*/
$t_asignaciones= $sueldo + $p_profesion + $p_hijos + $p_antiguedad + $p_hogar;


	$query="UPDATE empleados SET user='$user', pass='$pass', cedula='$cedula', nombres='$nombres', apellidos='$apellidos', n_hijos='$n_hijos', telefono='$telefono', correo='$correo', direccion='$direccion', departamento='$departamento', oficina='$oficina', cargo='$cargo', categoria='$categoria', condicion='$condicion' , servicio='$servicio', f_ingreso='$f_ingreso', f_asignacion='$f_asignacion', sueldo='$sueldo', p_profesion='$p_profesion', p_hijos='$p_hijos', p_antiguedad='$p_antiguedad', p_hogar='$p_hogar', t_asignaciones='$t_asignaciones' WHERE idempleados='$idempleados'";
	


	$resultado= $conexion->query($query);


    print "<img src=../../../img/correcto.png>" ;

	echo"<script>alert('Datos modificados con exito, presione F5 para ver los cambios...')</script>";
	
	?>