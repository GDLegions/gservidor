<?php
require("./tb.php");
require("./enf.php");
require("./def.php");

if (!isset($_GET['valor'])) {
    $valor1 = "";
} else {
    $valor1 = $_GET['valor'];
}

$textoEncriptado = encriptar($valor1, $tablaEncriptacion);

echo "Texto original: " . $valor1 . "\n";
echo "Texto encriptado: " . $textoEncriptado . "\n";
desencriptar($textoEncriptado, $tablaDesencriptacion);
?>
