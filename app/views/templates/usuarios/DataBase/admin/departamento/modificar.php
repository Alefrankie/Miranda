<!DOCTYPE html>
<html>
<head>
  <title>MODIFICAR</title>
  <link rel="stylesheet" href="../../../css/tablas.css">
  </head>
    <body>
        <?php
        $idempleados=$_REQUEST['idempleados'];

        include("../../db/conexion.php");
    
        $query="SELECT * FROM empleados WHERE idempleados='$idempleados'";
        $resultado= $conexion->query($query);
        $row=$resultado->fetch_assoc();
        ?>

        <form id="msform" action="p_modificar.php?idempleados=<?php echo $row['idempleados']; ?>" method="POST">

        <h3>INGRESE DATOS DE SESION:</h3>
        <input type="text" placeholder="USUARIO..." name="user" value="<?php echo $row['user']; ?>" />
        <input type="password" placeholder="CONTRASEÑA..." name="pass" value="<?php echo $row['user']; ?>" />
        <br><br>
        <h3>INGRESE DATOS PERSONALES:</h3>
        <input type="number" REQUIRED placeholder="CEDULA..." name="cedula" value="<?php echo $row['cedula']; ?>"  />
        <input type="text" REQUIRED placeholder="NOMBRES..." name="nombres" value="<?php echo $row['nombres']; ?>" onKeyup="this.value=this.value.toUpperCase();"  />
        <input type="text" REQUIRED placeholder="APELLIDOS..." name="apellidos" value="<?php echo $row['apellidos']; ?>" onKeyup="this.value=this.value.toUpperCase();"  />
        <input type="number" placeholder="NUMERO DE HIJOS..." name="n_hijos" value="<?php echo $row['n_hijos']; ?>"  />
        <br><br>
        <h3>INGRESE INFORMACION DE CONTACTO:</h3>
        <input type="number" placeholder="TELEFONO..." name="telefono" value="<?php echo $row['telefono']; ?>" />

        <input type="text" placeholder="CORREO..." name="correo" value="<?php echo $row['correo']; ?>" onKeyup="this.value=this.value.toUpperCase();" />

        <input type="text" REQUIRED placeholder="DIRECCION..." name="direccion" value="<?php echo $row['direccion']; ?>" onKeyup="this.value=this.value.toUpperCase();"/>
        <br><br>
        <h3>INGRESE DATOS LABORALES:</h3>
          <select REQUIRED name="departamento">
          <option selected><?php echo $row['departamento'];?></option>
          <option>SECRETARIA SOCIAL MUNICIPAL</option>
          <option>SECRETARIA DE HACIENDA MUNICIPAL</option>
          <option>SECRETARIA POLITICA MUNICIPAL</option>
          <option>SECRETARIA DE AMBIENTE MUNICIPAL</option>
          <option>SECRETARIA TERRITORIAL MUNICIPAL</option> 
          <option>SECRETARIA DE DESARROLLO ECONOMICO COMUNAL</option>
          <option>SECRETARIA DE TURISMO, EDUCACION Y CULTURA MUNICIPAL</option>
          <option>COORDINACION DE INFORMATICA Y ESTADISTICA</option>
          </select>
    
    <input REQUIRED type="text" placeholder="OFICINA..." name="oficina" value="<?php echo $row['oficina']; ?>" onKeyup="this.value=this.value.toUpperCase();">
        
        <input REQUIRED type="text" placeholder="CARGO..." name="cargo" value="<?php echo $row['cargo']; ?>" onKeyup="this.value=this.value.toUpperCase();">

          <select REQUIRED placeholder="CATEGORIA..." name="categoria">
          <option selected><?php echo $row['categoria'];?></option>
      <option>BACHILLER</option>
      <option>T.S.U</option> 
      <option>UNIVERSITARIO</option>
      <option>MAESTRIA</option>
      <option>DOCTORADO</option>
          </select>

          <select REQUIRED placeholder="CONDICION..." name="condicion">
          <option selected><?php echo $row['condicion']; ?></option>
          <option>DIRECTIVO</option> 
          <option>CONTRATADO</option> 
          <option>FIJO</option>
          </select>

        <input type="number" REQUIRED placeholder="AÑOS DE SERVICIO..." name="servicio" value="<?php echo $row['servicio']; ?>" />

        <input type="number" REQUIRED placeholder="SUELDO..." name="sueldo" value="<?php echo $row['sueldo']; ?>" />

        <h3>FECHA DE INGRESO</h3>
        <input type="date" REQUIRED placeholder="FECHA DE INGRESO..." name="f_ingreso" value="<?php echo $row['f_ingreso']; ?>"/>

        <h3>FECHA ASIGNACION DE CARGO:</h3>
        <input type="date" REQUIRED placeholder="FECHA ASIGNACION DE CARGO..." name="f_asignacion" value="<?php echo $row['f_asignacion']; ?>"/>

        <br><br>
          <input type="submit" class="next action-button" value="Guardar" />
     
    </form>


</body>
</html>