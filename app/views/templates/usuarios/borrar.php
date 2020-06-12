<!DOCTYPE html>
<html lang="es">

<head>
    <title>Borrar Usuario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public_html/css/styles.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/owl.carousel.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/owl.theme.css" rel="stylesheet" media="screen">
</head>

<body>
    <a href="<?php echo RUTA_URL; ?>/usuarios/dashboard" class="btn btn-light">Volver</a>

    <div class="card card-body bg-light mt-5">
        <h2>Editar usuario</h2>

        <form action="<?php echo RUTA_URL; ?>/paginas/borrar/<?php echo $datos['id']?>" method="POST">

            <div class="form-group">
                <label for="cedula">Cedula: <sup>*</sup></label>
                <input type="text" class="form-control form-control-lg" name="cedula" id="" value="<?php echo $datos['cedula']?>">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre: <sup>*</sup></label>
                <input type="text" class="form-control form-control-lg" name="nombre" id="" value="<?php echo $datos['nombre']?>">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido: <sup>*</sup></label>
                <input type="text" class="form-control form-control-lg" name="apellido" id="" value="<?php echo $datos['apellido']?>">
            </div>

            <input type="submit" value="Borrar Datos" class="btn btn-success">
        </form>
    </div>
    <?php require RUTA_APP . '/views/inc/footer.php'; ?>

</body>

</html>