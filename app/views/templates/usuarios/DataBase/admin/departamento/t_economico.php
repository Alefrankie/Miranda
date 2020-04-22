<!DOCTYPE html>
<html>
<head>
	<title>Tabla</title>
	<link rel="stylesheet" href="../../../css/tablas.css">
</head>
<body>
<table id="keywords" cellspacing="0" cellpadding="0">
							  	<thead>
							     <tr>
							      	<th><span>Cedula</span></th>
							        <th><span>Nombres</span></th>
							        <th><span>Apellidos</span></th>
							        <th><span>Hijo(s)</span></th>
							        
							        <th><span>Telefono</span></th>
							        <th><span>Correo</span></th>
							        <th><span>Direccion</span></th>

							        <th><span>Departamento</span></th>
							        <th><span>Oficina</span></th>
							        <th><span>Cargo</span></th>
							        <th><span>Categoria</span></th>
							        <th><span>Condicion</span></th>

							        <th><span>Años de Servicio</span></th>
							        <th><span>Fecha Ingreso</span></th>
							        <th><span>Fecha Asignacion de Cargo</span></th>

							        <th><span>Sueldo Basico Mensual</span></th>
							        <th><span>Prima de Profesion Mensual</span></th>
							        <th><span>Prima de Hijos Mensual</span></th>
							        <th><span>Prima de Antiguedad Mensual</span></th>
							        <th><span>Prima de Hogar Mesual</span></th>
							        <th><span>Total Asign</span></th>


							        <th><span>Modificar</span></th>
							        <th><span>Eliminar</span></th>							  

							      </tr>
							  </thead>
							    <?php
							    	include("../../db/conexion.php");

							    	$query="SELECT * FROM empleados WHERE departamento='SECRETARIA DE DESARROLLO ECONOMICO COMUNAL'";
							    	$resultado=$conexion->query($query);
							    	while($row=$resultado->fetch_assoc()){
							    ?>
							    	<tbody>
							    	<tr>
							    	<td><?php echo $row['cedula']; ?></td>
							        <td><?php echo $row['nombres']; ?></td>
							        <td><?php echo $row['apellidos']; ?></td>
							        <td><?php echo $row['n_hijos']; ?></td>

							        <td><?php echo $row['telefono']; ?></td>
							        <td><?php echo $row['correo']; ?></td>
							        <td><?php echo $row['direccion'];?></td>

							        <td><?php echo $row['departamento'];?></td>
							        <td><?php echo $row['oficina'];?></td>
							        <td><?php echo $row['cargo'];?></td>
							        <td><?php echo $row['categoria'];?></td>
							        <td><?php echo $row['condicion'];?></td>
							        <td><?php echo $row['servicio'];?></td>

							        <td><?php echo $row['f_ingreso'];?></td>
							        <td><?php echo $row['f_asignacion'];?></td>

							        <td><?php echo $row['sueldo'];?></td>
							        <td><?php echo $row['p_profesion'];?></td>
							        <td><?php echo $row['p_hijos'];?></td>
							        <td><?php echo $row['p_antiguedad'];?></td>
							        <td><?php echo $row['p_hogar'];?></td>
							        <td><?php echo $row['t_asignaciones'];?></td>							      

							        <td><a href="modificar.php?idempleados=<?php echo $row['idempleados']; ?>">Modificar</a></td>
							        <td><a href="eliminar.php?idempleados=<?php echo $row['idempleados']; ?>">Eliminar</a></td>
							      </tr>
							      <?php
							    	}
							    ?>

							    </tbody>
							  </table>

		</body>
</html>