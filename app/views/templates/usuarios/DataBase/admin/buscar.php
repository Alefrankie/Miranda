<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empleado</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../css/responsive.css">

    <?php
    include("../db/conexion.php");

    $cedula = $_POST['cedula'];

    $query = "SELECT * FROM empleados WHERE cedula='$cedula'";
    $resultado = $conexion->query($query);
    $row = $resultado->fetch_assoc();

    ?>
</head>

<body class="fondo">
    <div id="tf-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="avatar.png" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2><?php echo $row['nombres']; ?></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro"><?php echo $row['nombres']; ?></p>
                        <ul class="about-list">
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong><?php echo $row['nombres']; ?></em>
                            </li>
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong><?php echo $row['nombres']; ?></em>
                            </li>
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong><?php echo $row['nombres']; ?></em>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .fondo {


            color: #fff;
            background: rgba(0, 0, 0, 0.8);

        }
    </style>
</body>

</html>