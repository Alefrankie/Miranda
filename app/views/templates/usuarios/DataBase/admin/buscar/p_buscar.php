 
 <?php
      include("../../db/conexion.php");
                      
      $cedula= $_POST['cedula'];
                      
    $consulta="SELECT * FROM empleados WHERE cedula='$cedula'"; 
    $resultado=mysqli_query($conexion, $consulta);
	$filas=mysqli_num_rows ($resultado);
	$conexion=$resultado->fetch_assoc();
	if ($filas>0){ include("buscar.php" );}
	else { echo"<script>alert('CEDUA INGRESADA NO EXISTE...');window.location.href='javascript:history.go(-1)';</script>"; }
			



 ?>