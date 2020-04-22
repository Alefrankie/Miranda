<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agregar Usuario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public_html/css/styles.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/owl.carousel.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/owl.theme.css" rel="stylesheet" media="screen">
</head>

<body>
    <a href="<?php echo RUTA_URL; ?>/paginas" class="btn btn-light">Volver</a>

    <div class="card card-body bg-light mt-5">
        <h2>Agregar usuarios</h2>

        <form action="<?php echo RUTA_URL; ?>/paginas/agregar" method="POST">

            <div class="form-group">
                <label for="cedula">cedula: <sup>*</sup></label>
                <input type="text" class="form-control form-control-lg" name="cedula" id="">
            </div>
            <div class="form-group">
                <label for="nombre">nombre: <sup>*</sup></label>
                <input type="text" class="form-control form-control-lg" name="nombre" id="">
            </div>
            <div class="form-group">
                <label for="apellido">apellido: <sup>*</sup></label>
                <input type="text" class="form-control form-control-lg" name="apellido" id="">
            </div>

            <input type="submit" value="Enviar Datos" class="btn btn-success">
        </form>
    </div>
    <?php require RUTA_APP . '/views/inc/footer.php'; ?>

</body>

</html>