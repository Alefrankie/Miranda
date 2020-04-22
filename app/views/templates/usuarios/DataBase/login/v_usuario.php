<?php

$user = $_POST["user"]; 
$pass = $_POST["pass"]; 
$t_usuario = $_POST['t_usuario'];

include("../db/conexion.php");
      
     if($t_usuario==1){ $consulta="SELECT * FROM admin WHERE user ='$user' and pass ='$pass'"; 
				        $resultado=mysqli_query($conexion, $consulta);
				        $filas=mysqli_num_rows ($resultado);
				        $conexion=$resultado->fetch_assoc();
					    if ($filas>0){ include("../../admin.php" );}
					    else { echo"<script>alert('Datos Incorrectos');window.location.href='../../../index.php';</script>"; }
				 	  }

/*falta consultar varias tablas a la vez*/

else if($t_usuario==2){ $consulta="SELECT * FROM empleados WHERE user ='$user' and pass ='$pass'"; 
				        $resultado=mysqli_query($conexion, $consulta);
				        $filas=mysqli_num_rows ($resultado);
				        $conexion=$resultado->fetch_assoc();
					    if ($filas>0){ include("../../empleados.php" );}
					    else { echo"<script>alert('Datos Incorrectos');window.location.href='../../../index.php';</script>"; }
				 	  }

?> 