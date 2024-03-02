<?php
require("./tb.php");
require("./def.php");

// Obtener el texto encriptado desde la solicitud POST
$encryptedText = isset($_POST['encryptedText']) ? $_POST['encryptedText'] : '';

// Desencriptar el texto
$textoDesencriptado = desencriptar($encryptedText, $tablaDesencriptacion);

// Devolver el resultado al cliente
echo $textoDesencriptado;
?>
