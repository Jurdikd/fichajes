<!DOCTYPE html>
<html lang="es-VE">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>QR y Barcode Scanner</title>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center mb-4">QR y Barcode Scanner</h1>
    <div id="qr-reader" class="d-flex justify-content-center"></div>
    <div id="qr-reader-results" class="text-center mt-4"></div>
  </div>

  <script src="https://unpkg.com/html5-qrcode@2.1.2/minified/html5-qrcode.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const qrReader = document.getElementById('qr-reader');
      const qrReaderResults = document.getElementById('qr-reader-results');

      const html5QrCode = new Html5Qrcode("qr-reader", { fps: 10, qrbox: 250 });

      html5QrCode.start(
        { facingMode: "environment" },
        {
          qrCodeSuccessCallback: message => {
            qrReaderResults.innerHTML = `<span class="text-success">Código leído: \${message}</span>`;
          },
          qrCodeErrorCallback: () => {
            qrReaderResults.innerHTML = '<span class="text-danger">No se pudo leer el código</span>';
          }
        },
        videoError => {
          qrReaderResults.innerHTML = `<span class="text-danger">Error de cámara: \${videoError.message}</span>`;
        }
      );

      window.addEventListener('beforeunload', () => {
        html5QrCode.stop();
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
