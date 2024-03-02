<?php

session_start();

// Obtener datos del GET
$name = isset($_GET['name']) ? $_GET['name'] : '';
$text = isset($_GET['text']) ? $_GET['text'] : '';
$data = isset($_GET['data']) ? $_GET['data'] : '';

// Validar que haya un nombre, un texto y data
if (empty($name) || empty($text) || empty($data)) {
    // Manejar el caso en que no se proporciona nombre, texto o data
    die("Nombre, texto y data son obligatorios.");
}

// Inicializar el ID en 0
$id = 0;

// Intentar encontrar un ID disponible
while (idExists($id)) {
    $id++;
}

// Formar la cadena de datos
$dataString = "$id&$name&$text&$data";

// Formar la cadena completa a almacenar en el historial
$entry = "$dataString\n";

// Abrir el archivo de historial en modo append
$historyFile = './history/history.txt';
$fh = @fopen($historyFile, 'a');
if ($fh === false) {
    die("Error al abrir el archivo de historial.");
}

// Bloquear el archivo para escritura
flock($fh, LOCK_EX);

// Escribir la entrada en el archivo
fwrite($fh, $entry);

// Liberar el bloqueo y cerrar el archivo
flock($fh, LOCK_UN);
fclose($fh);

// Mensaje de éxito
echo "Datos almacenados con éxito.";

// Función para verificar si un ID existe en el historial
function idExists($idToCheck) {
    $historyFile = './history/history.txt';
    $lines = @file($historyFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($lines === false) {
        return false; // Si hay un error al leer el historial, asumimos que el ID no existe
    }

    foreach ($lines as $line) {
        list($entryId, $dataString) = explode('&', $line, 2);
        if ((int)$entryId === $idToCheck) {
            return true; // El ID ya existe en el historial
        }
    }

    return false; // El ID no fue encontrado en el historial
}
