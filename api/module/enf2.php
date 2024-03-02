<?php
require("./tb.php");
require("./enf.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['originalText'])) {
        $originalText = "";
    } else {
        $originalText = $_POST['originalText'];
    }

    $textoEncriptado = encriptar($originalText, $tablaEncriptacion);


    echo $textoEncriptado;
}
?>
