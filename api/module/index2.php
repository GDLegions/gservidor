<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encriptador</title>
    <style>
        /* Estilos aquí */
    </style>
</head>
<body>
    <div class="container">
        <h1>Encriptador</h1>
        <textarea id="originalText" placeholder="Texto original"></textarea>
        <button onclick="encriptar()">Encriptar</button>
        <textarea id="result"></textarea>
    </div>
    <script>
        function encriptar() {
            var originalText = document.getElementById('originalText').value;
            var resultContainer = document.getElementById('result');

            // Crear una instancia del objeto XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Configurar la solicitud
            xhr.open('POST', 'enf2.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Definir la función de devolución de llamada cuando la solicitud esté completa
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Actualizar el contenedor de resultados con la respuesta del servidor
                    resultContainer.textContent = xhr.responseText;
                }
            };

            // Enviar la solicitud con el texto original como datos
            xhr.send('originalText=' + encodeURIComponent(originalText));
        }
    </script>
</body>
</html>
