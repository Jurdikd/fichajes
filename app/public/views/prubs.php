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
    /* color: #f32545;*/
}
</style>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Filtro de imagen</h1>
        <img class="img-fluid" src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="" srcset="" width="200" height="200">
        <img class="img-fluid filterFichaje" src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="" srcset="" width="200"
            height="200">
        <br>
        <img class="img-fluid" id="myImage" src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="Imagen" width="200"
            height="200">
        <input id="colorPicker" type="color">
    </div>


    <!-- javascript-->
    <script src="<?php echo RUTA_JS; ?>popper.min.js"></script>
    <script src="<?php echo RUTA_JS; ?>bootstrap.min.js"></script>
    <script>
    document.getElementById('colorPicker').addEventListener('input', function() {
        var color = this.value;
        var image = document.getElementById('myImage');
        var filter = 'grayscale(1) sepia(1) saturate(1000%) hue-rotate(' + colorToHueRotation(color) + 'deg)';
        image.style.filter = filter;
    });

    function colorToHueRotation(color) {
        var hex = color.replace('#', '');
        var r = parseInt(hex.slice(0, 2), 16);
        var g = parseInt(hex.slice(2, 4), 16);
        var b = parseInt(hex.slice(4, 6), 16);
        var max = Math.max(r, g, b);
        var min = Math.min(r, g, b);
        var c = max - min;

        var hue;
        if (c === 0) {
            hue = 0;
        } else if (max === r) {
            hue = ((g - b) / c) % 6;
        } else if (max === g) {
            hue = (b - r) / c + 2;
        } else {
            hue = (r - g) / c + 4;
        }
        hue = Math.round(hue * 60);
        return hue;
    }
    </script>
</body>

</html>