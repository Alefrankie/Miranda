<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empleado</title>
    <link rel="stylesheet" type="text/css"  href="../../../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../../fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css"  href="../../../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/responsive.css">
     
  </head>
    <body class="fondo">
       <div id="tf-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../../empleados/fotos/<?php echo $conexion['cedula']; ?>.jpg" class="img-responsive" >
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2><?php echo $conexion['nombres']; ?></h2>
                            <br>
                            <h2><?php echo $conexion['apellidos']; ?></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">C.I: <?php echo $conexion['cedula']; ?></p>
                        <ul class="about-list">
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>DEPARTAMENTO: <?php echo $conexion['departamento']; ?></em>
                            </li>
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>CARGO: <?php echo $conexion['cargo']; ?></em>
                            </li>
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>CATEGORIA: <?php echo $conexion['categoria']; ?></em>
                            </li>

                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>PRIMA POR PROFESION: <?php echo $conexion['p_profesion']; ?></em>
                            </li>
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>PRIMA POR ANTIGUEDAD: <?php echo $conexion['p_antiguedad']; ?></em>
                            </li>
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>PRIMA HOGAR: <?php echo $conexion['p_hogar']; ?></em>
                            </li>
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>PRIMA POR HIJOS: <?php echo $conexion['p_hijos']; ?></em>
                            </li>  

                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>TOTAL ASIGNACIONES: <?php echo $conexion['t_asignaciones']; ?></em>
                            </li>                                                                      
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
       <style>
        .fondo{
        
        
          color: #fff;
          background: rgba(0,0,0,0.8);
        
        }

       </style>
    </body>
</html>