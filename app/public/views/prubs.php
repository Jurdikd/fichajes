<!DOCTYPE html>
<html lang="es-VE">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo RUTA_CSS ?>bootstrap.min.css" rel="stylesheet">
    <title>Filtro de imagen</title>
</head>

<style>
.filterFichaje {
    filter: grayscale(100%) hue-rotate(60deg);

}
</style>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Filtro de imagen</h1>
        <img class="img-fluid" src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="" srcset="" width="200" height="200">
        <img class="img-fluid filterFichaje" src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="" srcset="" width="200"
            height="200">
    </div>


    <!-- javascript-->
    <script src="<?php echo RUTA_JS; ?>popper.min.js"></script>
    <script src="<?php echo RUTA_JS; ?>bootstrap.min.js"></script>
</body>

</html>