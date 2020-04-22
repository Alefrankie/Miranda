
<!DOCTYPE html>
<html>
<head>
	<title>DATOS EMPLEADOS</title>
	<?php include '../../../inc/link.php'; ?>
	 <link rel="stylesheet" href="../../css/templatemo-style.css">
		
		<style>
			h6{
						text-align: center;
						font-size: 15pt;
						background: #47071A;
						color: #fff;
						padding: 10px;
						}
		</style>
</head>
<body>
 <div  id="projects">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="widget-title"> SR(A) <?php echo "$nombres"?> USTED FUE REGISTRADO CON LOS SIGUIENTES DATOS: </h6>
                        </div>

                        <!--inicio de la informacion -->
																								 <div class="col-md-12">
                            <form action="javascript:history.go(-1)" method="post" class="contact-constancia" target="_blank">
																														<br><br>
																																																<br>
																																																				<table id="wordskey2" cellspacing="0" cellpadding="0">
																																																					<h4>DATOS DE SESION</h4>
																																																							<tr>
																																																												<td> <h3> USUARIO</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$user"?></span> </h3></td>
																																																								</tr>
																																																								<tr>
																																																												<td> <h3> CONTRASEÑA</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$pass"?></span> </h3></td>
																																																								</tr>
																																																								</table>
																																																								<br>
																																																									<table id="keywords2" cellspacing="0" cellpadding="0">
																																																								<h4>DATOS PERSONALES</h4>
																																																								<tr>
																																																												<td> <h3> NOMBRES</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$nombres"?></span> </h3></td>
																																																								</tr>
																																																								<tr>
																																																												<td> <h3> APELLIDOS</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$apellidos"?></span> </h3></td>
																																																								</tr>
																																																								
																																																								<tr>
																																																												<td> <h3> CEDULA</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$cedula"?></span> </h3></td>
																																																								</tr>
																								
																																																								<tr>
																																																												<td> <h3> NUMERO DE HIJOS</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$n_hijos"?></span> </h3></td>
																																																								</tr>
																																																								</table>
																								
																																																									<br>
																																																									<table id="keywords2" cellspacing="0" cellpadding="0">
																																																									<h4>INFORMACION DE CONTACTO:</h4>
																																																								<tr>
																																																												<td> <h3> TELEFONO</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$telefono"?></span> </h3></td>
																																																								</tr>
																																																								<tr>
																																																												<td> <h3> CORREO</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$correo"?></span> </h3></td>
																																																								</tr>
																								
																																		<tr>
																																																												<td> <h3> DIRECCION</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$direccion"?></span> </h3></td>
																																																								</tr>
																																																								</table>
																								
																																																									<br>
																																																									<table id="keywords2" cellspacing="0" cellpadding="0">
																																	<h4>DATOS LABORALES:</h4>
																																		<tr>
																																																												<td> <h3> DEPARTAMENTO</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$departamento"?></span> </h3></td>
																																																								</tr>
																								
																																		<tr>
																																																												<td> <h3> OFICINA</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$oficina"?></span> </h3></td>
																																																								</tr>
																								
																																			<tr>
																																																												<td> <h3> CARGO</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$cargo"?></span> </h3></td>
																																																								</tr>    
																								
																																		<tr>
																																																												<td> <h3> CATEGORIA</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$categoria"?></span> </h3></td>
																																																								</tr>
																								
																																		<tr>
																																																												<td> <h3> CONDICION</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$condicion"?></span> </h3></td>
																																																								</tr>
																								
																																		<tr>
																																																												<td> <h3> FECHA DE INGRESO</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$f_ingreso"?></span> </h3></td>
																																																								</tr>                               
																								
																																		<tr>
																																																												<td> <h3> AÑOS DE SERVICIO</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$servicio"?></span> </h3></td>
																																																								</tr>
																																																					
																																																				</table>
																								
																																																									<table id="keywords2" cellspacing="0" cellpadding="0">
																																																										<br>
																																		<tr>
																																																												<td> <h3> SUELDO</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$sueldo"?></span> </h3></td>
																																																								</tr>
																								
																																		<tr>
																																																												<td> <h3> PRIMA DE PROFESION MENSUAL</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$p_profesion"?></span> </h3></td>
																																																								</tr>
																								
																								
																																		<tr>
																																																												<td> <h3> PRIMA DE HIJOS MENSUAL</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$p_hijos"?></span> </h3></td>
																																																								</tr>
																								
																																		<tr>
																																																												<td> <h3> PRIMA DE ANTIGUEDAD MENSUAL</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$p_antiguedad"?></span> </h3></td>
																																																								</tr>                                                    
																																			<tr>
																																																												<td> <h3> PRIMA DE HOGAR MENSUAL</h3></td>
																																																												<td> <h3> <span class="sub-key"><?php echo "$p_hogar"?></span> </h3></td>
																																																								</tr>                                                                            
																								
																																																				</table> 
																								
																																		<input type="submit" class="button" value="ACEPTAR" /></br></br>
																																													</form>
                        </div>
																									
                        
					
                                                                               
                        <!--fin de la informacion -->
                    </div>
                    </div>
                    
</div>
</body>
</html>

